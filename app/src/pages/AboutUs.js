import React from "react";
import Card from "react-bootstrap/Card";
import Image from "../img/Odyssey-Of-Ultimate-Banner edited.png"

export const AboutUs = () => {
	return(
		<>
			<main className="my-5 text-white">
				<div className="container-fluid text-center text-md-left">
					<div className="row">
						<div className="col-xl-6">
							<h1>About Odyssey Of Ultimate</h1>
							<Card.Img src={Image} id="Banner-40rem" alt="banner"/>
						</div>
						<div className="col-xl-6">
							<Card className="bg-primary border-0 rounded-0 text-white text-shadow-dark">
								<Card.Body>
									<h4>About Odyssey Of Ultimate</h4>
										<p>We are a dedicated team who enjoys the funner games in life. We were tired of seeing the same old
										Wiki-form pages for Super Smash Bros. Games and wanted to change it. We have included the Characters page,
										which includes each character all the way to the most recent release dates. We have dedicated time to research the original
										release dates of each character, starting way back in the Nintendo and arcade cabinet days, and what consoles and equipment
										they were original playable on. We have included other games each character has been in as well. So if you really enjoy that character,
										but have never played any of their previous games, there will be links for options to buy those games.</p>
										<p>Instead of including the move-sets for each individual character, we include a basic knowledge and background on them.
										Move sets are nice to know, but nothing beats the thrill of being able to pull them off during an intense stock-battle. We
										are all nerds at heart, and growing up with most of these games, we have a heartfelt knowledge on most games
										and most characters. We are trying to keep this site minimalistic in our approach, but still have an new and fresh feel.</p>
										<p>Creating an account with us is as easy as could be. Sign up with your email, set-up a password, and you are set from there. This
										functionality allows the user to favorite their favorite character to refer back to later. As this is just a basic start-up site,
										we will be adding further functionality to it later. Look forward to see you join the page and start adding characters to your roster.</p>
										{/*<p>In the future we will be partnering with Seraph7.gg to help get gaming days set and bracket challenges to approach in groups.*/}
										{/*Seraph7 is a new startup company that specializes in group cohesion for other games. The company initially started with APEX Legends group*/}
										{/*, League of Legends, and a few other notable games through Discord channels. They did this to bring the communities together*/}
										{/*and remove some of the frustrating factors that pushed people away from these games.</p>*/}
								</Card.Body>
							</Card>
						</div>
					</div>
				</div>
			</main>
		</>
	)
};