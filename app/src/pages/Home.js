import React from "react"
import splash from "../img/Odyssey-Of-Ultimate-Banner-2.png"
import Card from "react-bootstrap/Card";
import Container from "react-bootstrap/Container";
import Logo from "../img/OoD-Logo-v2.png"
import Button from "react-bootstrap/Button";
import {NavBar} from "../shared/utils/NavBar";

export const Home = () => (
	<body>
	<NavBar></NavBar>
			<div className="home">
			<h1 id="title-top">Odyssey</h1>
				<h1 id="Of">Of</h1>
			<h1>Ultimate</h1>
				<div>
					<p id="developed-by">
						Developed By:
					</p>
					<p id="developed-by-2">
						Deep Diving for Nintendo
					</p>
				</div>
				<div>
					<p id="started">
						Let's get started!
					</p>
					<div id="start-button">
						<a type="button" href="FighterInfo.js/" className="btn btn-dark btn-lg">Fighters</a>
					</div>
				</div>
			</div>
	</body>
	);

