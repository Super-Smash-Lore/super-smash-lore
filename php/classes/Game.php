<?php

namespace SSBULoreApp\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "/classes/autoloader.php");

use Jmashke4\SuperSmashLore\validateDate;
use Jmashke4\SuperSmashLore\validateUuid;
use Ramsey\Uuid\Uuid;
class Game {
	use validateDate;
	use validateUuid;
	/*
	 * Id for game
	 */
	private $gameId;
	/*
	 * Character Id for games
	 */
	private $gameCharacterId;
	/*
	 * pictures of the games
	 */
	private $gamePictureUrl;
	/*
	 * systems the games can be played on
	 */
	private $gameSystem;
	/*
	 * URL to buy game
	 */
	private $gameUrl;

	/*
	 * constructor method for Game
	 * @param $newGameId
	 * @param $newGameCharacterId
	 * @param $newGamePicture
	 * @param $newGameSystem
	 * @param $newGameUrl
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are too large or too small
	 * @throws \TypeError if data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct($newGameId, $newGameCharacterId, $newGamePictureUrl, $newGameSystem, $newGameUrl) {
		try {
			$this->setGameId($newGameId);
			$this->setGameCharacterId($newGameCharacterId);
			$this->setGamePictureUrl($newGamePictureUrl);
			$this->setGameSystem($newGameSystem);
			$this->setGameUrl($newGameUrl);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/*
	 *accessor for game Id
	 */
	public function getGameId(): Uuid {
		return $this->gameId;
	}

	/*
	 * setter for game id
	 */
	public function setGameId($newGameId): void {
		try {
			$uuid = self::validateUuid($newGameId);
		} catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->gameId = $uuid;
	}

	/*
	 * accessor for gameCharacterId
	 */
	public function getGameCharacterId() {
		return $this->gameCharacterId;
	}

	/*
	 * setter for character Id
	 */
	public function setGameCharacterId($newCharacterId): void {
		try {
			$uuid = self::validateUuid($newCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->characterId = $uuid;
	}


	/*
	 * getter for game picture
	 */
	public function getGamePicture () {
		return $this->gamePictureUrl;
	}

	/*
	 * mutator for game picture
	 */
	public function setGamePictureUrl (string $newGamePictureUrl) : void {
		$newGamePictureUrl = trim($newGamePictureUrl);
		$newGamePictureUrl = filter_var($newGamePictureUrl, FILTER_VALIDATE_URL);
		if(empty($newGamePictureUrl) === true) {
			throw (new \InvalidArgumentException("picture url empty or insecure"));
		}
		if(strlen($newGamePictureUrl) > 512) {
			throw (new \RangeException("picture url must be fewer than 512 characters"));
		}
		$this->gamePicture = $newGamePictureUrl;
	}

	/*
	 * accessor for game system
	 */
	public function getGameSystem () {
		return $this->gameSystem;
	}

	/*
	 * mutator for game system
	 */
	public function setGameSystem (string $newGameSystem) : void {
		$newGameSystem = trim($newGameSystem);
		$newGameSystem = filter_var($newGameSystem, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newGameSystem) === true) {
			throw (new \InvalidArgumentException());
		}
	}

	/*
	 * getter for game url
	 */
	public function getGameUrl () {
		return $this->gameUrl;
	}

	/*
	 * mutator for game url
	 */
	public function setGameUrl (string $newGameUrl) :void {
		$newGameUrl = trim($newGameUrl);
		$newGameUrl = filter_var($newGameUrl, FILTER_VALIDATE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newGameUrl) === true) {
			throw (new \InvalidArgumentException("game url empty or insecure"));
		}
		if(strlen($newGameUrl) > 512) {
			throw (new \RangeException("Game Url must be fewer than 512 characters"));
		}
		$this->gameUrl = $newGameUrl;
	}

	/*
	 * insert game for game table
	 */
	public function insert(\PDO $pdo) :void {
		$query = "INSERT INTO game (gameId, gameCharacterId, gamePictureUrl, gameSystem, gameUrl) 
						VALUES (:gameId, :gameCharacterId, :gamePicture, :gameSystem, :gameUrl)";
		$statement = $pdo->prepare($query);
		$parameters = ["gameId" => $this->gameId->getBytes(), "gameCharacterId" => $this->gameCharacterId->getBytes(), "gamePictureUrl" => $this->gamePictureUrl,
							"gameSystem" => $this->gameSystem, "gameUrl" => $this->gameUrl];
		$statement->execute($parameters);
	}

	/*
	 * update game for game table
	 */
	public function update(\PDO $pdo) : void {
		$query = "UPDATE game SET gameId = :gameId, gameCharacterId = :gameCharacterId, gamePictureUrl = :gamePictureUrl, gameSystem = :gameSystem, gameUrl = :gameUrl";
		$statement = $pdo->prepare($query);
		$parameters = ["gameId" => $this->gameId->getBytes(), "gameCharacterId" => $this->gameCharacterId, "gamePictureUrl" => $this->gamePictureUrl,
								"gameSystem" => $this->gameSystem, "gameUrl" => $this->gameUrl];
		$statement->execute($parameters);
	}

	/*
	 * delete game for game table
	 */
	public function delete(\PDO $pdo) : void {
		$query = "DELETE FROM game WHERE gameId = :gameId";
		$statement = $pdo->prepare($query);
		$parameters = ["gameId" => $this->gameId->getBytes()];
		$statement->execute($parameters);
	}

	/*
	 * get game by game Id
	 */
	public static function getGameByGameId(\PDO $pdo, $gameId) :?Game {
		try {
			$gameId = self::validateUuid($gameId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		$query = "SELECT gameId, gameCharacterId, gamePictureUrl, gameSystem, gameUrl FROM game WHERE gameId = :gameId";
		$statement = $pdo->prepare($query);
		$parameters = ["gameId" => $gameId->getBytes()];
		$statement->execute($parameters);
		try {
			$game = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$game = new Game($row["gameId"], $row["gameCharacterId"], $row["gamePictureUrl"], $row["gameSystem"], $row["gameUrl"]);
			}
		} catch(\Exception $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($game);
	}
}