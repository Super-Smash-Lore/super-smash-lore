<?php

namespace SuperSmashLore\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "/Classes/autoloader.php");

use Ramsey\Uuid\Uuid;
class Favorite implements \JsonSerializable{
	use ValidateUuid;
	use ValidateDate;
	/**
	 * favorite character Id
	 * @var Uuid $favoriteCharacterId
	 */
	private $favoriteCharacterId;
	/**
	 * profile Id for favorite
	 * @var Uuid $favoriteProfileId
	 */
	private $favoriteProfileId;
	/**
	 * date favorited
	 * @var \DateTime $favoriteDate
	 */
	private $favoriteDate;

	/**
	 * constructor for favorite
	 *
	 * @param string|Uuid $newFavoriteCharacterId id of the favorite or null if new favorite
	 * @param string|Uuid $newFavoriteProfileId if of the profile that added the favorite
	 * @param \DateTime|string|null $newFavoriteDate date and time the favorite was added or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds or too large
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if any other form of exception occurs
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
 	* getter method for favorite characters
 	* @return string value of favorite characters
 	**/
	public function getFavoriteCharacterId(): Uuid {
		return $this->favoriteCharacterId;
	}
	/**
	 * setter method for favorite character id
	 *
	 * @param string $favoriteCharacterId for favorite characters
	 * @throws \InvalidArgumentException if $favoriteProfileId is not a valid or secure profile
	 * @throws \RangeException if $favoriteCharacterId is > 16 characters
	 * @throws \TypeError if $favoriteCharacterId is not a string
	 * @throws \Exception if some other exception occurs
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
/**
 * getter for favorite profile id
 * @return Uuid value of favorite profile Id
 */
	public function getFavoriteProfileId(): Uuid {
		return $this->favoriteProfileId;
	}

/**
 * setter method for favorite profile Id
 *
 * @param Uuid|string $newFavoriteProfileId new value of favorite id
 * @throws \InvalidArgumentException if data types are not valid
 * @throws \RangeException if the values are out of bounds or too long
 * @throws \Exception if some other exception occurs
 * @throws \TypeError if data types violate type hints
 */
public function setFavoriteProfileId( $newFavoriteProfileId) : void {
	try {
		$uuid = self::validateUuid($newFavoriteProfileId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw (new $exceptionType($exception->getMessage(), 0, $exception));
	}
	//convert and store the favorite profile id
	$this->favoriteProfileId = $uuid;
}

/**
 * getter for favorite character release date
 * @return Uuid value of favorite date
 */
	public function getFavoriteDate(): \DateTime {
		return $this->favoriteDate;
	}
/**
 *setter method for favorite character release date
 *
 * @param \DateTime|string|null $newFavoriteDate favorite date as a DateTime object or a string
 * @throws \InvalidArgumentException if data types do not match
 * @throws \RangeException if the data values are out of bounds or too long
 * @throws \Exception if some other form of exception occurs
 * @throws \TypeError if data types violate the type hints
 */

	public function setFavoriteDate ($newFavoriteDate = null) : void {
		if($newFavoriteDate === null) {
			$this-> favoriteDate = new\DateTime();
			return;
		}
		try {
			$favoriteDate = self::validateDate($newFavoriteDate);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->favoriteDate = $favoriteDate;
	}

	/**
	 * inserts this favorite into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo in not PDO connection object
	 */
	public function insert(\PDO $pdo) : void {

		//create a query template
		$query = "INSERT INTO favorite(favoriteCharacterId, favoriteProfileId, favoriteDate) VALUES (:favoriteCharacterId, :favoriteProfileId, :favoriteDate)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$formattedDate = $this->favoriteDate->format("Y-m-d");
		$parameters = ["favoriteCharacterId" => $this->favoriteCharacterId->getBytes(), "favoriteProfileId" => $this->favoriteProfileId->getBytes(), "favoriteDate" => $formattedDate];
		$statement->execute($parameters);
	}


	/**
	 * deletes a favorite from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection
	 */
	public function delete(\PDO $pdo) : void {

		//crete a query template
		$query = "DELETE FROM favorite WHERE favoriteCharacterId = :favoriteCharacterId";
		$statement = $pdo->prepare($query);

		//bind the variables to the place holder in the template
		$parameters = ["favoriteCharacterId" => $this->favoriteCharacterId->getBytes()];
		$statement->execute($parameters);
	}

	//getFavoriteByFavoriteCharacterId

	/**
	 * Gets the Favorite by Favorite Character Id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $favoriteProfileId favorite character id to search for
	 * @return Favorite| null Favorite found or null if not found
	 * @throws \PDOException when MySql related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 */
	public static function getFavoriteByFavoriteProfileId(\PDO $pdo, $favoriteProfileId) : \SPLFixedArray {
		try {
			$favoriteProfileId = self::validateUuid($favoriteProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		// create query template
		$query = "SELECT favoriteCharacterId, favoriteProfileId, favoriteDate FROM favorite WHERE favoriteProfileId = :favoriteProfileId";
		$statement = $pdo->prepare($query);
		// bind the favorite profile id to the place holder in the template
		$parameters = ["favoriteProfileId" => $favoriteProfileId->getBytes()];
		$statement->execute($parameters);
		// build an array of favorites
		$favorites = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$favorite = new Favorite($row["favoriteCharacterId"], $row["favoriteProfileId"], $row["favoriteDate"]);
				$favorites[$favorites->key()] = $favorite;
				$favorites->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($favorites);
	}

	public static function getFavoriteByFavoriteCharacterId(\PDO $pdo, $favoriteCharacterId) : \SPLFixedArray {
		//sanitize the characterId before searching
		try {
			$favoriteCharacterId = self::validateUuid($favoriteCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT favoriteCharacterId, favoriteProfileId, favoriteDate FROM favorite WHERE favoriteCharacterId = :favoriteCharacterId";
		$statement = $pdo->prepare($query);
		//bind the game character Id to the place holder in the template

		$parameters = ["favoriteCharacterId" => $favoriteCharacterId->getBytes()];
		$statement->execute($parameters);


		//build array of  characters that have been favorited
		$favoriteCharacters = new \SPLFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while (($row = $statement->fetch()) !== false) {
			try {
				$favorite = new Favorite($row["favoriteCharacterId"], $row["favoriteProfileId"], $row["favoriteDate"]);
				$favoriteCharacters [$favoriteCharacters->key()] = $favorite;
				$favoriteCharacters->next();
			} catch(\Exception $exception) {
				//if row can be converted rethrow it
				throw (new\PDOException($exception->getMessage(),0, $exception));
			}
		}
		return ($favoriteCharacters);
	}


	/**
	 * gets the favorite by favorite profile id and favorite character id
	 *
	 * @param \PDO $pdo PDO connection
	 * @param string $favoriteCharacterId
	 * @param string $favoriteProfileId
	 * @return Favorite|null Favorite found or null if not found
	 */

	public static function getFavoriteByFavoriteCharacterIdAndFavoriteProfileId(\PDO $pdo, string $favoriteCharacterId, string $favoriteProfileId) : ?Favorite {
		//creating throw error codes.
		try {
			$favoriteCharacterId = self::ValidateUuid($favoriteCharacterId);
			$favoriteProfileId = self::ValidateUuid($favoriteProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template.
		$query = "SELECT  favoriteCharacterId, favoriteProfileId, favoriteDate FROM favorite WHERE  favoriteCharacterId= :favoriteCharacterId AND favoriteProfileId = :favoriteProfileId ";
		$statement = $pdo->prepare($query);
		//bind the profile id and the character id to the place holder in the template.
		$parameters = [ "favoriteCharacterId" => $favoriteCharacterId->getBytes(), "favoriteProfileId" => $favoriteProfileId->getBytes()];
		$statement->execute($parameters);
		//grab the favorite from MySQL.
		try {
			$favorite = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$favorite = new Favorite ($row["favoriteCharacterId"], $row["favoriteProfileId"], $row["favoriteDate"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($favorite);
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["favoriteCharacterId"] = $this->favoriteCharacterId->toString();
		$fields["favoriteProfileId"] = $this->favoriteProfileId->toString();
		$fields ["favoriteDate"] = round(floatval($this->favoriteDate->format("U.u")) * 1000);
		return ($fields);

	}
}