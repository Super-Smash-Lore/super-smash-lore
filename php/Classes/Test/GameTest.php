<?php
namespace SuperSmashLore\SuperSmashLore;

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
		$this->characterId = new Character(generateUuidv4(), null, "charactermusic.com", "characterpucture.com",
			"regmvfmverfvev", 12/12/12, "itsbritneybitch", 215);
		$this->characterId->insert($this->getPDO());
	}

	/**
	 *
	 **/
}