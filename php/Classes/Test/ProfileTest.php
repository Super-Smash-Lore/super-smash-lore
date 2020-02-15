<?php
namespace SuperSmashLore\SuperSmashLore\Test;

use SuperSmashLore\SuperSmashLore\{Profile};



// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoloader.php");

// grab the uuid generator
require_once(dirname(__DIR__,2) . "/lib/uuid.php");

/**
 * Full PHPUnit test for Profile class
 *
 *This is a complete PHPUnit test for the Profile classIt is complete because All mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Profile
 * @author Daniel Gonzales <dgonzales371@cnm.edu>
 **/
class ProfileTest extends SuperSmashLoreTest {
//	/**
//	 * valid profile to use
//	 * @var string $VALID_PROFILEID
//	 */
//	protected $VALID_PROFILEID;
	/**
	 * valid activation for profile
	 * @var string $VALID_ACTIVATIONTOKEN
	 */
	protected $VALID_ACTIVATION_TOKEN;
	/**
	 *valid date joined
	 * @var string $VALID_DATEJOINED
	 */
	protected $VALID_DATE_JOINED= "02/14/20";
	/**
	 * valid email for profile
	 * @var string $VALID_EMAIL
	 */
	protected $VALID_EMAIL= "Smash@gmail.com";
	/**
	 * valid hash for profile
	 * @var string $VALID_HASH
	 */
	protected $VALID_HASH;
	/**
	 * valid username for profile
	 * @var string $VALID_USERNAME
	 */
	protected $VALID_USERNAME= "DORIYAH247";


	/**
	 * run the default setup operation to create salt and hash.
	 */
	public final function setUp() : void {
		parent::setUp();

		//
	$password = "abc123";
	$this->VALID_HASH = password_hash($password, PASSWORD_FIGHTER2424, ["time_cost" => 384]);
	$this->VALID_ACTIVATION = bin2hex(random_bytes(16));
}

/**
 *test inserting a valid Profile and verify that the actual mySQL data matches
 **/
public function testInsertValidProfile() : void {
	// count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED, $this->VALID_EMAIL,$this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

	// grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
	$this->assertsEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertsEquals($pdoProfile->getProfileId(), $this->VALID_PROFILEID);
		$this->assertsEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL);
		$this->assertsEquals($pdoProfile->getProfileUserName(), $this->VALID_PROFILEUSERNAME);
}
/**
 * test inserting a Profile, editing it, and then updating it
 */
public function testUpdateValidProfile() {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

//create a new profile ad insert it in mySQL
	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN,  $this->VALID_DATE_JOINED, $this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

//edit the Profile and update it in mySQL
	$profile->setProfileActivationToken($this->VALID_HASH);
	$profile->update($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());


	$this->assertsEquals($numRows +1, $this->getConnection()->getRowCount("profile"));
	$this->assertsEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertsEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertsEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertsEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertsEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertsEquals($pdoProfile->getProfileUserName(), $this->VALID_HASH);
}

/**
 *  test creating a Profile and then deleting it
 */
public function testDeleteValidProfile() : void {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
		$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED, $this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());


//delete the Profile from mySQL
	$this->assertsEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$profile->delete($this->getPDO());

//grab the data from mySQL and enforce the Profile does not exist
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
	$this->assertsNull($pdoProfile);
	$this->assertsEquals($numRows, $this->getConnection()->getRowCount("profile"));
}

/**
 * test inserting a Profile and regrabbing it from mySQL
 */
public function testGetValidProfileByProfileId() : void {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED, $this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
	$this->assertsEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertsEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertsEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertsEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertsEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertsEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertsEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}

/**
 * test grabbing a Profile that does not exist
 */
public function testGetInvalidProfileByProfileId() : void {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED, $this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

//grab the data from MySQL
	$results = Profile::getProfileByProfileId($this->getPDO(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertsEquals($numRows +1, $this->getConnection()->getRowCount("profile"));

//enforce no other objects and bleeding into profile
	$this->assertsContainsOnlyInstancesOf("SuperSmashLore\\SuperSmashLore\\Profile");

//enforce the results meet expectations
	$pdoProfile = $results[0];
	$this->assertsEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertsEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertsEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertsEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertsEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertsEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertsEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}

/**
 * test grabbing a Profile by at handle that does not exist
 */
public function testGetInvalidProfileByAtHandle() : void {
// count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED,$this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert(($this->getPDO()));

// grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileEmail($this->getConnection);
	$this->assertsEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertsEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertsEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertsEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertsEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertsEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertsEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}
/**
 *  test grabbing a Profile by an email that does not exists
 */
public function testGetInvalidProfileByEmail() : void {
//grab an email that does not exist
	$profile = Profile::getProfileByProfileEmail($this->getPDO(), "does@not.exist");
	$this->assertNull($profile);
}
/**
 * test grabbing a profile bu its activation
 */
public function testGetValidProfileByActivationToken() : void {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED,$this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

//grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileActivationToken($this->getPDO(), $profile->getProfileActivationToken());
	$this->assertsEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertsEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertsEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertsEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertsEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertsEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertsEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}

}
