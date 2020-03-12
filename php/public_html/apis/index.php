<?php
require_once dirname(__DIR__, 2) . "/lib/uuid.php";
require_once dirname(__DIR__, 2) . "/lib/xsrf.php";
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
use SuperSmashLore\SuperSmashLore\{Character, Game};

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;


try {
	$smashJson = @file_get_contents("smashJson.json");

	if($smashJson === false) {
		throw(new RuntimeException("Unable to read diceware data", 500));
	}
	$characters = json_decode($smashJson);

	foreach($characters as $currentValue) {
		var_dump($currentValue);
		$character = new Character(generateUuidV4(), $currentValue->characterDescription, $currentValue->characterMusicUrl, $currentValue->characterName, $currentValue->characterPictureUrl, $currentValue->characterQuotes, $currentValue->characterReleaseDate, $currentValue->characterSong, $currentValue->characterUniverse);
//		$character = new Character(generateUuidV4(), "Mario is the main Protagonist for the Mario Series that has well over 50 games. He originally was featured in the Donkey Kong original in 1981. Mario is known for being kind, cheerful, playful, courageous, and headstrong and is also eager and cocky in certain occasions. Mario is always seen as a hero throughout the franchise. Whether it be rescuing a Princess or defeating the evil that gripped the land. Most often seen taking down castles and defeating the menacing Bowser and rescuing Princess Peach countless times. Try out some other games if you love side scrolling platformers or try one of the 3D open world games like Mario Odyssey which is more open world with plenty of challenges.", "https://www.youtube.com/watch?v=0IuKgivLCLg&list=PLUzxirmuFjBmpiQEbgwjUexgXk1RcD00B&index=1", "Mario", "https://vignette.wikia.nocookie.net/ssb/images/0/07/Mario_-_Super_Smash_Bros._Ultimate.png/revision/latest/scale-to-width-down/350?cb=20180910105834", "Let's-a go!, \"Mamma-Mia!\", \"Okey-dokey\", \"Here we go!\", \"It's-a me, Mario", "July 9th, 1981", "Ground Theme (Band Performance)", "Mario Universe");

//		$game = new Game(generateUuidV4(), $currentValue->gameCharacterId, $currentValue->gamePictureUrl, $currentValue->gameSystem, $currentValue->gameUrl);
	}

} catch (\Exception | \RuntimeException $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
	var_dump($exception);
}


