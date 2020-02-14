<?php
namespace SuperSmashLore\SuperSmashLore\Test;
use SuperSmashLore\SuperSmashLore\{Favorite};

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoloader.php");

// grab the uuid generator
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

/**
 * Full PHPUnit Test for the favorite class
 * * PDO methods are located in the Favorite Class
 * @ see php/classes/Favorite.php
 * @author Ryan Torske
 */

class FavoriteTest extends SuperSmashLoreTest {
	/**
	 * Profile that created the favorite; this is for foreign key relations
	 * @var favorite Profile Id $profile
	 */
	protected $profile;

	/**
	 * Character that was liked: this is for foreign key relations
	 * @var favorite Character id $character
	 */
	protected $character;
	/**
	 * valid hash to use
	 * @var $VALID_HASH
	 */

	protected $VALID_HASH;

	/**
	 * timestamp of the favorite; this starts as null and is assigned later
	 * favorite date
	 * @var \DateTime $VALID_FAVORITEDATE
	 */
	protected $VALID_FAVORITEDATE;

	/**
	 * valid activationToken to create the profile object to own the test
	 * @var string VALID_ACTIVATION
	 */
	protected $VALID_ACTIVATION;

	/**
	 * create dependant objects before running each test
	 */

	public final function setUp() : void {
		//run the default setUp() method first
		parent::setUp();

		//create a salt and hash for the mocked profile
		$password = "abc123";
		$this->VALID_HASH = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 384]);
		$this->VALID_ACTIVATION = bin2hex(random_bytes(16));

		//create and insert the mocked profile
		$this->profile = new Profile(generateUuidV4(), null, "@phpunit", "test@phpunit.de", $this->VALID_HASH, "+12125551212");
		$this->profile->insert($this->getPDO());

		//create the and insert the mocked character
		$this->character = new Character(generateUuidV4(), "blablabla", " https://www.youtube.com/watch?v=0IuKgivLCLg&list=PLUzxirmuFjBmpiQEbgwjUexgXk1RcD00B&index=1", "Mario", "https://vignette.wikia.nocookie.net/ssb/images/0/07/Mario_-_Super_Smash_Bros._Ultimate.png/revision/latest/scale-to-width-down/350?cb=20180910105834", "Wahoo", "07/09/1981","Ground Theme", "Mario Universe");
		$this->character->insert($this->getPDO());

		//calculate the date (just use the time the unit test is setup)
		$this->VALID_FAVORITEDATE = new \DateTime();
	}

	/**
	 * test inserting a valid Favorite and verify that the actual mySQL data matches
	 */
	public function testInsertValidFavorite() : void {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("favorite");

		//create a new Favorite and insert it into mySQL
		$favorite = new Favorite($this->profile->getProfileId(), $this->character->getCharacterId(),VALID_FAVORITEDATE);
		$favorite->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$pdoFavorite = Favorite::getFavoriteByFavoriteProfileIdAndFavoriteCharacterId($this->getPDO(), $this->profile->getProfileId(), $this->character->getCharacterId());
		$this->assertEquals($numRows + 1, $this->getconnection()->getRowCount("favorite"));
		$this->assertEquals($pdoFavorite->getFavoriteProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoFavorite->getFavoriteCharacterId(), $this->character->getCharacterId());
		//format the date to seconds since the beginning of time to avoid round off error
		$this->assertEquals($pdoFavorite->getFavoriteDate()->getTimestamp(), $this->VALID_FAVORITEDATE->getTimestamp());
	}

	/**
	 * test creating a Favorite and then deleting it
	 */
	public function testDeleteFavorite() : void {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("favorite");

		//create a new Favorite and insert into mySQL
		$favorite = new Favorite($this->profile->getProfileId(), $this->character->getCharacterId(), $this->VALID_FAVORITEDATE);
		$favorite->insert($this->getPDO());

		//delete the Favorite from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("favorite"));
		$favorite->delete($this->getPDO());

		// grab data from my sql and enforce the Character does not exist
		$pdoFavorite = Favorite::getFavoriteByFavoriteProfileIdAndFavoriteCharacterId($this->getPDO(), $this->profile->getProfileId(), $this->character->getCharacterId());
		$this->assertNull($pdoFavorite);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("favorite"));
	}

	/**
	 * test inserting a Favorite and regrabbing it from mySQL
	 */
	public function testGetFavoriteByFavoriteProfileIdAndFavoriteCharacterId() : void {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("favorite");

		//create a new favorite and insert into mysql
		$favorite = new Favorite($this->profile->getProfileId(), $this->character->getCharacterId(), $this->VALID_FAVORITEDATE);
		$favorite->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectation
		$pdoFavorite = Favorite::getFavoriteByFavoriteProfileIdAndFavoriteCharacterId($this->getPDO(), $this->profile->getProfileId(), $this->getCharacterId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("favorite"));
		$this->assertEquals($pdoFavorite->getFavoriteProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoFavorite->getFavoriteCharacterId(), $this->character->getCharacterId());

		//format the date to seconds since the beginning of time to avoid a round off error
		$this->assertEquals($pdoFavorite->getFavoriteDate()->getTimeStamp(), $this->VALID_FAVORITEDATE->getTimestamp());
}

//	/**
//	 * test grabbing a favorite that does not exist
//	 */
//	public function testGetFavoriteByFavoriteProfileIdAndFavoriteCharacterId() {
//		$favorite = Favorite::getFavoriteByFavoriteProfileIdAndFavoriteCharacterId($this->getPDO(), generateUuidV4());
//		$this->assertNull($favorite);
//	}

	/**
	 * test grabbing a Favorite by Character Id
	 */

	public function testGetValidFavoriteByCharacterId() : void {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("favorite");

		//create a new favorite and insert into mySQL
		$favorite = new Favorite($this->profile->getProfileId(), $this->character->getCharacterId(), $this->VALID_FAVORITEDATE);
		$favorite->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Favorite::getFavoriteByFavoriteCharacterId($this->getPDO(), $this->character->getCharacterId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("favorite"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("...", $results);

		//grab the result from the array and validate it
		$pdoFavorite = $results[0];
		$this->assertEquals($pdoFavorite->getFavoriteProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoFavorite->getFavoriteCharacterId(), $this->character->getCharacterId());

		//format the data to seconds since the beginning of time to avoid round off error
		$this->assertEquals($pdoFavorite->getFavoriteDate()->getTimestamp(), $this->VALID_FAVORITEDATE->getTimestamp());
	}

	/**
	 * test grabbing a favorite by a profile id that does not exist
	 */
	public function testGetInvalidFavoriteByProfileId() : void {
		//grab a character id that exceeds the maximum allowable profile id
		$favorite = Favorite::getFavoriteByFavoritProfileId($this->getPDO(), generateUuidV4());
		$this->assertCount(0, $favorite);
	}

}