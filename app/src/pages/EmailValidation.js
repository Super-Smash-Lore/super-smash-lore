import React from 'react'
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Image from "../img/Super-smash.png";
import Figure from "react-bootstrap/Figure"
import Card from "react-bootstrap/Card";
import "./styles.css"

export const EmailValidation = () => {
	return (
		<div className="">

			<Row>
				<Col md={4}><h1>Welcome to Odyssey of Ultimate</h1>
					</Col>
			</Row>
<Row>
			<Col xs={12} md={8}><img className=" mt-5" src={Image} alt=""/></Col>
</Row>
			<Row>
			<Col md={4}>
				<p><strong> Confirming your profile and saving some of your favorite characters is only one more click away!</strong></p>
				<p>OdysseyOfUltimate.com 2020</p>
			</Col>
			</Row>
		</div>
	)
};