import React from "react";
import Card from "react-bootstrap/Card";
import CardImg from "react-bootstrap/CardImg";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
// import Alert from '/react-bootstrap/react-bootstrap.alert'
import CardDeck from "react-bootstrap/CardDeck";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
// import Image from "../img/OoD-Logo-v2.png";
import Placeholder from "../img/Ganon-Placeholder.jpg";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import {NavBar} from "../shared/utils/NavBar";
export const Favorites = () => (

	<body id="favorites-body">
	<main className="my-5 flex-row">
		<Container fluid="true" className="container-fluid">
			<Row>
				<div className="text-right col-12 pb-1">
					<h1 className="" id="character-name">Your Favorites:</h1>
				</div>
			</Row>
		</Container>
		<Container fluid="true" className="container-fluid" id="whole-row">
			<Row className="favorite-row">
				<Col className="profile-area col-12 offset-lg-0 col-xl-3 pb-5 mb-5">
					<Card className="card-body border-0 text-center" id="card-3">
						<div className="Profile d-flex pt-3 col-xl-12">
							<div className="mr-auto col-xl-12 pb-5 pt-2">
								<h2 id="Profile-section">Profile: Name</h2>
								<a type="button" href="/about-us" className="btn btn-primary">Profile Settings</a>
							</div>
						</div>
						<div className="p-2 align-self-center col-xl-12">
							<h3>Save all of your favorite fighters here to see information about them whenever you want.</h3>
						</div>
					</Card>
				</Col>
				<Col className="favorite-panel pre-scrollable col-12 col-xl-9 border-left border-dark pt-2 ">
					<Card className="border-0" id="card-4">
						<Card.Body>
							<CardDeck>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder}/>
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
							</CardDeck>
							<CardDeck>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder}/>
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
							</CardDeck>
							<CardDeck>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder}/>
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
								<Card className="card-body col-xl-12 border-0">
									<Card.Img variant="top" src={Placeholder} />
									<Card.Body>
										<Card.Title>Character Name</Card.Title>
									</Card.Body>
								</Card>
							</CardDeck>
						</Card.Body>
					</Card>
				</Col>
			</Row>
		</Container>
	</main>
	<div className="fixed-bottom">
		<footer className="page-footer font-small blue bg-primary">
			<div className="footer-copyright text-center mt-5">
				<div className="d-flex justify-content-center">
					<p className="my-2">OdysseyOfUltimate.com 2020</p>
				</div>
			</div>
		</footer>
	</div>
	</body>
);