<?php

class Character {
	/*
	 * id for character: this is the primary key
	 */
	private $characterId;
	/*
	 * description of character
	 */
	private $characterDescription;
	/*
	 * music for character
	 */
	private $characterMusicUrl;
	/*
	 * picture for character
	 */
	private $characterPictureUrl;
	/*
	 * quotes from the character
	 */
	private $characterQuotes;
	/*
	 * date the character was released
	 */
	private $characterReleaseDate;
	/*
	 * song for the character
	 */
	private $characterSong;

	/*
	 * constructor for character
	 */

	public function __construct($characterId,$characterDescription,$characterMusicUrl,$characterPictureUrl,$characterQuotes,$characterReleaseDate,$characterSong) {
		try {
			$this->seCharacterId($newCharacterId);
			$this->setCharacterDescription($newCharacterDescription);
			$this->setCharacterMusicUrl($newCharacterMusicUrl);
			$this->setCharacterPictureUrl($newCharacterPictureUrl);
			$this->setCharacterQuotes($newCharacterQuotes);
			$this->setCharacterReleaseDate($newCharacterReleaseDate);
			$this->setCharacterSong($newCharacterSong);
		}
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError$exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0 ,$exception));
		}
	}

	/*
	 * accessor for character id
	 */
	public function getCharacterId() {
		return $this->characterId;
	}

	/*
	 * setter for character Id
	 */

}