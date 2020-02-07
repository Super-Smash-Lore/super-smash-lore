<?php

namespace SSBULoreApp\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "\Classes\autoloader.php");

use Jmashke4\SuperSmashLore\ValidateDate;
use Jmashke4\SuperSmashLore\ValidateUuid;
use Ramsey\Uuid\Uuid;
class Character {
	use ValidateUuid;
	use ValidateDate;
	/*
	 * id for character: this is the primary key
	 */
	private $characterId;
	/*
	 * description of character
	 */
	private $characterDescription;
	/*
	 * music for character
	 */
	private $characterMusicUrl;
	/*
	 * picture for character
	 */
	private $characterPictureUrl;
	/*
	 * quotes from the character
	 */
	private $characterQuotes;
	/*
	 * date the character was released
	 */
	private $characterReleaseDate;
	/*
	 * song for the character
	 */
	private $characterSong;
	/*
	 * universe character lives in
	 */
	private $characterUniverse;
	/*
	 * constructor for character
	 */

	public function __construct($newCharacterId,$newCharacterDescription,$newCharacterMusicUrl,$newCharacterPictureUrl,$newCharacterQuotes,$newCharacterReleaseDate,$newCharacterSong, $newCharacterUniverse) {
		try {
			$this->setCharacterId($newCharacterId);
			$this->setCharacterDescription($newCharacterDescription);
			$this->setCharacterMusicUrl($newCharacterMusicUrl);
			$this->setCharacterPictureUrl($newCharacterPictureUrl);
			$this->setCharacterQuotes($newCharacterQuotes);
			$this->setCharacterReleaseDate($newCharacterReleaseDate);
			$this->setCharacterSong($newCharacterSong);
			$this->setCharacterUniverse($newCharacterUniverse);
		}
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError$exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0 ,$exception));
		}
	}

	/*
	 * accessor for character id
	 */
	public function getCharacterId() {
		return $this->characterId;
	}

	/*
	 * setter for character Id
	 */
	public function setCharacterId( $newCharacterId) : void {
		try {
			$uuid = self::validateUuid($newCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->characterId = $uuid;
	}

	/*
	 * accessor for character description
	 */

	public function getCharacterDescription (){
		return $this->characterDescription;
	}

	/*
	 * setter for character description
	 */

	public function setCharacterDescription(string $newCharacterDescription){
		$newCharacterDescription = trim($newCharacterDescription);
		$newCharacterDescription = filter_var($newCharacterDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterDescription) === true) {
			throw (new\InvalidArgumentException("description is empty or insecure"));
		}
		if(strlen($newCharacterDescription) > 255) {
			throw (new\RangeException("Description must be 255 characters or less"));
		}
		$this->characterDescription = $newCharacterDescription;
	}

	/*
	 * accessor for character music url
	 */
	public function getCharacterMusicUrl () {
		return $this->characterMusicUrl;
	}

	/*
	 * setter for character music url
	 */
	public function setCharacterMusicUrl (string $newCharacterMusicUrl) {
		$newCharacterMusicUrl = trim($newCharacterMusicUrl);
		$newCharacterMusicUrl = filter_var($newCharacterMusicUrl, FILTER_VALIDATE_URL);
		if(empty($newCharacterMusicUrl) === true) {
			throw (new \InvalidArgumentException("Music Url is empty or insecure"));
		}
		if(strlen($newCharacterMusicUrl) > 512) {
			throw (new \RangeException("music url must be fewer then 512 characters"));
		}
		$this->characterMusicUrl = $newCharacterMusicUrl;
	}

	/*
	 * accessor for character picture url
	 */
	public function getCharacterPictureUrl(){
		return $this->characterPictureUrl;
	}

	/*
	 * setter for character picture url
	 */
	public function setCharacterPictureUrl (string $newCharacterPictureUrl) {
		$newCharacterPictureUrl = trim($newCharacterPictureUrl);
		$newCharacterPictureUrl = filter_var($newCharacterPictureUrl, FILTER_VALIDATE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterPictureUrl) === true) {
			throw (new \InvalidArgumentException("picture url is empty or insecure"));
		}
		if(strlen($newCharacterPictureUrl) > 512) {
			throw (new \RangeException("Picture Url must be fewer than 512 characters"));
		}
		$this->characterPictureUrl = $newCharacterPictureUrl;
	}

	/*
	 * accessor for character quotes
	 */
	public function getCharacterQuotes() {
		return $this->characterQuotes;
	}

	/*
	 * setter for character quotes
	 */
	public function setCharacterQuotes(string $newCharacterQuotes) {
		$newCharacterQuotes = trim($newCharacterQuotes);
		$newCharacterQuotes = filter_var($newCharacterQuotes, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterQuotes) === true) {
			throw (new \InvalidArgumentException("quote empty or insecure"));
		}
		if(strlen($newCharacterQuotes) > 255) {
			throw (new \RangeException("quote must be fewer than 255 characters"));
		}
		$this->characterQuotes = $newCharacterQuotes;
	}

	/*
	 * getter for release date
	 */
	public function getCharacterReleaseDate() {
		return $this->characterReleaseDate;
	}

	/**
	 * setter for release date
	 */
	public function setCharacterReleaseDate ($newCharacterReleaseDate) : void {
		try {
			$releaseDate = self::validateDate($newCharacterReleaseDate);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->characterReleaseDate = $releaseDate;
	}

	/*
	 * getter for character song
	 */
	public function getCharacterSong() {
		return $this->characterSong;
	}

	/*
	 * setter for character song
	 */
	public function setCharacterSong ($newCharacterSong)  {
		$newCharacterSong = trim($newCharacterSong);
		$newCharacterSong = filter_var($newCharacterSong, FILTER_VALIDATE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterSong) === true) {
			throw (new \InvalidArgumentException("Song is empty or insecure"));
		}
		if(strlen($newCharacterSong) > 255) {
			throw (new \RangeException("Song must be fewer then 255 characters"));
		}
	}

	/*
	 *accessor for character universe
	 */
	public function getCharacterUniverse () {
		return $this->characterUniverse;
	}

	/*
	 * setter for character universe
	 */
	public function setCharacterUniverse ($newCharacterUniverse) {
		$newCharacterUniverse = trim($newCharacterUniverse);
		$newCharacterUniverse = filter_var($newCharacterUniverse, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterUniverse) === true) {
			throw (new \InvalidArgumentException("universe is empty or insecure"));
		}
		if(strlen($newCharacterUniverse) > 255) {
			throw (new \RangeException("Universe too big"));
		}
		$this->characterUniverse = $newCharacterUniverse;
	}

	/*
	 * inserts into character in MySQL
	 */
	public function insert(\PDO $pdo) : void {
		$query = "INSERT INTO character(characterId, characterDescription, characterMusicUrl, characterPictureUrl, characterQuotes, characterReleaseDate, characterSong, characterUniverse) 
					VALUES (:characterId, :charcterDescription, :characterMusicUrl, :characterPictureUrl, :characterQuotes, :characterReleaseDate, :characterSong, :characterUnivers)";
		$statement = $pdo->prepare($query);
		$parameters = ["characterId" => $this->characterId->getBytes(), "characterDescription" => $this->characterDescription, "characterMusicUrl" => $this->characterMusicUrl,
			"characterPictureUrl" => $this->characterPictureUrl, "characterQuotes" => $this->characterQuotes, "characterReleaseDate" => $this->characterReleaseDate,
			"characterSong" => $this->characterSong, "characterUniverse" => $this->characterUniverse];
		$statement->execute($parameters);
	}

	/*
	 * updates character in character table
	 */
	public function update(\PDO $pdo) : void {
		$query = "UPDATE character SET characterId = :characterId, characterDescription = :characterDescription, characterMusicUrl = :characterMusicUrl, characterPictureUrl = :characterPictureUrl,
					characterQuotes = :characterQuotes, characterReleaseDate = :characterReleaseDate, characterSong = :characterSong, characterUniverse = :characterSong";
		$statement = $pdo->prepare($query);
		$parameters = ["characterId" =>$this->characterId->getBytes(), "characterDescription" => $this->characterDescription, "characterMusicUrl" => $this->characterMusicUrl, "characterPictureUrl" => $this->characterPictureUrl,
							"characterQuotes" => $this->characterQuotes, "characterReleaseDate" => $this->characterReleaseDate, "characterSong" => $this->characterSong, "characterUniverse" => $this->characterUniverse];
		$statement->execute($parameters);
	}

	/*
	 * deletes a character from character table
	 */
	public function delete(\PDO $pdo) : void {
		$query = "DELETE FROM character WHERE characterId = :characterId";
		$statement = $pdo->prepare($query);
		$parameters = ["characterId" => $this->characterId->getBytes()];
		$statement->execute($parameters);
	}
	/**
	 * gets Character by characterId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $characterId character id to search for
	 * @return Character|null Character found or null if not found
	 * @throws \PDOException when MySQL related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 **/
	public static function getCharacterByCharacterId(\PDO $pdo, $characterId) : ?Character {
		//sanitize the characterId before searching
		try {
			$characterId = self::validateUuid($characterId);
		} catch(\InvalidArgumentException| \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT characterId, characterDescription, characterMusicUrl, characterPictureUrl, characterQuotes, characterReleaseQuotes, characterSong, characterUniverse FROM Character WHERE characterId";
		$statement =$pdo->prepare($query);
		//bind the character id to the place holder in the template
		$parameters = ["characterId" => $characterId->getBytes()];
		$statement->execute($parameters);
		//grab character from MySQL
		try {
			$character =  null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$character = new Character($row["characterId"], $row["characterDescription"], $row["characterMusicUrl"], $row["characterPictureUrl"], $row["characterQuotes"], $row["characterReleaseDate"], $row["characterSong"], $row["characterUniverse"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($character);
	}
	/**
	 * gets Character by characterUniverse
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string characterUniverse to search by
	 * @return \SplFixedArray SplFixedArray of characters found
	 * @throws \PDOException when MySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getCharacterByCharacterUniverse(\PDO $pdo, $characterUniverse) : \SplFixedArray {
		//sanitize the description before searching
		$characterUniverse = trim($characterUniverse);
		$characterUniverse = filter_var($characterUniverse, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		//escape anyMySQL wild cards
		$result = str_replace("%", "\\%", $characterUniverse);
		$characterUniverse = str_replace("_", "\\_", $result);
		//create a query template
		$query = "SELECT characterId, characterDescription, characterMusicUrl, characterPictureUrl, characterQuotes, characterReleaseQuotes, characterSong, characterUniverse FROM Character WHERE characterUniverse LIKE :characterUniverse";
		$statement = $pdo->prepare($query);
		//bind the character universe to the place holder in the template
		$characterUniverse = "%$characterUniverse%";
		$parameters = ["characterUniverse" => $characterUniverse];
		$statement->execute($parameters);
		//build array of characters
		$characterUniverseArray = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$character = new Character($row["characterId"], $row["characterDescription"], $row["characterMusicUrl"], $row["characterPictureUrl"], $row["characterQuotes"], $row["characterReleaseDate"], $row["characterSong"], $row["characterUniverse"]);
				$characterUniverseArray[$characterUniverseArray->key()] = $character;
				$characterUniverseArray->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($characterUniverseArray);
	}

}
