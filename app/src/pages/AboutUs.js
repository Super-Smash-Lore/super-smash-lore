import React from "react";
import Card from "react-bootstrap/Card";
import Image from "../img/Odyssey-Of-Ultimate-Banner.png"
import Row from "react-bootstrap/Row";
import {NavBar} from "../shared/utils/NavBar";
import "../index.css"

export const AboutUs = () => {
	return(
		<>
			<main className="my-5 text-white">
				<div className="container-fluid text-center text-md-left">

						<div id="about-image"  className="col-lg-12">
							<Card.Img src={Image} id="Banner" alt="banner"/>
						</div>
						<div className="col-lg-12">
							<Card className="border-0 text-dark text-shadow-dark text-lg-left" id="about-us-text">
								<Card.Body>
									<h4>About Odyssey Of Ultimate:</h4>
									<p>We are a dedicated team who enjoys the finer games in life. We were tired of seeing the same old
										Wiki-form pages for Super Smash Bros. Games and wanted to change it. We have all characters as soon as they are released. If you
										enjoy a certain character, there is a section at each page bottom with other games they have been in.</p>
									<p>At the moment we do not include move sets, however, we include a basic knowledge and background on them.
										Move sets are nice to know, but nothing beats the thrill of being able to pull them off during an intense stock-battle. We
										are all nerds at heart, and growing up with most of these games, we have a heartfelt knowledge on most games
										and most characters. We are trying to keep this site minimalistic in our approach, but still have an new and fresh feel.</p>
									<p>Creating an account with us is as easy as could be. Sign up with your email, set-up a password, and you are set from there. This
										functionality allows the user to favorite their favorite character to refer back to later. As this is just a basic start-up site,
										we will be adding further functionality to it later. Look forward to see you join the page and start adding characters to your roster.</p>
								</Card.Body>
							</Card>
						</div>

					</div>
			</main>
		</>
	)
};