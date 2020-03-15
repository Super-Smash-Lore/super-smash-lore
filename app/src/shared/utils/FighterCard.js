import React from "react";
import Card from "react-bootstrap/Card";
import Image from "../../img/Ganon-Placeholder.jpg";


export const FighterCard = ({character}) => {
	return (
		<>
			<Card className="card-body col-sm-4 col-md-3 col-lg-2 mb-2 border-0">
				<Card.Img variant="top" src={character.characterPictureUrl}/>
				<Card.Body>
					<Card.Title>{character.characterName}</Card.Title>
				</Card.Body>
			</Card>
		</>
	)
};