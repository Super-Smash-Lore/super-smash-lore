<?php

namespace SuperSmashLore\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "\Classes\autoloader.php");

use Ramsey\Uuid\Uuid;
class Character {
	use ValidateUuid;
	use ValidateDate;
	/**
	 * id for character: this is the primary key
	 * @var Uuid $characterId
	 */
	private $characterId;
	/**
	 * description of character
	 * @var $characterDescription
	 */
	private $characterDescription;
	/**
	 * music for character
	 * @var $characterMusicUrl
	 */
	private $characterMusicUrl;
	/**
	 * name for character
	 * @var $characterName
	 */
	private $characterName;
	/**
	 * picture for character
	 * @var $characterPictureUrl
	 */
	private $characterPictureUrl;
	/**
	 * quotes from the character
	 * @var $characterQuotes
	 */
	private $characterQuotes;
	/**
	 * date the character was released
	 * @var $characterReleaseDate
	 */
	private $characterReleaseDate;
	/**
	 * song for the character
	 * @var $characterSong
	 */
	private $characterSong;
	/**
	 * universe character lives in
	 * @var $characterUniverse
	 */
	private $characterUniverse;
	/**
	 * constructor for character
	 * @param string|Uuid $newCharacterId id of this Character or null if a new Character
	 * @param string $newCharacterDescription description of the Character
	 * @param string $newCharacterMusicUrl music url for Character
	 * @param string $newCharacterName name of the Character
	 * @param string $newCharacterPictureUrl picture url for Character
	 * @param string $newCharacterQuotes quotes for the Character
	 * @param string $newCharacterReleaseDate original release date for Character
	 * @param string $newCharacterSong song for Character
	 * @param string $newCharacterUniverse game universe for Character
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of set range
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception is some other exception occurs
	 */

