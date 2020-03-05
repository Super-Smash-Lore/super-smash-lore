<?php

namespace SuperSmashLore\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "/Classes/autoloader.php");

use Ramsey\Uuid\Uuid;
use SuperSmashLore\SuperSmashLore\Test\GameTest;

class Game implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * Id for game; this is a primary key
	 * @var Uuid $gameId
	 */
	private $gameId;
	/**
	 * Character Id for games; this is a foreign key
	 * @var Uuid $gameCharacterId
	 */
	private $gameCharacterId;
	/**
	 * pictures of the games
	 * @var string $gamePictureUrl
	 */
	private $gamePictureUrl;
	/**
	 * systems the games can be played on
	 * @var $gameSystem
	 */
	private $gameSystem;
	/**
	 * URL to buy game
	 * @var $gameUrl
	 */
	private $gameUrl;

	/**
	 * constructor method for Game
	 * @param string | Uuid $newGameId id for this game or null if a new game
	 * @param string | Uuid $newGameCharacterId id for the character or null if new game
	 * @param string $newGamePictureUrl url for the picture of the game
	 * @param string $newGameSystem string for the system the game is on
	 * @param string $newGameUrl url for the link to purchase the game
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are too large or too small
	 * @throws \TypeError if data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct($newGameId, string $newGameCharacterId, string $newGamePictureUrl, string $newGameSystem, string $newGameUrl) {
		try {
			$this->setGameId($newGameId);
			$this->setGameCharacterId($newGameCharacterId);
			$this->setGamePictureUrl($newGamePictureUrl);
			$this->setGameSystem($newGameSystem);
			$this->setGameUrl($newGameUrl);


			//determines what exception type was thrown
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 *accessor method for game Id
	 *
	 * @return Uuid value of gameId
	 */
	public function getGameId(): Uuid {
		return $this->gameId;
	}

	/**
	 * mutator method for game id
	 *
	 * @param Uuid|string $newGameId of gameId
	 * @throws \RangeException if $newGameId is not positive
	 * @throws \TypeError if $newGameId is not uuid or string
	 */
	public function setGameId($newGameId): void {
		try {
			$uuid = self::validateUuid($newGameId);
		} catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store game Id
		$this->gameId = $uuid;
	}

	/**
	 * accessor method for gameCharacterId
	 *
	 * @return Uuid value of game character Id
	 */
	public function getGameCharacterId(): Uuid{
		return $this->gameCharacterId;
	}

	/**
	 * mutator method for character Id
	 *
	 * @param Uuid|string $newGameCharacterId new value of character Id
	 * @throws \RangeException if $newCharacterId
	 * @throws \TypeError if $newGameCharacterId is not an integer
	 */
	public function setGameCharacterId($newGameCharacterId): void {
		try {
			$uuid = self::validateUuid($newGameCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the character id
		$this->gameCharacterId = $uuid;
	}


	/**
	 * accessor method for game picture
	 *
	 * @returns string value of picture Url
	 */
	public function getGamePicture (): string {
		return $this->gamePictureUrl;
	}

	/**
	 * mutator for game picture
	 *
	 * @param string $newGamePictureUrl new value of picture Url
	 * @throws \InvalidArgumentException if $newGamePictureUrl is not a string or insecure
	 * @throws \RangeException if $newGamePictureUrl is > 255 characters
	 * @throws \TypeError if $newGamePictureUrl is not a string
	 */
	public function setGamePictureUrl (string $newGamePictureUrl) : void {
		//verifying if string is secure
		$newGamePictureUrl = trim($newGamePictureUrl);
		$newGamePictureUrl = filter_var($newGamePictureUrl, FILTER_VALIDATE_URL,FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newGamePictureUrl) === true) {
			throw (new \InvalidArgumentException("picture url empty or insecure"));
		}
		//verifying string will fit in database
		if(strlen($newGamePictureUrl) > 255) {
			throw (new \RangeException("picture url must be fewer than 255 characters"));
		}
		//convert and store picture Url
		$this->gamePictureUrl = $newGamePictureUrl;
	}

	/**
	 * accessor method for game system
	 *
	 * @return string value for which systems the games were on
	 */
	public function getGameSystem (): string {
		return $this->gameSystem;
	}

	/**
	 * mutator method for game system
	 *
	 * @param string $newGameSystem new string value of game system
	 * @throws \InvalidArgumentException is string value is empty or insecure
	 */
	public function setGameSystem (string $newGameSystem) : void {
		//verifying string is secure
		$newGameSystem = trim($newGameSystem);
		$newGameSystem = filter_var($newGameSystem, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newGameSystem) === true) {
			throw (new \InvalidArgumentException());
		}
		//verify strlen will fit in database
		if(strlen($newGameSystem) > 32) {
			throw (new \RangeException("system must be fewer than 32 characters"));
		}
		//convert and store game system
		$this->gameSystem = $newGameSystem;
	}

	/*
	 * accessor for game url
	 *
	 * @returns string value for game url
	 */
	public function getGameUrl (): string {
		return $this->gameUrl;
	}

	/**
	 * mutator for game url
	 *
	 * @param string $newGameUrl
	 * @throws \InvalidArgumentException if $newGameUrl is empty or insecure
	 * @throws \RangeException if $newGameUrl is larger than 512 characters
	 */
	public function setGameUrl (string $newGameUrl) :void {
		//verifying if string is secure
		$newGameUrl = trim($newGameUrl);
		$newGameUrl = filter_var($newGameUrl, FILTER_VALIDATE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newGameUrl) === true) {
			throw (new \InvalidArgumentException("game url empty or insecure"));
		}
		//verify strlen will fit in database
		if(strlen($newGameUrl) > 512) {
			throw (new \RangeException("Game Url must be fewer than 512 characters"));
		}
		//convert and store game url
		$this->gameUrl = $newGameUrl;
	}

	/**
	 * insert game for game table
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when MYSQL related error occur
	 * @throw \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo) :void {
		//create query template
		$query = "INSERT INTO game (gameId, gameCharacterId, gamePictureUrl, gameSystem, gameUrl) 
						VALUES (:gameId, :gameCharacterId, :gamePictureUrl, :gameSystem, :gameUrl)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder template
		$parameters = ["gameId" => $this->gameId->getBytes(), "gameCharacterId" => $this->gameCharacterId->getBytes(), "gamePictureUrl" => $this->gamePictureUrl,
							"gameSystem" => $this->gameSystem, "gameUrl" => $this->gameUrl];
		$statement->execute($parameters);
	}

	/**
	 * delete game for game table
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when MYSQL related errors occur
	 * @throws \TypeError if @pdo is no a PDO connection object
	 *
	 */
	public function delete(\PDO $pdo) : void {
		//create query template
		$query = "DELETE FROM game WHERE gameId = :gameId";
		$statement = $pdo->prepare($query);
		//bind members to place holder template
		$parameters = ["gameId" => $this->gameId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * get game by game Id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $gameId gameId to search for
	 * @return game|null game found or null if not found
	 * @throws \PDOException when MYSQL errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 */
	public static function getGameByGameId(\PDO $pdo, $gameId) :?Game {
		//sanitize gameId before searching
		try {
			$gameId = self::validateUuid($gameId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT gameId, gameCharacterId, gamePictureUrl, gameSystem, gameUrl FROM game WHERE gameId = :gameId";
		$statement = $pdo->prepare($query);
		//bind game id to the place holder template
		$parameters = ["gameId" => $gameId->getBytes()];
		$statement->execute($parameters);
		//grab the game from MYSQL
		try {
			$game = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$game = new Game($row["gameId"], $row["gameCharacterId"], $row["gamePictureUrl"], $row["gameSystem"], $row["gameUrl"]);
			}
		} catch(\Exception $exception) {
			//if the row could not be converted, rethrow it
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($game);
	}

	/**
	 * get game by character Id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string|Uuid characterId to search for
	 * @return game|null game found or null if not found
	 * @throws \PDOException when MYSQL error occurs
	 * @throws \TypeError when a variable is not the correct data type
	 */
	public static function getGameByGameCharacterId(\PDO $pdo, $gameCharacterId) : \SPLFixedArray {
		//sanitize the characterId before searching
		try {
			$gameCharacterId = self::validateUuid($gameCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT gameId, gameCharacterId, gamePictureUrl, gameSystem, gameUrl FROM game WHERE gameCharacterId = :gameCharacterId";
		$statement = $pdo->prepare($query);
		//bind the game character Id to the place holder in the template

		$parameters = ["gameCharacterId" => $gameCharacterId->getBytes()];
		$statement->execute($parameters);


		//build array of  character games
		$games = new \SPLFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while (($row = $statement->fetch()) !== false) {
			try {
				$game = new Game($row["gameId"], $row["gameCharacterId"], $row["gamePictureUrl"], $row["gameSystem"], $row["gameUrl"]);
				$games [$games->key()] = $game;
				$games->next();
			} catch(\Exception $exception) {
				//if row can be converted rethrow it
				throw (new\PDOException($exception->getMessage(),0, $exception));
			}
		}
		return ($games);
	}
	public static function getAllGames(\PDO $pdo) : \SPLFixedArray {
		// create query template
		$query = "SELECT gameId, gameCharacterId, gamePictureUrl, gameSystem, gameUrl FROM game";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of games
		$games = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$game = new Game($row["gameId"], $row["gameCharacterId"], $row["gamePictureUrl"], $row["gameSystem"], $row["gameUrl"]);
				$games[$games->key()] = $game;
				$games->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($games);
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["gameId"] = $this->gameId->toString();
		$fields["gameCharacterId"] = $this->gameCharacterId->toString();
		return ($fields);

	}
}