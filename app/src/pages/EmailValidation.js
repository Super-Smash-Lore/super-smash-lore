import React from 'react'
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Figure from "react-bootstrap/Figure"
import ButtonToolbar from "react-bootstrap/ButtonToolbar";
import Button from "react-bootstrap/Button";
import Image from "../img/Odyssey-Of-Ultimate-Banner.png"
import "../styles.css"
import Card from "react-bootstrap/Card";
import CardDeck from "react-bootstrap/CardDeck";




export const EmailValidation = () => {
	return (
		<Col className="flex-xl-column">
			<div className="d-flex justify-content-center mb-2 col-xs-12">
				<row>
					<h2>Welcome to Odyssey of Ultimate</h2>
				</row>
			</div>

			<div className="page-pic d-flex justify-content-center mb-3 col-xs-12">
				<row className="content-banner">
					<img src={Image} alt="banner"/>
				</row>
			</div>

			<div className="d-flex justify-content-center content-row col-xs-12">
					<h4> Confirming your profile and saving some of your favorite characters is only one more click away!</h4>
			</div>
			<div className="d-flex justify-content-center mt-3 col-xs-12">
				<ButtonToolbar>
					<Button href="https://www.twitch.tv/c9zven" variant="link"> https://www.twitch.tv/c9zven</Button>
				</ButtonToolbar>
			</div>

		</Col>

)
};