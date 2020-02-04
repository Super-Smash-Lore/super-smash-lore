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
	 * universe character lives in
	 */
	private $characterUniverse;
	/*
	 * constructor for character
	 */

	public function __construct($characterId,$characterDescription,$characterMusicUrl,$characterPictureUrl,$characterQuotes,$characterReleaseDate,$characterSong) {
		try {
			$this->setCharacterId($newCharacterId);
			$this->setCharacterDescription($newCharacterDescription);
			$this->setCharacterMusicUrl($newCharacterMusicUrl);
			$this->setCharacterPictureUrl($newCharacterPictureUrl);
			$this->setCharacterQuotes($newCharacterQuotes);
			$this->setCharacterReleaseDate($newCharacterReleaseDate);
			$this->setCharacterSong($newCharacterSong);
			$this->setCharacterUniverse($newCharacterUniverse);
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
	public function setCharacterId( $newCharacterId) : void {
		try {
			$uuid = self::validateUuid($newCharacterId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->$characterId = $uuid;
	}

	/*
	 * accessor for character description
	 */

	public function getCharacterDescription (){
		return $this->characterDescription;
	}

	/*
	 * setter for character description
	 */

	public function setCharacterDescription(string $newCharacterDescription){
		$newCharacterDescription = trim($newCharacterDescription);
		$newCharacterDescription = filter_var($newCharacterDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCharacterDescription) === true) {
			throw (new\InvalidArgumentException("description is empty or insecure"));
		}
		if(strlen($newCharacterDescription) > 255) {
			throw (new\RangeException("Description must be 255 characters or less"));
		}
		$this->characterDescription = $newCharacterDescription;
	}

}