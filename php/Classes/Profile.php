<?php

namespace SuperSmashLore\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "/Classes/autoloader.php");

use Ramsey\Uuid\Uuid;
class Profile{
	use ValidateDate;
	use ValidateUuid;
/**
 * id for profile: this is a primary key
 * @var Uuid $profileId
 **/
	private $profileId;
/**
 * activation token for profile
 * @var  $profileActivationToken
 **/
	private $profileActivationToken;
/**
 * date user joined
 * @var  $profileDateJoined
 **/
	private $profileDateJoined;

/**
 *  email for the profile
 * @var  $profileEmail
 **/
	private $profileEmail;
/**
 * hash for the profile
 * @var  $profileHash
 **/
	private $profileHash;
/**
 *  username for the profile
 * @var  $profileUserName
 **/
	private $profileUserName;

	/**
	 * constructor method for profile
	 *
	 * @param  $newProfileId
	 * @param  $newProfileActivationToken
	 * @param  $newProfileDateJoined
	 * @param  $newProfileEmail
	 * @param  $newProfileHash
	 * @param  $newProfileUserName
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/

	public function __construct($newProfileId, $newProfileActivationToken, $newProfileDateJoined, $newProfileEmail, $newProfileHash, $newProfileUserName ) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileActivationToken($newProfileActivationToken);
			$this->setProfileDateJoined($newProfileDateJoined);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileHash($newProfileHash);
			$this->setProfileUserName($newProfileUserName);

			//determines what exception type is thrown
		} catch(\InvalidArgumentException | \RangeException |\Exception |\TypeError $exception){
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for profileId
	 *
	 * @return Uuid for profile Id
	 **/
	public function getProfileId() : Uuid {
		return ($this->profileId);
	}

	/**
	 * setter method for profile Id
	 *
	 * @param \Uuid|self validate| void $newProfileId  as a setter for new profile id
	 * @throws \InvalidArgumentException if $newProfileId is not a valid object or string
	 * @throws \RangeException if $newProfileId $newProfileId is not valid
	 **/

