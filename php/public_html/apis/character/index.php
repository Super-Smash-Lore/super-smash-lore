<?php

//Character API for Odyssey of Ultimate

require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoloader.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/jwt.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");

use SuperSmashLore\SuperSmashLore\Character;

/**
 * API for Character
 *
 * @author rbuchholz425
 * @version 1.0
 */

//verify the session and if it is not active, then start it!
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	//grab the MySQL connection to use

	$secrets = new \Secrets("/etc/apache2/capstone-mysql/smash.ini");
	$pdo = $secrets->getPdoObject();

	//determine which HTTP method was used
	$method = $_SERVER["HTTP_X_HTTP_METHOD"] ?? $_SERVER["REQUEST_METHOD"];

	//sanitize the input
	$id = filter_input(INPUT_GET, "id",FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$characterName = filter_input(INPUT_GET, "characterName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$characterUniverse = filter_input(INPUT_GET, "characterUniverse", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

//	//make sure the character id is valid for the methods that requires it
//	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true)) {
//		throw(new InvalidArgumentException("character id cannot be empty or negative", 405));
//	}

	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//gets character by its content
		if(empty($id) === false) {
			$reply->data = Character::getCharacterByCharacterId($pdo, $id);
		} else if(empty($characterName) === false) {
			$reply->data = Character::getCharactersByCharacterName($pdo, $characterName)->toArray();
		} else if(empty($characterUniverse) === false) {
			$reply->data = Character::getCharacterByCharacterUniverse($pdo, $characterUniverse)->toArray();
			}
		}
} catch(\Exception | TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}

//encode and return reply to front end caller
header("Content-type: application/json");
echo json_encode($reply);