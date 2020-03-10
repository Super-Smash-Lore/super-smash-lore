import React from "react";
import Card from "react-bootstrap/Card";
import CardDeck from "react-bootstrap/CardDeck";
import Container from 'react-bootstrap/Container';
import Image from "../img/placeholder.png";
import "../styles.css"


export const Favorites = () => {
	return (
		<>
			<div className="Title pl-4 pt-4">
			<h1 className="text-md-left pt-3">Your Favorite Characters:</h1>
			</div>
			<main className="Main my-2 align-items-baseline ml-5">
				<Container fluid="true" className="container-fluid text-center text-md-center pre-scrollable col-xl-12">
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
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
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
					<Card className="card-body col-xl-2 border-0">
						<Card.Img variant="top" src={Image} />
						<Card.Body>
							<Card.Title>Character Name</Card.Title>
						</Card.Body>
					</Card>
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
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
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
						<Card className="card-body col-xl-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
				</Container>
			</main>
			<div className="Profile d-flex pt-3 col-xl-12">
				<div className="mr-auto p-2 col-xl-4 pb-5 pl-5">
					<h2>Profile: Name</h2>
					<a type="button" href="/about-us" className="btn btn-primary">Profile Settings</a>
				</div>
				<div className="p-2 align-self-center col-xl-8">
					<h1>Save all of your favorite fighters here to see information about them whenever you want.</h1>
				</div>
			</div>
		</>
	)
};