	public function __construct($newCharacterId,$newCharacterDescription,$newCharacterMusicUrl,$newCharacterName,$newCharacterPictureUrl,$newCharacterQuotes,$newCharacterReleaseDate,$newCharacterSong, $newCharacterUniverse) {
		try {
			$this->setCharacterId($newCharacterId);
			$this->setCharacterDescription($newCharacterDescription);
			$this->setCharacterMusicUrl($newCharacterMusicUrl);
			$this->setCharacterName($newCharacterName);
			$this->setCharacterPictureUrl($newCharacterPictureUrl);
			$this->setCharacterQuotes($newCharacterQuotes);
			$this->setCharacterReleaseDate($newCharacterReleaseDate);
			$this->setCharacterSong($newCharacterSong);
			$this->setCharacterUniverse($newCharacterUniverse);
		}
		//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError$exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0 ,$exception));
		}
	}

	/**
	 * accessor for character id
	 *
	 * @return Uuid value for character id (or null if new character)
	 *
	 * @return Uuid
	 */
	public function getCharacterId() {
		return $this->characterId;
	}

	/**
	 * mutator (setter) for character Id
	 *
	 * @param Uuid|string $characterId value of new character Id
	 * @throws \RangeException if $characterId is not positive
	 * @throws \TypeError if character Id is not valid syntax or logic
	 */
	public function setCharacterId( $newCharacterId) : void {
		try {
			$uuid = self::validateUuid($newCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store character id
		$this->characterId = $uuid;
	}

	/**
	 * accessor for character description
	 *
	 * @return string value of character description
	 */

	public function getCharacterDescription (){
		return $this->characterDescription;
	}

	/**
	 * mutator (setter) for character description
	 *
	 * @param string $newCharacterDescription
	 * @throws \InvalidArgumentException if the description is not a string or insecure
	 * @throws \RangeException if the description is over 1600 characters
	 * @throws \TypeError if the character description is not a string
	 */

	public function setCharacterDescription(string $newCharacterDescription){
		$newCharacterDescription = trim($newCharacterDescription);
		$newCharacterDescription = filter_var($newCharacterDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterDescription) === true) {
			throw (new\InvalidArgumentException("description is empty or insecure"));
		}
		//checking if the description under 1600 characters
		if(strlen($newCharacterDescription) > 1600) {
			throw (new\RangeException("Description must be 1600 characters or less"));
		}
		//store the description
		$this->characterDescription = $newCharacterDescription;
	}

	/**
	 * accessor for character music url
	 *
	 * @return string value of music url
	 */
	public function getCharacterMusicUrl () {
		return $this->characterMusicUrl;
	}

	/**
	 * mutator (setter) for character music url
	 *
	 * @param string $newCharacterMusicUrl
	 * @throws \InvalidArgumentException if the music url is not a string or insecure
	 * @throws \RangeException if the music url is over 255 characters
	 * @throws \TypeError if the music url is not a string
	 */
	public function setCharacterMusicUrl (string $newCharacterMusicUrl) {
		$newCharacterMusicUrl = trim($newCharacterMusicUrl);
		$newCharacterMusicUrl = filter_var($newCharacterMusicUrl, FILTER_VALIDATE_URL);
		if(empty($newCharacterMusicUrl) === true) {
			throw (new \InvalidArgumentException("Music Url is empty or insecure"));
		}
		//checking if the music url is under 255 characters
		if(strlen($newCharacterMusicUrl) > 255) {
			throw (new \RangeException("music url must be fewer then 255 characters"));
		}
		//store the music url
		$this->characterMusicUrl = $newCharacterMusicUrl;
	}

	/**
	 * accessor for the character name
	 *
	 * @return string value of character name
	 */
	public function getCharacterName () {
		return $this->characterName;
	}

	/**
	 * mutator (setter) for the character name
	 *
	 * @param string $newCharacterName
	 * @throws \InvalidArgumentException if the character name is not a string or insecure
	 * @throws \RangeException if the character name is over 32 characters
	 * @throws \TypeError if the character name is not a string
	 */
	public function setCharacterName(string $newCharacterName){
		$newCharacterName = trim($newCharacterName);
		$newCharacterName = filter_var($newCharacterName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterName) === true) {
			throw (new\InvalidArgumentException("description is empty or insecure"));
		}
		//checking if the character name is under 32 characters
		if(strlen($newCharacterName) > 32) {
			throw (new\RangeException("Description must be 32 characters or less"));
		}
		//store the name
		$this->characterName = $newCharacterName;
	}

	/**
	 * accessor for character picture url
	 *
	 * @return string value of picture url
	 */
	public function getCharacterPictureUrl(){
		return $this->characterPictureUrl;
	}

	/**
	 * mutator (setter) for character picture url
	 *
	 * @param string $newCharacterPictureUrl
	 * @throws \InvalidArgumentException if the picture url is not a string or insecure
	 * @throws \RangeException if the picture url is over 255 characters
	 * @throws \TypeError if the character picture url is not a string
	 */
	public function setCharacterPictureUrl (string $newCharacterPictureUrl) {
		$newCharacterPictureUrl = trim($newCharacterPictureUrl);
		$newCharacterPictureUrl = filter_var($newCharacterPictureUrl, FILTER_VALIDATE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterPictureUrl) === true) {
			throw (new \InvalidArgumentException("picture url is empty or insecure"));
		}
		//checking that the picture url is under 255 characters
		if(strlen($newCharacterPictureUrl) > 255) {
			throw (new \RangeException("Picture Url must be fewer than 255 characters"));
		}
		//store the picture url
		$this->characterPictureUrl = $newCharacterPictureUrl;
	}

	/**
	 * accessor for character quotes
	 *
	 * @return string value of character quotes
	 */
	public function getCharacterQuotes() {
		return $this->characterQuotes;
	}

	/**
	 * mutator (setter) for character quotes
	 *
	 * @param string $newCharacterQuotes
	 * @throws \InvalidArgumentException if the quotes are not a string or insecure
	 * @throws \RangeException if the quotes are over 1600 characters
	 * @throws \TypeError if the character quotes is not a string
	 */
	public function setCharacterQuotes(string $newCharacterQuotes) {
		$newCharacterQuotes = trim($newCharacterQuotes);
		$newCharacterQuotes = filter_var($newCharacterQuotes, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterQuotes) === true) {
			throw (new \InvalidArgumentException("quote empty or insecure"));
		}
		//checking to see if the quotes are under 155 characters
		if(strlen($newCharacterQuotes) > 255) {
			throw (new \RangeException("quote must be fewer than 255 characters"));
		}
		//store the quotes
		$this->characterQuotes = $newCharacterQuotes;
	}

	/**
	 * accessor for release date
	 *
	 * @return string value of character release date
	 */
	public function getCharacterReleaseDate() {
		return $this->characterReleaseDate;
	}

	/**
	 * mutator (setter) for release date
	 *
	 * @param string $newCharacterReleaseDate
	 * @throws \InvalidArgumentException if the release date is not a string or insecure
	 * @throws \RangeException if the release date is over 6 characters
	 * @throws \TypeError if the release date is not a string
	 *
	 * TODO: REWORK THIS FUNCTION TO MATCH A DATE/TIME METHOD POSSIBLY...?
	 */
	public function setCharacterReleaseDate ($newCharacterReleaseDate) : void {
		//checking to see if the date is a valid date and fits the format
		try {
			$releaseDate = self::validateDate($newCharacterReleaseDate);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//store the release date
		$this->characterReleaseDate = $releaseDate;
	}

	/**
	 * getter for character song
	 *
	 * @return string value of character song
	 */
	public function getCharacterSong() {
		return $this->characterSong;
	}

	/**
	 * mutator (setter) for character song
	 *
	 * @param string $newCharacterSong
	 * @throws \InvalidArgumentException if the character song is not a string or insecure
	 * @throws \RangeException if the character song is over 255 characters
	 * @throws \TypeError if the character song is not a string
	 */
	public function setCharacterSong ($newCharacterSong)  {
		//verify the song is secure and in good format
		$newCharacterSong = trim($newCharacterSong);
		$newCharacterSong = filter_var($newCharacterSong, FILTER_VALIDATE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterSong) === true) {
			throw (new \InvalidArgumentException("Song is empty or insecure"));
		}
		//checking to see if the character song is under 255 and will fit in the database
		if(strlen($newCharacterSong) > 255) {
			throw (new \RangeException("Song must be fewer then 255 characters"));
		}
		//store the song
		$this->characterSong = $newCharacterSong;
	}

	/**
	 *accessor for character universe
	 *
	 * @return  string value of character universe
	 */
	public function getCharacterUniverse () {
		return $this->characterUniverse;
	}

	/**
	 * mutator (setter) for character universe
	 *
	 * @param string $newCharacterUniverse
	 * @throws \InvalidArgumentException if the character universe is not a string or insecure
	 * @throws \RangeException if the character universe is over 255 characters
	 * @throws \TypeError if the character universe is not a string
	 */
	public function setCharacterUniverse ($newCharacterUniverse) {
		$newCharacterUniverse = trim($newCharacterUniverse);
		$newCharacterUniverse = filter_var($newCharacterUniverse, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		//checking to see if the character universe has valid data input
		if(empty($newCharacterUniverse) === true) {
			throw (new \InvalidArgumentException("universe is empty or insecure"));
		}
		//verify the character universe will fit into the database
		if(strlen($newCharacterUniverse) > 255) {
			throw (new \RangeException("Universe too big"));
		}
		//store the character universe
		$this->characterUniverse = $newCharacterUniverse;
	}

	/**
	 * inserts into character in MySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when MySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo) : void {
		//create query template
		$query = "INSERT INTO character(characterId, characterDescription, characterMusicUrl, characterName, characterPictureUrl, characterQuotes, characterReleaseDate, characterSong, characterUniverse) 
					VALUES (:characterId, :charcterDescription, :characterMusicUrl, :characterName, :characterPictureUrl, :characterQuotes, :characterReleaseDate, :characterSong, :characterUnivers)";
		$statement = $pdo->prepare($query);
		//bind the member variables to the place holders in the template
		$parameters = ["characterId" => $this->characterId->getBytes(), "characterDescription" => $this->characterDescription, "characterMusicUrl" => $this->characterMusicUrl,
			"characterName" => $this->characterName, "characterPictureUrl" => $this->characterPictureUrl, "characterQuotes" => $this->characterQuotes, "characterReleaseDate" => $this->characterReleaseDate,
			"characterSong" => $this->characterSong, "characterUniverse" => $this->characterUniverse];
		$statement->execute($parameters);
	}

//	/**
//	 * updates character in character table
//	 *
//	 * @param \PDO $pdo PDO connection object
//	 * @throws \PDOException when MySQL related errors occur
//	 * @throws \TypeError if $pdo is not a PDO connection object
//	 */
//	public function update(\PDO $pdo) : void {
//		//create query template
//		$query = "UPDATE character SET characterId = :characterId, characterDescription = :characterDescription, characterMusicUrl = :characterMusicUrl, characterPictureUrl = :characterPictureUrl,
//					characterQuotes = :characterQuotes, characterReleaseDate = :characterReleaseDate, characterSong = :characterSong, characterUniverse = :characterSong";
//		$statement = $pdo->prepare($query);
//		//binds the updated member variables to the place holders in the template
//		$parameters = ["characterId" =>$this->characterId->getBytes(), "characterDescription" => $this->characterDescription, "characterMusicUrl" => $this->characterMusicUrl, "characterPictureUrl" => $this->characterPictureUrl,
//							"characterQuotes" => $this->characterQuotes, "characterReleaseDate" => $this->characterReleaseDate, "characterSong" => $this->characterSong, "characterUniverse" => $this->characterUniverse];
//		$statement->execute($parameters);
//	}
//
//	/**
//	 * deletes a character from character table
//	 *
//	 * @param \PDO $pdo PDO connection object
//	 * @throws \PDOException when MySQL related errors occur
//	 * @throws \TypeError if $pdo is not a PDO connection object
//	 */
//	public function delete(\PDO $pdo) : void {
//		//create the query template
//		$query = "DELETE FROM character WHERE characterId = :characterId";
//		$statement = $pdo->prepare($query);
//		//sets up motion to delete said member variables in the template
//		$parameters = ["characterId" => $this->characterId->getBytes()];
//		$statement->execute($parameters);
//	}
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
		$query = "SELECT characterId, characterDescription, characterMusicUrl, characterName, characterPictureUrl, characterQuotes, characterReleaseQuotes, characterSong, characterUniverse FROM Character WHERE characterId";
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
				$character = new Character($row["characterId"], $row["characterDescription"], $row["characterMusicUrl"], $row["characterName"], $row["characterPictureUrl"], $row["characterQuotes"], $row["characterReleaseDate"], $row["characterSong"], $row["characterUniverse"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($character);
	}

	//getCharacterByCharacterName
	/**
	 * Gets the Character by Character name
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $characterName character name to search for
	 * @return \null Character found or null if not found
	 * @throws \PDOException when MySql related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 * @throws \InvalidArgumentException if Character name is not
	 * @throws \Exception if some other exception occurs
	 * @throws \RangeException if the character name is too long
	 * */
	public static function getCharacterByCharacterName(\PDO $pdo, $characterName) : ?Character {
		//sanitize the character name before searching
		try {
			$characterName = self::string($characterName);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create a query template
		$query = "SELECT characterId, characterDescription, characterMusicUrl, characterPictureUrl, characterQuotes, characterReleaseDate, characterSong, characterUniverse, characterName FROM Character WHERE characterName = :charaterName";
		$statement = $pdo->prepare($query);
		//bind the favorite profile id to the place holder in the template
		$parameters = ["characterName" => $characterName->getBytes()];
		$statement->execute($parameters);
		//grab the character from mySQL
		try {
			$character = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$character = new Character($row["characterId"], $row["characterDescription"], $row["characterMusicUrl"], $row["characterPictureUrl"], $row["characterQuotes"], $row["characterReleaseDate"], $row["characterSong"], $row["characterUniverse"], $row["characterName"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($character);
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
		$query = "SELECT characterId, characterDescription, characterMusicUrl, characterName, characterPictureUrl, characterQuotes, characterReleaseQuotes, characterSong, characterUniverse FROM Character WHERE characterUniverse LIKE :characterUniverse";
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
				$character = new Character($row["characterId"], $row["characterDescription"], $row["characterMusicUrl"], $row["characterName"], $row["characterPictureUrl"], $row["characterQuotes"], $row["characterReleaseDate"], $row["characterSong"], $row["characterUniverse"]);
				$characterUniverseArray[$characterUniverseArray->key()] = $character;
				$characterUniverseArray->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		//returns character array
		return($characterUniverseArray);
	}

}
