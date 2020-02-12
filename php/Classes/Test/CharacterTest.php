<?php
namespace SuperSmashLore\SuperSmashLore\Test;
use SuperSmashLore\SuperSmashLore\{
	Profile, Character, Favorite, Game
};

//grab the class under scrutiny
require_once (dirname(__DIR__) . "/autoloader.php");

//grab the uuid generator
require_once (dirname(__DIR__) . "/ValidateUuid.php");

/**
 * Full PhpUnit test for the Character class
 *
 * This is a complete PHPUnit test of the Character class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Character
 * @author Ryan Buchholz
 */
class CharacterTest extends SuperSmashLoreTest {
	/**
	 * place holder until account activation is created
	 * @var string
	 */
}
