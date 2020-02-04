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
			$this->setProfileActivationToken($newActivationToken);
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

	public function getActivationToken
}