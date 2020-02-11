<?php
namespace OdysseyOfUltimate;
require_once (dirname(__DIR__, 1) . "/Classes/autoloader.php");
use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;

trait ValidateUuid {
	private static function validateUuid($newUuid) : \Ramsey\Uuid\Uuid {
		if(gettype($newUuid) === "string") {
			if(strlen($newUuid) === 16) {
				$newUuid = bin2hex($newUuid);
				$newUuid = substr($newUuid, 0, 8) . "-". substr($newUuid, 8, 4). "-". substr($newUuid, 12, 4) . "-". substr($newUuid, 16, 4)
					. "-" . substr($newUuid,20, 12);
			}
			if(strlen($newUuid) === 36) {
				if(Uuid::isValid($newUuid) === false) {
					throw (new \InvalidArgumentException("invalid uuid"));
				}
				$uuid = Uuid::fromString($newUuid);
			} else {
				throw (new \InvalidArgumentException("invalid uuid"));
			}
		} elseif(gettype($newUuid) === "object" && get_class($newUuid) === "Ramsey\\Uuid\\Uuid") {
			$uuid = $newUuid;
		} else {
			throw (new \InvalidArgumentException("invalid uuid"));
		}
		if($uuid->getVersion() !== 4) {
			throw (new \RangeException("uuid is wrong version"));
		}
		return($uuid);
	}
}