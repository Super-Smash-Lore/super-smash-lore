<?php
namespace SuperSmashLore\SuperSmashLore\Test;

use SuperSmashLore\SuperSmashLore\Profile;



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
	 * @var string $VALID_ACTIVATION_TOKEN
	 */
	protected $VALID_ACTIVATION_TOKEN="12345678901234567890123456789012";
	/**
	 *valid date joined
	 * @var string $VALID_DATE_JOINED
	 */
	protected $VALID_DATE_JOINED;
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
	 * valid email for profile 2
	 * @var string $VALID_EMAIL2;
	 */
	protected $VALID_EMAIL2= "Smash247@gmail.com";
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
	$this->VALID_HASH = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 7]);
	$this->VALID_ACTIVATION_TOKEN = bin2hex(random_bytes(16));
	$this->VALID_DATE_JOINED = new \DateTime("2020-02-18");
}

/**
 *test inserting a valid Profile and verify that the actual mySQL data matches
 **/
public function testInsertValidProfile() : void {
	// count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED, $this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

	// grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
	$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}
/**
 * test inserting a Profile, editing it, and then updating it
 */
public function testUpdateValidProfile() {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

//create a new profile ad insert it in mySQL
	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED, $this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

//edit the Profile and update it in mySQL
	$profile->setProfileEmail($this->VALID_EMAIL2);
	$profile->update($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());


	$this->assertEquals($numRows +1, $this->getConnection()->getRowCount("profile"));
	$this->assertEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL2);
	$this->assertEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
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
	$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$profile->delete($this->getPDO());

//grab the data from mySQL and enforce the Profile does not exist
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
	$this->assertNull($pdoProfile);
	$this->assertEquals($numRows, $this->getConnection()->getRowCount("profile"));
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
	$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}

///**
// * test grabbing a profile by its activation
// */
public function testGetValidProfileByActivationToken() : void {
//count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("profile");

	$profileId = generateUuidV4();
	$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED,$this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
	$profile->insert($this->getPDO());

//grab the data from mySQL and enforce the fields match our expectations
	$pdoProfile = Profile::getProfileByProfileActivationToken($this->getPDO(), $profile->getProfileActivationToken());
	$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
	$this->assertEquals($pdoProfile->getProfileId(), $profileId);
	$this->assertEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
	$this->assertEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
	$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
	$this->assertEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
	$this->assertEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
}

	public function testGetValidProfileByProfileEmail() : void {
//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		$profileId = generateUuidV4();
		$profile = new Profile($profileId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_DATE_JOINED,$this->VALID_EMAIL, $this->VALID_HASH, $this->VALID_USERNAME);
		$profile->insert($this->getPDO());

//grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileEmail($this->getPDO(), $profile->getProfileEmail());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertEquals($pdoProfile->getProfileId(), $profileId);
		$this->assertEquals($pdoProfile->getProfileActivationToken(), $this->VALID_ACTIVATION_TOKEN);
		$this->assertEquals($pdoProfile->getProfileDateJoined(), $this->VALID_DATE_JOINED);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_EMAIL);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->VALID_HASH);
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->VALID_USERNAME);
	}
}
