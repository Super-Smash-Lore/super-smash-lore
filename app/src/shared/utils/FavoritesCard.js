import React from "react";
import Card from "react-bootstrap/Card";
import {Route} from "react-router";
import Placeholder from "../../img/Ganon-Placeholder.jpg";

export const FavoritesCard = ({character, history}) => {
	return (
		<Route render={ ({history}) => (
			<Card className="card-body col-xl-3 border-0">
				key={character.characterId} onClick={() => {history.push(`character/${character.characterId}`)}}>
				<Card.Img variant="top" src={Placeholder}/>
				<Card.Body>
					<Card.Title>Character Name</Card.Title>
				</Card.Body>
			</Card>
		)}/>
	)
};