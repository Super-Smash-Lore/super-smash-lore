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
import Image from "../img/kirby.png";
import {NavBar} from "../shared/utils/NavBar";
import "./styles.css"
import Navbar from "react-bootstrap/Navbar";



export const FighterSelection = () => {
	return (
		<body id="fighterBody">
			<NavBar></NavBar>
			<main  className="my-5">
				<Container fluid="true" className="container-fluid text-center text-md-center">
					<Form inline>
						<h1 className="text-md-left col-6"><strong>CHOOSE YOUR FIGHTER:</strong></h1>
						<FormControl type="text" placeholder="Search" className="mr-sm-2 col-5 border-dark" />
						<Button className="btn btn-primary my-sm-4" variant="outline-dark">Search</Button>
					</Form>
					<CardDeck id="1">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="2">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="3">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="4">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="5">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="6">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="7">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="8">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="9">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="10">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="11">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="12">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
					</CardDeck>
					<CardDeck id="13">
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image}/>
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
							<Card.Img variant="top" src={Image} />
							<Card.Body>
								<Card.Title>Character Name</Card.Title>
							</Card.Body>
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
						</Card>
						<Card className="card-body col-xl-2 mb-2 border-0">
						</Card>
					</CardDeck>
				</Container>
				<footer id="foot">
					<Navbar id="footBar" sticky="bottom">
						<p>If you can see this, I love you</p>
						<a id="backToTop" href="#Top">Back to Top</a>
					</Navbar>
				</footer>
			</main>
		</body>
	)
};