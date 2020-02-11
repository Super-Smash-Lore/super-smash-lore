<?php

namespace SuperSmashLore\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "/Classes/autoloader.php");

use Ramsey\Uuid\Uuid;
class Favorite {
	use ValidateUuid;
	use ValidateDate;
	/*
	 * favorite character Id
	 */
	private $favoriteCharacterId;
	/*
	 * profile Id for favorite
	 */
	private $favoriteProfileId;
	/*
	 * date favorited
	 */
	private $favoriteDate;

	/*
	 * constructor for favorite
	 */
	public function __construct($newFavoriteCharacterId, $newFavoriteProfileId, $newFavoriteDate) {
		try {
			$this->setFavoriteCharacterId($newFavoriteCharacterId);
			$this->setFavoriteProfileId($newFavoriteProfileId);
			$this->setFavoriteDate($newFavoriteDate);
		} catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
 * accesor method for favorite characters
 *
 * @return string value of favorite characters
 **/
	public function getFavoriteCharacterId(): string {
		return $this->favoriteCharacterId;
	}
	/**
	 * mutator method for favorites
	 *
	 * @param string $favoriteCharacterId for favorite characters
	 * @throws \InvalidArgumentException if $favoriteProfileId is not a valid or secure profile
	 * @throws \RangeException if $favoriteCharacterId is > 16 characters
	 * @throws \TypeError if $favoriteCharacterId is not a string
	 **/

	/**
 	 * setter for new character Id
 	**/
	public function setFavoriteCharacterId( $newFavoriteCharacterId) : void {
		try {
			$uuid = self::validateUuid($newFavoriteCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->favoriteCharacterId = $uuid;
	}
/*
 *  getter for profileId
 */
	public function getFavoriteProfileId(): string {
		return $this->favoriteProfileId;
	}

/*
 * setter method for profile Id
 */

public function setFavoriteProfileId( $newFavoriteProfileId) : void {
	try {
		$uuid = self::validateUuid($newFavoriteProfileId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw (new $exceptionType($exception->getMessage(), 0, $exception));
	}
	$profileId = 16;
	$this->$profileId = $uuid;
}

/*
 *  getter for character release date
 */
	public function getFavoriteDate(): string {
		return $this->favoriteDate;
	}
/*
 *
 */

	public function setFavoriteDate ($newFavoriteDate) : void {
		try {
			$favoriteDate = self::validateDate($newFavoriteDate);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->characterReleaseDate = $favoriteDate;
	}

	/*
	 * inserts
	 */
	public function insert(\PDO $pdo) : void {
		$query = "INSERT INTO favorite(favoriteCharacterId, favoriteProfileId, favoriteDate); 
					VALUES (:favoriteCharacterId, :favoriteProfileId, :favoriteDate)";
		$statement = $pdo->prepare($query);
		$parameters = ["favoriteCharacterId" => $this->favoriteCharacterId->getBytes(), "favoriteProfileId" => $this->favoriteProfileId, "favoriteDate" => $this->favoriteDate];
		$statement->execute($parameters);
	}

	/*
	 * update
	 */
	public function update(\PDO $pdo) : void {
		$query = "UPDATE favorite SET favoriteCharacterId = :favoriteCharacterId, favoriteProfileId = :favoriteProfileId, favoriteDate = :favoriteDate";
		$statement = $pdo->prepare($query);
		$parameters = ["favoriteCharacterId" =>$this->favoriteCharacterId->getBytes(), "favoriteProfileId" => $this->favoriteProfileId, "favoriteProfileId" => $this->favoriteProfileId, "favoriteDate" => $this->favoriteDate];
		$statement->execute($parameters);
	}

	/*
	 * deletes
	 */
	public function delete(\PDO $pdo) : void {
		$query = "DELETE FROM favorite WHERE favoriteCharacterId = :favoriteCharacterId";
		$statement = $pdo->prepare($query);
		$parameters = ["favoriteCharacterId" => $this->favoriteCharacterId->getBytes()];
		$statement->execute($parameters);
	}

	//getFavoriteByFavoriteCharacterId

	/*
	 * Gets the Favorite by Favorite Character Id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $favoriteCharacterId favorite character id to search for
	 * @return Favorite| null Favorite found or null if not found
	 * @throws \PDOException when MySql related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 */
	public static function getFavoriteByFavoriteCharacterId(\PDO $pdo, $favoriteCharacterId) : ?Favorite {
		//sanitize the favorite character id before searching
		try {
			$favoriteCharacterId = self::ValidateUuid($favoriteCharacterId);
		} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT favoriteCharacterId, favoriteProfileId, favoriteDate FROM Favorite WHERE favoriteCharacterId = :favoriteCharacterId";
		$statement = $pdo->prepare($query);

		//Bind the favorite character id to the place holder in template
		$parameters = ["favoriteCharacterId" => $favoriteCharacterId->getBytes()];
		$statement->execute($parameters);

		//Grab the favorite from mySql
		try {
			$favorite = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$favorite = new Favorite($row["favoriteCharacterId"], $row["favoriteProfileId"], $row["favoriteDate"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($favorite);
	}

//getFavoriteByFavoriteProfileId

	/*
	 * gets the Favorite by FavoriteProfileId
	 *
	 * @param \PDO $pdo PDO connection
	 * @param Uuid| string  $FavoriteProfileId favorite profile id to search for
	 * @return Favorite|null Favorite found or null if not found
	 * @throws \PDOException when mysql related errors occur
	 * @throws \TypeError when variable is not the correct data type
	 */

	public static function getFavoriteByFavoriteProfileId(\PDO $pdo, $favoriteProfileId) : ?Favorite {
		// sanitize the FavoriteProfileId before searching
		try {
			$favoriteProfileId = self::ValidateUuid($favoriteProfileId);
		} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create a query template
		$query = "SELECT favoriteCharacterId, favoriteProfileId, favoriteDate FROM Favorite WHERE favoriteProfileId = :favoriteProfileId";
		$statement = $pdo->prepare($query);

		//bind the favorite profile id to the place holder in the template
		$parameters = ["favoriteProfileId" => $favoriteProfileId->getBytes()];
		$statement->execute($parameters);

		//grab the favorite from mysql
		try {
			$favorite = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$favorite = new Favorite($row["favoriteCharacterId"], $row["favoriteProfileId"], $row["favoriteDate"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($favorite);
	}
	public static function getFavoriteByFavoriteProfileIdAndFavoriteCharacterId(\PDO $pdo, string $favoriteProfileId, string $favoriteCharacterId) : ?Favorite {
		//creating throw error codes.
		try {
			$favoriteCharacterId = self::ValidateUuid($favoriteCharacterId);
			$favoriteProfileId = self::ValidateUuid($favoriteProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template.
		$query = "SELECT favoriteProfileId, favoriteCharacterId, favoriteDate FROM `favorite` WHERE favoriteProfileId = :favoriteProfileId AND favoriteCharacterId= :favoritecharacterId";
		$statement = $pdo->prepare($query);
		//bind the profile id and the character id to the place holder in the template.
		$parameters = ["favoriteProfileId" => $favoriteProfileId->getBytes(), "favoriteCharacterId" => $favoriteCharacterId->getBytes()];
		$statement->execute($parameters);
		//grab the favorite from MySQL.
		try {
			$favorite = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$favorite = new Favorite($row["favoriteProfileId"], $row["favoriteCharacterId"], $row["favoriteDate"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($favorite);
	}
}