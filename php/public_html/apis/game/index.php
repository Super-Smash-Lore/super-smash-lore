<?php

require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoloader.php";
require_once ("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";
require_once ("/etc/apache2/capstone-mysql/Secrets.php");
use SuperSmashLore\SuperSmashLore\{Profile, Character, favorite, Game};
/**
 * api for the game class
 *
 * @author jmashke4
 */
// verify session, start if not active
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
try {
	$secrets = new\Secrets("/etc/apache2/capstone-mysql/smash.ini");
	$pdo = $secrets->getPdoObject();
	//determine which HTTP method was used
	$method = $_SERVER["HTTP_X_HTTP_METHOD"] ?? $_SERVER["REQUEST_METHOD"];
	//sanitize input
	$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$gameCharacterId = filter_input(INPUT_GET, "gameCharacterId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	//make sure the id is valid for method that require it
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true)) {
		throw (new InvalidArgumentException("Id cannot be empty or negative", 402));
	}
	//handle GET request - if id is present, that game is returned, otherwise all games returned
	if($method === "GET") {
		//set xsrf cookie
		setXsrfCookie();
		//get a specific game or all games and update reply
		if(empty($id) === false) {
			$reply->data = Game::getGameByGameId($pdo, $id);
		} elseif(empty($gameCharacterId) === false) {
			$reply->data = Game::getGameByGameCharacterId($pdo, $gameCharacterId)->toArray();
		} else {
			$reply->data = Game::getAllGames($pdo)->toArray();

		}
	} elseif($method === "PUT" || $method === "POST") {
		//enforce the user has a xsrf token
		verifyXsrf();
	}
	$requestContent = file_get_contents("php://input");
	//Retrieves the JSON package that the front end sent, and stores it in the $requestContent
	$requestContent = json_decode($requestContent);
	if($method === "PUT") {
		$game = Game::getGameByGameId($pdo, $id);
		if($game === null) {
			throw (new RuntimeException("game does not exist", 400));
		}
	}
} catch(\Exception | \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
//encode and return reply to front end caller
header("Content-type: application/json");
echo json_encode($reply);
