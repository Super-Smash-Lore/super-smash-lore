<?php
require_once dirname(__DIR__, 3) . "/Classes/autoloader.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/jwt.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
use SuperSmashLore\SuperSmashLore\Profile;
/**
 * API for handling a sign in for the session
 *
 * @author RyanTorske
 */
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
try {
	//starting the session
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	//grab mySQL statement
	$secrets = new \Secrets("/etc/apache2/capstone-mysql/smash.ini");
	$pdo = $secrets->getPdoObject();
	//determine which HTTP method is being used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];
	//if method is post handle the sign in logic
	if($method === "POST") {
		//make sure the XSRF Token is valid
		verifyXsrf();
		//process the request content and decode the json object into a php object
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);
		//check to make sure the password and email field is not empty
		if(empty($requestObject->profileEmail) === true) {
			throw(new \InvalidArgumentException("Email Address Was Not Provided.", 401));
		} else {
			$profileEmail = filter_var($requestObject->profileEmail, FILTER_VALIDATE_EMAIL);
		}
		if(empty($requestObject->profilePassword) === true) {
			throw(new \InvalidArgumentException("Invalid Email Entered", 401));
		}
		//grab the profile from the database by the email provided
		$profile = Profile::getProfileByProfileEmail($pdo, $profileEmail);
		if(empty($profile) === true) {
			throw(new InvalidArgumentException("Invalid Email", 401));
		}
		$profile->setProfileActivationToken(null);
		$profile->update($pdo);
		//verify the hash entered is correct
		if(password_verify($requestObject->profilePassword, $profile->getProfileHash()) === false) {
			throw(new \InvalidArgumentException("Password Or Email Is Incorrect.", 401));
		}
		//grab the profile from the database and put it into the session
		$profile = Profile::getProfileByProfileId($pdo, $profile->getProfileId());
		$_SESSION["profile"] = $profile;
		//create the auth payload
		$authObject = (object) [
			"profileId" =>$profile->getProfileId(),
			"profileEmail" => $profile->getProfileEmail()
		];
		//create and set the JWT Token
		setJwtAndAuthHeader("auth", $authObject);
		$reply->message = "Sign In Was Successful";
	}else{
		throw(new \InvalidArgumentException("Invalid HTTP Method Request.", 418));
	}
	//if an exception is thrown u[date the message
} catch (Exception | TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
header("Content-type: application/json");
echo json_encode($reply);