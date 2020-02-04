<?php

class Profile{
/*
 * id for profile: this is a primary key
 */
	private $profileId;
/*
 * activation token for profile
 */
	private $activationToken;
/*
 * date user joined
 */
	private $dateJoined;
/*
 *  description of the profile
 */
	private $profileDescription;
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

	public function __construct($newProfileId, $newActivationToken, $newDateJoined, $newProfileDescription, $newProfileEmail, $newProfileHash, $newProfileUserName = null) {
		try {
			$this->setProfileId($newProfileId);
			$this->setActivationToken($newActivationToken);
			$this->setDateJoined($newDateJoined);
			$this->setProfileDescription($newProfileDescription);
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
		$this->$profileId = $uuid;
	}

	/*
	 * accessor method for activation token
	 */

	public function getActivationToken() : ?string {
		return $this->activationToken;
	}

	/*
	 * setter for activation token
	 */

	public function setActivationToken(string $newActivationToken) : void {
		if($newActivationToken === null) {
			$this->activationToken = null;
			return;
		}
		$newActivationToken = strtolower(trim($newActivationToken));
		if(strlen($newActivationToken) !== 32) {
			throw (new\RangeException("Activation token has to be 32 character"));
		}
		$this->activationToken = $newActivationToken;
	}

	/*
	 * accessor for dateJoined
	 */

	public function getDateJoined() {

	}

	/*
	 * setter for date Joined
	 */

	public function setDateJoined(){

	}

	/*
	 * accessor for profile description
	 */
	public function getProfileDescription() : ?string{
		return $this->profileDescription;
	}

	/*
	 * setter for profile description
	 */

	public function setProfileDescription(string $newProfileDescription): void {
		$newProfileDescription = trim($newProfileDescription);
		$newProfileDescription = filter_var($newProfileDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileDescription) === true) {
			throw (new \InvalidArgumentException("description is empty or insecure");
		}
		if(strlen($newProfileDescription) > 255) {
			throw (new \RangeException("Must be less than 255 characters"));
		}
		$this->profileDescription = $newProfileDescription;
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

	public function setProfileUserName(string $NewProfileUserName) {
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

}