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
	public function getFavoriteProfileId(): string {
		return $this->favoriteProfileId;
	}
	/**
	 * mutator method for favorites
	 *
	 * @param string $favoriteCharacterId for favorite characters
	 * @throws \InvalidArgumentException if $favoriteProfileId is not a valid or secure profile
	 * @throws \RangeException if $favoriteCharacterId is > 16 characters
	 * @throws \TypeError if $favoriteCharacterId is not a string
	 **/
}