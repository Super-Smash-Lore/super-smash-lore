import React from "react";
import Card from "react-bootstrap/Card";
import Form from "react-bootstrap/Form";
import FormControl from "react-bootstrap/FormControl";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import Placeholder from "../img/Ganon-Placeholder.jpg";


export const FighterInfo = () => (
	<>
		<main className="my-5">
			<Container fluid="true" className="container-fluid text-center text-md-center">
				<Form inline>
					<h1 className="text-md-left col-6" id="character-name"><strong>Ganondorf</strong></h1>
					<FormControl type="text" placeholder="Search" className="mr-sm-2 col-5" />
					<Button variant="outline-primary">Search</Button>
					<h2>
						About:
					</h2>
				</Form>
					<Card className="card-body col-3 border-0 text-center">
						<Card.Img variant="top" src={Placeholder}/>
						<Card.Body>
							<Card.Title>Character Name</Card.Title>
						</Card.Body>
					</Card>
			</Container>
		</main>
		</>
);