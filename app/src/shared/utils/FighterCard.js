import React from "react";
import Card from "react-bootstrap/Card";
import Image from "../../img/kirby.png";


export const FighterCard = () => {
	return (
		<>
			<Card className="card-body col-sm-4 col-md-3 col-lg-2 mb-2 border-0">
				<Card.Img variant="top" src={Image}/>
				<Card.Body>
					<Card.Title>Character Name</Card.Title>
				</Card.Body>
			</Card>
		</>
	)
};