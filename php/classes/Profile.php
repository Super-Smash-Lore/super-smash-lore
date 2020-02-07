<?php

namespace SSBULoreApp\SuperSmashLore;
require_once ("autoloader.php");
require_once (dirname(__DIR__) . "\classes\autoloader.php");

use Jmashke4\SuperSmashLore\validateDate;
use Jmashke4\SuperSmashLore\validateUuid;
use Ramsey\Uuid\Uuid;
class Profile{
	use validateDate;
	use validateUuid;
/*
 * id for profile: this is a primary key
 */
	private $profileId;
/*
 * activation token for profile
 */
	private $profileActivationToken;
/*
 * date user joined
 */
	private $profileDateJoined;

/*
 *  email for the profile
 */
	private $profileEmail;
/*
 * hash for the profile
 */
	private $profileHash;
/*
 *  username for the profile
 */
	private $profileUserName;

	/*
	 * constructor method for profile
	 *
	 * @param string|Uuid $newProfileId id of profile
	 * @param
	 * @param
	 * @param
	 * @param
	 * @param
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct($newProfileId, $newProfileActivationToken, $newProfileDateJoined, $newProfileEmail, $newProfileHash, $newProfileUserName = null) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileActivationToken($newProfileActivationToken);
			$this->setProfileDateJoined($newProfileDateJoined);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileHash($newProfileHash);
			$this->setProfileUserName($newProfileUserName);
		} catch(\InvalidArgumentException | \RangeException |\Exception |\TypeError $exception){
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/*
	 * accessor method for profileId
	 */
	public function getProfileId() : Uuid {
		return ($this->profileId);
	}

	/*
	 * setter method for profile Id
	 */

	public function setProfileId( $newProfileId) : void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$profileId = 16;
		$this->$profileId = $uuid;
	}

	/*
	 * accessor method for activation token
	 */

	public function getProfileActivationToken() : ?string {
		return $this->profileActivationToken;
	}

	/*
	 * setter for activation token
	 */

	public function setProfileActivationToken(string $newProfileActivationToken) : void {
		if($newProfileActivationToken === null) {
			$this->activationToken = null;
			return;
		}
		$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
		if(strlen($newProfileActivationToken) !== 32) {
			throw (new\RangeException("Activation token has to be 32 character"));
		}
		$this->profileActivationToken = $newProfileActivationToken;
	}

	/*
	 * accessor for dateJoined
	 */


	public function getProfileDateJoined() {
		return $this->profileDateJoined;
	}

	/*
	 * setter for date Joined
	 */

	public function setProfileDateJoined ($newProfileDateJoined) : void {
		try {
			$profileDateJoined = self::validateDate($newProfileDateJoined);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->profileDateJoined = $profileDateJoined;
	}

	/*
	 * accessor for profile Email
	 */
	public function getProfileEmail() {
		return $this->profileEmail;
	}

	/*
	 * setter for profile Email
	 */
	public function setProfileEmail(string $newProfileEmail): void {
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw (new \InvalidArgumentException("Email empty or insecure"));
		}
		if(strlen($newProfileEmail) > 128) {
			throw (new \RangeException("Email must be fewer than 128 characters"));
		}
		$this->profileEmail = $newProfileEmail;
	}

	/*
	 *accessor for profile hash
	 */
	public function getProfileHash() {
		return $this->profileHash;
	}

	/*
	 * setter for profile Hash
	 */

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
		$this->profileHash = $newProfileHash;
	}

	/*
	 * accessor method for profile UserName
	 */
	public function getProfileUserName (){
		return $this->profileUserName;
	}

	/*
	 * setter method for profile User Name
	 */

	public function setProfileUserName(string $newProfileUserName) {
		$newProfileUserName = trim($newProfileUserName);
		$newProfileUserName = filter_var($newProfileUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileUserName) === true) {
			throw (new\InvalidArgumentException("Username is empty or insecure "));
		}
		if(strlen($newProfileUserName) > 32) {
			throw (new\RangeException("Username must be less than 32 charcters"));
		}
		$this->profileUserName = $newProfileUserName;
	}

	/*
	 * insert profile for profile table
	 */
	public function insert(\PDO $pdo) : void {
		$query = "INSERT INTO profile(profileId, profileActivationToken, profileDateJoined, profileEmail, profileHash, profileUserName) VALUES(:profileId, :profileActivationToken, :profileDateJoined, :profileEmail, :profileHash, :profileUserName) ";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileActivationToken" => $this->profileActivationToken, "profileDateJoined" => $this->profileDateJoined, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash,
							"profileUserName" => $this->profileUserName];
		$statement->execute($parameters);
	}

	/*
	 * update profile for profile table
	 */
	public function update(\PDO $pdo) : void {
		$query = "UPDATE profile SET profileId = :profileId, profileActivationToken = :profileActivationToken, profileDateJoined = :profileDateJoined, profileEmail = :profileEmail, profileHash = :profileHash, profileUserName = :profileUserName";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileActivationToken" => $this->profileActivationToken, "profileDateJoined" => $this->profileDateJoined, "profileEmail" => $this->profileEmail,
							"profileHash" => $this->profileHash, "profileUserName" => $this->profileUserName];
		$statement->execute($parameters);
	}

	/*
	 * delete method for profile table
	 */
	public function delete(\PDO $pdo) : void {
		$query = "DELETE FROM character WHERE characterId = :characterId";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes()];
		$statement->execute($parameters);
	}

}