<?php
namespace SuperSmashLore\SuperSmashLore\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\DataSet\QueryDataSet;
use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\Operation\{Composite, Factory, Operation};

// grab the encrypted properties file
require_once("/etc/apache2/capstone-mysql/Secrets.php");
// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoloader.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
/**
 * This is an abstract class containing universal and capstone project specific MySQL parameters.
 *
 * This class was made to be the foundation of the unit tests for this project. It loads the database
 * parameters about this project so that the specifically written tests can share the parameters in place; to use it:
 *
 * 1. Rename the class from SuperSmashLoreTest to a project specific name (ex. testInsertValidCharacter).
 * 2. Rename the namespace to be the same as in (1) (SuperSmashLore\SuperSmashLore\Test).
 * 3. Modify SuperSmashLoreTest::getDataSet() to include all the tables in the project.
 * 4. Modify SuperSmashLoreTest::getConnection() to include the correct MySQL properties file.
 * 5. Have all table specific tests include this class.
 *
 * NOTE: Tables must be added in the order they were created in step (2).
 *
 * @author Ryan Buchholz <rbuchholz1@cnm.edu>
 */
abstract class SuperSmashLoreTest extends TestCase {
	use TestCaseTrait;
	/**
	 * PHPUnit database connection interface
	 * @var Connection $connection
	 */
	protected  $connection = null;
	/**
	 * assembles the table from the model and provides it to PHPUnit
	 *
	 * @return QueryDataSet assembled model for PHPUnit
	 */
	public final function getDatSet() : QueryDataSet {
		$dataset = new QueryDataSet($this->getConnection());
		/**
		 * add all the tables for our project here
		 * Tables are (should be) listed below in the order that they were created:
		 */
		$dataset->addTable("profile");
		$dataset->addTable("character");
		$dataset->addTable("game");
		$dataset->addTable("favorite");
		return ($dataset);
	}
	/**
	 * model for the setUp method that run before each test; this method nukes the database before each run.
	 *
	 * @return Composite array containing delete and insert commands
	 */
	public final function getSetUpOperation() : Operation {
		return new Composite([
			Factory::DELETE_ALL(),
			Factory::INSERT()
		]);
	}
	/**
	 * model for the tearDown method that runs after each test; this method nukes the database after each run
	 *
	 * @return Operation delete command for our database
	 */
	public final function getTearDownOperation() : Operation {
		return(Factory::DELETE_ALL());
	}
	/**
	 * sets up our database connection and provides it to PHPUnit for testing.
	 *
	 * @return Connection PHPUnit database connection interface
	 */
	public final function getConnection() : Connection {
		//if the connection hasn't been established we will need to create it.
		if($this->connection === null) {
			//connect to MySQL and provide the interface to the PHPUnit Test.
			//TODO: Double-check what goes into the parentheses below:
			$secrets = new \Secrets("/etc/apache2/capstone-mysql/smash.ini");
			$pdo = $secrets->getPdoObject();
			$this->connection = $this->createDefaultDBConnection($pdo, $secrets->getDatabase());
		}
		return ($this->connection);
	}
	/**
	 * returns the actual PDO object; convenience method.
	 *
	 * @return \PDO active object
	 */
	public final function getPDO() {
		return($this->getConnection()->getConnection());
	}
}