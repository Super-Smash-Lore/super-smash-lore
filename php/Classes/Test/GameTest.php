<?php
namespace SuperSmashLore\SuperSmashLore;

use Ramsey\Uuid\Uuid;
use SuperSmashLore\SuperSmashLore\Game;

//grab the class under scrutiny
require_once(dirname(__DIR__) . "autoloader.php");
//grab the uuid generator
require_once (dirname(__DIR__, 2) . "/ValidateUuid.php");
/**
 * Full PHPUnit test of Game class. It is complete because all mySQL/PDO enabled methods are tested for both invalid and valid inputs
 *
 * @see Game
 * @author Josh Mashke <jmashke@cnm.edu>
 **/
class GameTest extends SuperSmashLoreTest {
	/**
	 * game Id
	 * @var Uuid game Id
	 */

	/**
	 * game that a character comes from; This is for foreign kew relations
	 **/
	protected $characterId = null;
	 /**
	  * valid picture url
	  * @var string $VALID_PICTURE_URL
	  **/
	protected $VALID_PICTURE_URL;

	/**
	 *valid game system
	 * @var string $VALID_GAME_SYSTEM
	 **/
	protected $VALID_GAME_SYSTEM;

	/**
	 * valid game url
	 * @var string $VALID_GAME_URL
	 **/
	protected $VALID_GAME_URL;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() : void {
		// create and insert character to own the test game
		$this->characterId = new Character(generateUuidV4(), null, "characterMusic.com", "britneyBitch",
			"characterPicture.com", "whatever", "right now", 215, "iurgieuni");
		$this->characterId->insert($this->getPDO());
	}

	/**
	 *test inserting a valid game and verifying that the actual mySQL data matches
	 **/
	public function testInsertValidGame() : void {

		//create a new Game and insert into mySQL
		$gameId = generateUuidV4();
		$game = new Game($gameId, $this->characterId->getCharacterId(), $this->VALID_GAME_URL, $this->VALID_GAME_SYSTEM, $this->VALID_PICTURE_URL);
		$game->insert($this->getPDO());

		//grb the data from mySQL nd enforce the fields match our expectations
		$pdoGame = Game::getGameByGameId($this->getPDO(), $game->getGameId());
		$this->assertEquals($pdoGame->getGameId()->toString(), $gameId->toString());
		$this->assertEquals($pdoGame->getGameCharacterId(), $game->getGameId()->toString());
		$this->assertEquals($pdoGame->getGameSystem(), $this->VALID_GAME_SYSTEM);
		$this->assertEquals($pdoGame->getGamePicture(), $this->VALID_PICTURE_URL);
		$this->assertEquals($pdoGame->getGameUrl(), $this->VALID_GAME_URL);
	}

	/**
	 * test inserting, editing, and updating it
	 **/
	public function testUpdateValidGame() : void {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("game");
		//create a new game and insert into mySQL
		$gameId = generateUuidV4();
		$game = new Game($gameId, $this->characterId->getCharacterId(), $this->VALID_GAME_URL, $this->VALID_GAME_SYSTEM, $this->VALID_PICTURE_URL);
		$game->insert($this->getPDO());
		//create
	}
}