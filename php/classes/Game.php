<?php

class Game {
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
	private $gamePicture;
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
	public function __construct($newGameId, $newGameCharacterId, $newGamePicture, $newGameSystem, $newGameUrl) {
		try {
			$this->setGameId($newGameId);
			$this->setGameCharacterId($newGameCharacterId);
			$this->setGamePicture($newGamePicture);
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
	 *
	public function setCharacterId($newCharacterId): void {
		try {
			$uuid = self::validateUuid($newCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->characterId = $uuid;
	}

	*/

}