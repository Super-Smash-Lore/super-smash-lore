import React from "react";
import Card from "react-bootstrap/Card";
import Form from "react-bootstrap/Form";
import FormControl from "react-bootstrap/FormControl";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import Placeholder from "../img/Ganon-Placeholder.jpg";
// import Alert from '/react-bootstrap/react-bootstrap.alert'
import Carousel from "react-bootstrap/Carousel";
import GameImage from "../img/The_Legend_of_Zelda_A_Link_Between_Worlds_NA_cover.jpg"




export const FighterInfo = () => (
	<body id="background-fighter">
		<main className="my-5">
			<Container fluid="true" className="container-fluid">
				<row>
					<div className="text-right">
						<h1 className="" id="character-name">Ganondorf</h1>
					</div>
				</row>
				<row>
					<div className="text-right" id="favorite-me">
						<Button variant="primary">Favorite</Button>
						{/*<Alert variant="success">*/}
						{/*<Alert.Heading>Hey, nice to see you</Alert.Heading>*/}
						{/*</Alert>*/}
					</div>
				</row>
			</Container>
			<Container fluid="true" className="container-fluid" >
				<div className="row">
					<Card className="card-body col-3 border-0 text-center" id="card-1">
						<Card.Img variant="top" src={Placeholder}/>
						<Card.Body>
							<Card.Title>Image: Breathe of The Wild II</Card.Title>
						</Card.Body>
					</Card>
					<Card className="col-9 pre-scrollable border-dark" id="card-2">
						<Card.Body>
							<h2 id="about">
								About:
							</h2>
							<p id="about-character">
								Ganondorf also known as “King of Theieves” or the “Demon King”, is a Gerudo and the villain and antagonist in the Legend of Zelda series.
								Ganondorf is a magical overpowering character who will do what he wants and what he deems as right.
								Ganon is the wielder of the Triforce of Power and is usually the great evil Link must confront in his story.
								Ganon’s story varies in the different games, but usually he is released through the breaking of some sort of seal.
								Once released he uses his unmatchable power to wreak havoc and darkness across all of Hyrule.
								In most cases the only one who is able to defeat Ganon is the one who is chosen by the Goddess, the hero,
								that being Link. Ganondorf is a villain like no other, he is timeless and always will be,
								at some points you may even start thinking he is just downright cool, regardless the great evil must always be defeated.
								So jump in and take him on!
							</p>
							<h2 id="universe">
								Universe:
							</h2>
							<p id="universe-character">
								The Legend of Zelda
							</p>
							<h2 id="debut">
								Debut:
							</h2>
							<p id="debut-character">
								February 21, 1986
							</p>
							<h2 id="quotes">
								Quotes:
							</h2>
								<ul id="carousel">
									<li>
										<p>
											"My only mistake was to slightly underestimate the power of this kid... No...
											it was not the kid's power I misjudged, it was the power of the Triforce of Courage!
											But, with the Triforce of Wisdom that Zelda has... When I obtain these two Triforces...
											Then, I will become the true ruler of the world!!"
										</p>
									</li>
									<li>
										<p>
											"My country lay within a vast desert. When the sun rose into the sky,
											a burning wind punished my lands, searing the world. And when the moon climbed into the dark of night,
											a frigid gale pierced our homes. No matter when it came, the wind carried the same thing...
											Death. But the winds that blew across the green fields of Hyrule brought something other than suffering and ruin.
											I coveted that wind, I suppose."
										</p>
									</li>
									<li>
										<p>
											"Your people have long amused me, Midna. To defy the gods with such petty magic, only to be cast aside…
											How very pathetic. Pathetic as they were, though, they served me well. Their anguish was my nourishment.
											Their hatred bled across the void and awakened me. I drew deep of it and grew strong again.
											Your people had some skill, to be sure…but they lacked true power.
										</p>
									</li>
								</ul>
							<h2 id="games">
								Games:
							</h2>
							<div>
								<img id="game-pic-1"
											src={GameImage}
								/>
							</div>
						</Card.Body>
					</Card>
				</div>
			</Container>
		</main>
		</body>
);