<?php
require_once dirname(__DIR__, 2) . "/lib/uuid.php";
require_once dirname(__DIR__, 2) . "/lib/xsrf.php";
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	$smashJsonEdited = @file_get_contents("smashJsonEdited.json");

	if($smashJsonEdited === false) {
		throw(new RuntimeException("Unable to read diceware data", 500));
	}
	$characters = json_decode($smashJsonEdited);


} catch(\Exception | \RuntimeException $exception) {
	var_dump($characters);
}