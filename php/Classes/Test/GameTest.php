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
	  * valid picture 
	  **/
	protected $VALID_PICTURE_URL;

	/**
	 *
	 **/
}