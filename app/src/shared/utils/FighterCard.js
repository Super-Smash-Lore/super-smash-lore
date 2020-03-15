import React from "react";
import Card from "react-bootstrap/Card";
import {Route} from "react-router";

export const FighterCard = ({character, history}) => {
	return (
		<Route render={ ({history}) => (
		<Card className="card-body col-sm-4 col-md-3 col-lg-2 mb-2 border-0"
					key={character.characterId} onClick={() => {history.push(`character/${character.characterId}`)}}>
				<Card.Img variant="top" src={character.characterPictureUrl}/>
				<Card.Body>
					<Card.Title>{character.characterName}</Card.Title>
				</Card.Body>
			</Card>
		)}/>
	)
};