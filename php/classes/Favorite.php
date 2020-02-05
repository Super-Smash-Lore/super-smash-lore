<?php

class Favorite {
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
 	** setter for character Id
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

	public function getFavoriteProfileId(): string {
		return $this->favoriteProfileId;
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
	public function getFavoriteDate(): string {
		return $this->favoriteDate;
	}


	public function setCharacterReleaseDate ($newCharacterReleaseDate) : void {
		try {
			$releaseDate = self::validateDate($newCharacterReleaseDate);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->characterReleaseDate = $releaseDate;
	}
}