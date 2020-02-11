<?php
namespace OdysseyOfUltimate;
use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;
trait ValidateDate {

	private static function validateDate($newDate) : \DateTime {
		if(is_object($newDate) === true && get_class($newDate) === "DateTime") {
			return ($newDate);
		}
		$newDate = trim($newDate);
		if((preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $newDate, $matches)) !== 1) {
			throw(new \InvalidArgumentException("date is not a valid date"));
		}
		$year = intval($matches[1]);
		$month = intval($matches[2]);
		$day = intval($matches[3]);
		if(checkdate($month, $day, $year) === false) {
			throw(new \RangeException("date is not a Gregorian date"));
		}
		$newDate = \DateTime::createFromFormat("Y-m-d H:i:s", $newDate . " 00:00:00");
		return($newDate);
	}
	private static function validateDateTime($newDateTime) : \DateTime {
		if(is_object($newDateTime) === true && get_class($newDateTime) === "DateTime") {
			return($newDateTime);
		}
		try {
			list($date, $time) = explode(" ", $newDateTime);
			$date = self::validateDate($date);
			$time = self::validateTime($time);
			list($hour, $minute, $second) = explode(":", $time);
			list($second, $microseconds) = explode(".", $second);
			$date->setTime($hour, $minute, $second, $microseconds);
			return($date);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	private static function validateTime(string $newTime) : string {
		$newTime = trim($newTime);
		if((preg_match("/^(\d{2}):(\d{2}):(\d{2})(?(?=\.)\.(\d{1,6})$/", $newTime, $matches)) !== 1) {
			throw(new \InvalidArgumentException("time is not a valid time"));
		}
		$hour = intval($matches[1]);
		$minute = intval($matches[2]);
		$second = intval($matches[3]);
		if($hour < 0 || $hour >= 24 || $minute < 0 || $minute >= 60 || $second < 0  || $second >= 60) {
			throw(new \RangeException("date is not a valid wall clock time"));
		}
		$microseconds = $matches[4] ?? "0";
		$newTime = "$hour:$minute:$second.$microseconds";
		return($newTime);
	}
}
