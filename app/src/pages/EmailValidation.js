import React from 'react'
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Image from "../img/Super-smash.png";
import Figure from "react-bootstrap/Figure"
import Card from "react-bootstrap/Card";
import ButtonToolbar from "react-bootstrap/ButtonToolbar";
import Button from "react-bootstrap/Button";
import {Footer} from "../shared/utils/footer"
import "./styles.css"

export const EmailValidation = () => {
	return (
		<div>
				<Col className="d-flex justify-content-center mb-5"><h1>Welcome to Odyssey of Ultimate</h1>
					</Col>


			<Col md={{ span: 4, offset: 2 }}><img src={Image} alt=""/></Col>

			<Col className="d-flex justify-content-center">
				<h4> Confirming your profile and saving some of your favorite characters is only one more click away!</h4>
			</Col>
			<Col className="d-flex justify-content-center mt-3">
				<ButtonToolbar>
					<Button href="https://www.twitch.tv/c9zven" variant="link"> https://www.twitch.tv/c9zven</Button>
				</ButtonToolbar>
			</Col>
<Footer></Footer>

		</div>

	)
};