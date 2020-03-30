<?php
require_once dirname(__DIR__, 2) . "/lib/uuid.php";
require_once dirname(__DIR__, 2) . "/lib/xsrf.php";
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
require_once (dirname(__DIR__,2) . "/Classes/autoloader.php");
require_once("/etc/apache2/capstone-mysql/Secrets.php");
use SuperSmashLore\SuperSmashLore\{Character, Game};
//author @Ryan Torske
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
$secrets = new \Secrets("/etc/apache2/capstone-mysql/smash.ini");
$pdo = $secrets->getPdoObject();
try {
	$smashJson = @file_get_contents("smashfinal.json");
	if($smashJson === false) {
		throw(new RuntimeException("Unable to read diceware data", 500));
	}
	$characters = json_decode($smashJson);
	$games = json_decode($smashJson);
	foreach($characters as $currentValue) {
		//create each individual character
		$character = new Character(generateUuidV4(), $currentValue->characterDescription, $currentValue->characterMusicUrl, $currentValue->characterName, $currentValue->characterPictureUrl, $currentValue->characterQuotes, $currentValue->characterReleaseDate, $currentValue->characterSong, $currentValue->characterUniverse);
		$character->insert($pdo);
		$gamePictureUrls = explode(",", $currentValue->gamePictureUrl);
		var_dump($gamePictureUrls);
		$gameUrls = explode(",", $currentValue->gameUrl);
		var_dump($gameUrls);
		foreach($gamePictureUrls as $c => $value)
			//create each individual game for the character page
			$game = new Game(generateUuidV4(), $character->getCharacterId(), $gamePictureUrls[$c], "no system", $gameUrls[$c]);
		$game->insert($pdo);
	}
}
catch
(\RuntimeException | \InvalidArgumentException | \RangeException | \Exception | \TypeError $exception ) {
	echo($exception->getTraceAsString() . PHP_EOL);
	echo($exception->getMessage());
}
