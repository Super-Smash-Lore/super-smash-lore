<?php
use SuperSmashLore\SuperSmashLore\{Character};

require_once (dirname(__dir__) . "/Classes/autoloader.php");
require_once (dirname(__dir__, 1) . "/vendor/autoload.php");
require_once ("/etc/apache2/capstone-mysql/Secrets.php");
require_once ("uuid.php");
$secrets = new \Secrets("/etc/apache2/capstone-mysql/smash.ini");
$pdo = $secrets->getPdoObject();

$profile = new Character("dc7fb853-7171-40d8-8d73-3506905d0067","King of thieves", "https://www.uygr.com", "Ganondorf", "https://www.tfyubsydc.com", "Albuquerque", "07/14/1986", "http://www.hhhdhd.com", "Legend of Zelda");
$profile->insert($pdo);