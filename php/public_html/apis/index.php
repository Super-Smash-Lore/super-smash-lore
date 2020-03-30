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
		$c = explode(",", $currentValue->gamePictureUrl);
		var_dump($c);
		$c = explode(",", $currentValue->gameUrl);
		var_dump($c);
	for($c = 0; $c <= 3; $c++)
			//create each individual game for the character page
			$game = new Game(generateUuidV4(), $character->getCharacterId(), $currentValue->gamePictureUrl, $currentValue->gameSystem, $currentValue->gameUrl);
			$game->insert($pdo);
	}
}
catch
(\RuntimeException | \InvalidArgumentException | \RangeException | \Exception | \TypeError $exception ) {
	echo($exception->getTraceAsString() . PHP_EOL);
	echo($exception->getMessage());
}
//TRYING TO USE EXPLODE
//		$c = explode($currentValue->characterQuotes, "\"\"");
//		var_dump($currentValue->characterQuotes);
//
//		$c = explode( " ", "$currentValue->characterDescription");
//		var_dump($currentValue->characterDescription);
//
//		$c = explode( " ", "$currentValue->characterMusicUrl");
//		var_dump($currentValue->characterMusicUrl);
//
//		$c = explode(" ", "$currentValue->characterName");
//		var_dump($currentValue->characterName);
//
//		$c = explode(" ", "$currentValue->characterPictureUrl");
//		var_dump($currentValue->characterPictureUrl);
//
//		$c = explode(" ", "$currentValue->characterQuotes");
//		var_dump($currentValue->characterQuotes);
//
//		$c = explode(" ", "$currentValue->characterReleaseDate");
//		var_dump($currentValue->characterReleaseDate);
//
//		$c = explode(" ", "$currentValue->characterSong");
//		var_dump($currentValue->characterSong);
//
//		$c = explode(" ", "$currentValue->characterUniverse");
//		var_dump($currentValue->characterUniverse);

//
//		//USING EXPLODE
//		$c = explode(" ", "\"\"");
//		var_dump($currentValue->characterDescription);
//
//		$c = explode(" ", "\"\"");
//		var_dump($currentValue->characterMusicUrl);
//
//		$c = explode(" ", "\"\"");
//		var_dump($currentValue->characterName);
//
//		$c = explode(" ", "\"\"");
//		var_dump($currentValue->characterPictureUrl);
//
//		$c = explode(",", $currentValue->characterQuotes);
//		var_dump($c);
//
//		$c = explode("/", $currentValue->characterReleaseDate);
//		var_dump($c);
//
//		$c = explode(" ", "\"\"");
//		var_dump($currentValue->characterSong);
//
//		$c = explode(" ", "\"\"");
//		var_dump($currentValue->characterUniverse);

//		var_dump($currentValue);
//		var_dump($currentValue->characterName);
//		var_dump($currentValue->characterReleaseDate);
//		var_dump($currentValue->gameSystem);
//		var_dump($currentValue->characterDescription);
//		var_dump($currentValue->characterQuotes);
//		var_dump($currentValue->characterSong);
//		var_dump($currentValue->characterUniverse);
//		var_dump($currentValue->characterPictureUrl);
//		var_dump($currentValue->gamePictureUrl);



