import React from "react"
import splash from "../img/Odyssey-Of-Ultimate-Banner.png"
import smashsplash from "../img/Smash-Splash.jpg"
import Card from "react-bootstrap/Card";
import Container from "react-bootstrap/Container";
import Logo from "../img/OoD-Logo-v2.png"
import Button from "react-bootstrap/Button";
import {NavBar} from "../shared/utils/NavBar";
import {FighterSelection} from "./FighterSelection";
import Row from "react-bootstrap/Row";
import Image from "../img/homemade-2.jpg";

export const Home = () => (
	<body>
	<div className="home">
		<div className="col-lg-12 text-center">
			<h1>Odyssey of Ultimate</h1>
		</div>
		<div className="text-lg-center">
			<p id="developed-by">
				Developed By: Deep Diving for Nintendo
			</p>
		</div>
		<Row>
			<div className="col-8 offset-2  text-center mt-2">
				<Card>
					<Card.Img className="rounded" variant="top" src={splash} alt="odyssey"/>
				</Card>
			</div>
		</Row>
		<div className="text-center mt-5">
			<h2 id="learn-text">
				Learn the stories of some of your favorite characters!
			</h2>
			<Row className="mt-5 px-0">
				<div className="col-lg-6 col-md-10 offset-md-1 offset-lg-1 text-center mt-2  border-0 px-0">
					<Card>
						<Card.Img className="rounded"  src={smashsplash} alt="odyssey"/>
					</Card>
				</div>
				<div className="col-lg-4 col-md-8 offset-md-1 mt-sm-5 text-lg-left" id="home-info">
					<p>
						Odyssey of Ultimate invites you to set sail on new adventures.
					</p>
					<p>
						Check out some of the stories behind your favorite Smash Bros characters and even join them in
						the stories that have made them so famous!
					</p>
					<div className="text-center my-5">
						<button className="border-dark rounded bg-dark btn btn-lg">
							<a type="button" href='/fighter-selection' className="home-button btn btn-lg text-white">Let's get started!</a>
						</button>
					</div>
				</div>
			</Row>
		</div>
	</div>
	</body>
);

