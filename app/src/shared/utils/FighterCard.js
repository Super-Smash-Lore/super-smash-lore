import React from "react";
import Card from "react-bootstrap/Card";
import {Route} from "react-router";

// this is the component card that populates fighterselection.js

export const FighterCard = ({character, history}) => {
	return (
		<Route render={ ({history}) => (
		<Card className="card-body col-md-4 col-lg-2 mb-2 border-0"
					key={character.characterId} onClick={() => {history.push(`character/${character.characterId}`)}}>
				<Card.Img id ="smash-fighter" variant="top" src={character.characterPictureUrl}/>
				<Card.Body>
					{/*this calls to our database to populate the titles with the actual character's names.*/}
					<Card.Title>{character.characterName}</Card.Title>
				</Card.Body>
			</Card>
		)}/>
	)
};