	public function setProfileId( $newProfileId) : void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$profileId = 16;
		//convert to store profile id
		$this->$profileId = $uuid;
	}

	/**
	 * accessor method for activation token
	 *
	 * @return string for activation token
	 **/

	public function getProfileActivationToken() : ?string {
		return $this->profileActivationToken;
	}

	/**
	 * setter for activation token
	 *
	 * @param string $newProfileActivationToken new value of new profile activation token
	 * @returns $newProfileActivationToken as null
	 * */

	public function setProfileActivationToken(string $newProfileActivationToken) : void {
		if($newProfileActivationToken === null) {
			$this->activationToken = null;
			return;
		}
		$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
		if(strlen($newProfileActivationToken) !== 32) {
			throw (new\RangeException("Activation token has to be 32 character"));
		}
		//convert to store profile activation token
		$this->profileActivationToken = $newProfileActivationToken;
	}

	/**
	 * accessor for dateJoined
	 *
	 * @return profile date joined
	 **/


	public function getProfileDateJoined() {
		return $this->profileDateJoined;
	}

	/**
	 * setter for date Joined
	 *
	 * @param \Self validate|Date|void $newProfileDateJoined date as a DateTime object
	 * @throws \InvalidArgumentException if $newProfileDateJoined is not a valid object or string
	 * @throws \RangeException if $newProfileDateJoined is a date that does not exist
	 **/

	public function setProfileDateJoined ($newProfileDateJoined) : void {
		try {
			$profileDateJoined = self::validateDate($newProfileDateJoined);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert to store profile data joined
		$this->profileDateJoined = $profileDateJoined;
	}

	/**
	 * accessor for profile Email
	 *
	 * @return string of profile email
	 **/
	public function getProfileEmail() {
		return $this->profileEmail;
	}

	/**
	 * setter for profile Email
	 *
	 * @param \DateTime|string|null $newTweetDate tweet date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newTweetDate is not a valid object or string
	 * @throws \RangeException if $newTweetDate is a date that does not exist
	 **/
	public function setProfileEmail(string $newProfileEmail): void {
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw (new \InvalidArgumentException("Email empty or insecure"));
		}
		if(strlen($newProfileEmail) > 128) {
			throw (new \RangeException("Email must be fewer than 128 characters"));
		}
		//convert to store new profile email
		$this->profileEmail = $newProfileEmail;
	}

	/**
	 *accessor for profile hash
	 *
	 * @return value of profile hash
	 **/
	public function getProfileHash() {
		return $this->profileHash;
	}

	/**
	 * setter for profile Hash
	 *
	 * @param \DateTime|string|void $newProfileHash as an object or string
	 * @throws \InvalidArgumentException if $newProfileHash is empty
	 * @throws \RangeException if $newTweetDate is a date that does not exist
	 **/

	public function setProfileHash(string $newProfileHash) : void {
		$newProfileHash = trim($newProfileHash);
		if(empty($newProfileHash) === true) {
			throw (new\ InvalidArgumentException("Hash is empty or insecure"));
		}
		$profileHashInfo = password_get_info($newProfileHash);
		if($newProfileHash["algoName"] !== "argon2i") {
			throw (new\ InvalidArgumentException("hash is not valid hash"));
		}
		if(strlen($newProfileHash) !== 97) {
			throw (new \RangeException("Hash must be 97 characters"));
		}
		//convert to store new profile hash
		$this->profileHash = $newProfileHash;
	}

	/**
	 * accessor method for profile User Name
	 *
	 * @return string for profile User Name
	 **/
	public function getProfileUserName (){
		return $this->profileUserName;
	}

	/**
	 * setter method for profile User Name
	 *
	 * @param \set $newProfileUserName|string $newProfileUserName profile username as a string
	 * @throws \InvalidArgumentException if $newProfileUserName if user name is empty or insecure
	 * @throws \RangeException if $newProfileUserName is less than 32 characters
	 **/

	public function setProfileUserName(string $newProfileUserName) {
		$newProfileUserName = trim($newProfileUserName);
		$newProfileUserName = filter_var($newProfileUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileUserName) === true) {
			throw (new\InvalidArgumentException("Username is empty or insecure "));
		}
		if(strlen($newProfileUserName) > 32) {
			throw (new\RangeException("Username must be less than 32 charcters"));
		}
		//convert to store new profile username
		$this->profileUserName = $newProfileUserName;
	}

	/**
	 * inserts profile for profile table
	 *
	 * @param \PDO $pdo connection object
	 * @throws \PDOException when MYSQL related errors occur
	 * @throws \TypeError if $pdo is no PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {
		//create query template
		$query = "INSERT INTO profile(profileId, profileActivationToken, profileDateJoined, profileEmail, profileHash, profileUserName) VALUES(:profileId, :profileActivationToken, :profileDateJoined, :profileEmail, :profileHash, :profileUserName) ";
		$statement = $pdo->prepare($query);
		//bind the member to the place holder in the template
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileActivationToken" => $this->profileActivationToken, "profileDateJoined" => $this->profileDateJoined, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash,
							"profileUserName" => $this->profileUserName];
		$statement->execute($parameters);
	}

	/**
	 * update profile for profile table
	 *
	 * @param \PDO $pdo connection object
	 * @throws \PDOException when MYSQL related errors occur
	 * @throws \TypeError if $pdo is no PDO connection object
	 **/
	public function update(\PDO $pdo) : void {
		//create query template
		$query = "UPDATE profile SET profileId = :profileId, profileActivationToken = :profileActivationToken, profileDateJoined = :profileDateJoined, profileEmail = :profileEmail, profileHash = :profileHash, profileUserName = :profileUserName";
		$statement = $pdo->prepare($query);
		//bind the member to the place holder in the template
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileActivationToken" => $this->profileActivationToken, "profileDateJoined" => $this->profileDateJoined, "profileEmail" => $this->profileEmail,
							"profileHash" => $this->profileHash, "profileUserName" => $this->profileUserName];
		$statement->execute($parameters);
	}

	/**
	 * delete method for profile table
	 *
	 * @param \PDO $pdo connection object
	 * @throws \PDOException when MYSQL related errors occur
	 * @throws \TypeError if $pdo is no PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {
		//create query template
		$query = "DELETE FROM character WHERE characterId = :characterId";
		$statement = $pdo->prepare($query);
		//bind the member to the place holder in the template
		$parameters = ["profileId" => $this->profileId->getBytes()];
		$statement->execute($parameters);
	}
	/**
	 * gets the Profile by profile id
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param  $profileId profile Id to search for (the data type should be mixed/not specified)
	 * @return Profile|null Profile or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getProfileByProfileId(\PDO $pdo, $profileId) :?Profile {
//		sanitize the profile id before searching
	try {
		$profileId = self::validateUuid($profileId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}
//create query template
		$query = "SELECT profileId, profileActivationToken, profileDateJoined, profileEmail, profileHash, profileUserName WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);

// bind the profile id to the place holder in the template
		$parameters = ["SELECT profileId" => $profileId->getBytes()];
		$statement->execute($parameters);

// grab the Profile from mySQL
		try {
			$profile = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {

				$profile = new Profile($row["profileId"], $row["profileActivationToken"], $row["profileDateJoined"], $row["profileEmail"], $row["profileHash"], $row["profileUserName"]);
			}
		} catch(\Exception $exception) {
// if the row couldn't be converted, rethrow ir
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($profile);
}
/**
 * get the profile by profile activation token
 *
 * @param string $profileActivationToken
 * @param \PDO object $pdo
 * @returns Profile|null Profile or null if not found
 * @throws /\PDOException when mySQL related errors occur
 * @throws /\TypeError when variables are not the correct data type
 **/
	public static function getProfileByProfileActivationToken(\PDO $pdo, string $profileActivationToken) : ?Profile {
// make sure activation token is in the right format and that it is a string representation of a hexadecimal
		$profileActivationToken = trim($profileActivationToken);
		if(ctype_xdigit($profileActivationToken) === false) {
			throw(new \InvalidArgumentException("profile activation token is empty or in the wrong format"));
		}

//create query template
		$query = "SELECT profileId, profileActivationToken, profileDateJoined, profileEmail, profileHash, profileUserName FROM profile WHERE profileActivationToken = :profileActivationToken";
		$statement = $pdo->prepare($query);

// bind the profile activation token to the placeholder in the template
		$parameters = ["profileActivationToken" => $profileActivationToken];
		$statement->execute($parameters);

//grab the Profile from mySQL
		try {
			$profile = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["profileActivationToken"], $row["profileDateJoined"], $row["profileEmail"], $row["profileHash"], $row["profileUserName"]);
			}
		} catch(\Exception $exception) {
// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($profile);
	}
	//getProfileByProfileEmail
	/**
	 * Gets the profile by the profile email
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $profileId
	 * @return Profile|null Profile found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 **/
	public static function getProfileByProfileEmail(\PDO $pdo, $profileEmail) : ?Profile {
		//sanitize the profileId before searching
		try {
			$profileEmail = self::string($profileEmail);
		} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception)  {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT profileId, profileActivationToken, profileDateJoined, profileEmail, profileHash, profileUsername FROM Profile WHERE profileEmail = :profileEmail";
		$statement = $pdo->prepare($query);
		//bind the Profile from mysql
		$parameters = ["profileEmail" => $profileEmail->getBytes()];
		$statement->execute($parameters);
		//grab the profile from mysql
		try {
			$profile = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["profileActivationToken"], $row["profileDateJoined"], $row["profileEmail"], $row["profileHash"], $row["profileUsername"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($profile);
	}
}