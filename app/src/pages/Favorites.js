import React from "react";
import Card from "react-bootstrap/Card";
import CardColumns from "react-bootstrap/CardColumns";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Form from "react-bootstrap/Form";
import InputGroup from "react-bootstrap/InputGroup";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import FormControl from "react-bootstrap/FormControl";
import Button from "react-bootstrap/Button";
import CardDeck from "react-bootstrap/CardDeck";
import Container from 'react-bootstrap/Container';
import Image from "../img/placeholder.png";

export const Favorites = () => {
	return (
		<>
			<main className="my-5">
				<Container fluid="true" className="container-fluid text-center text-md-center">
					<h1 className="text-md-left">Your Favorited Characters:</h1>
					<CardDeck>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<div className="Right-modal-upper col-xl-3 border-dark border-left">
							<div className="row-3 pt-5">
								<div className="row-3 pt-5">
									<h2>Profile: Name</h2>
									<a type="button" href="/about-us" className="btn btn-primary">Profile Settings</a>
								</div>
							</div>
						</div>
					</CardDeck>
					<CardDeck>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<div className="Right-modal-lower col-xl-3 border-dark border-left">
						<h1>Save all of your favorite fighters here to see information about them whenever you want.</h1>
						</div>
					</CardDeck>
				</Container>
			</main>
		</>
	)
};