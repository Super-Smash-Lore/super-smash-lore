import React from "react";
import Card from "react-bootstrap/Card";
import CardImg from "react-bootstrap/CardImg";
import Form from "react-bootstrap/Form";
import FormControl from "react-bootstrap/FormControl";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import Placeholder from "../img/Ganon-Placeholder.jpg";
// import Alert from '/react-bootstrap/react-bootstrap.alert'
import GameImage from "../img/The_Legend_of_Zelda_A_Link_Between_Worlds_NA_cover.jpg"
import CardDeck from "react-bootstrap/CardDeck";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Image from "../img/OoD-Logo-v2.png";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import {NavBar} from "../shared/utils/NavBar";




export const FighterInfo = () => (
	<body id="background-fighter">
	<NavBar/>
		<main className="my-5">
			<Container fluid="true" className="container-fluid">
				<Row>
					<div className="text-right col-12">
						<h1 className="" id="character-name">Ganondorf</h1>
					</div>
				</Row>
				<Row>
					<div className="text-right col-12" id="favorite-me">
						<Button variant="primary">Favorite</Button>
						{/*<Alert variant="success">*/}
						{/*<Alert.Heading>Hey, nice to see you</Alert.Heading>*/}
						{/*</Alert>*/}
					</div>
				</Row>
			</Container>
			<Container fluid="true" className="container-fluid" id="whole-row">
				<Row>
					<Col className="col-6 offset-3 offset-lg-0 col-lg-3 fighter-img-panel">
						<Card className="card-body border-0 text-center" id="card-1">
							<CardImg src={Placeholder}/>
						</Card>
					</Col>
					<Col className="col-12 offset-lg-3 col-lg-9 fighter-text-panel">
						<Card className="border-0" id="card-2">
							<Card.Body>
								<h2 id="about">
									About:
								</h2>
								<p id="about-character">
									Ganondorf also known as “King of Thieves” or the “Demon King”, is a Gerudo and the villain and antagonist in the Legend of Zelda series.
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
								<Row>
									<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">
										<a href='https://smile.amazon.com/Nintendo-Selects-Legend-Zelda-Between-Worlds/dp/B0792R1NYY/ref=sxin_0_ac_d_rm?ac_md=0-0-bGluayBiZXR3ZWVuIHdvcmxkcw%3D%3D-ac_d_rm&crid=2C6TP367GAC6H&cv_ct_cx=link+between+worlds&keywords=link+between+worlds&pd_rd_i=B0792R1NYY&pd_rd_r=82c3940e-527a-42e3-8331-c13220ae4a0e&pd_rd_w=IZMNt&pd_rd_wg=YdNV4&pf_rd_p=ec111f65-4a46-499c-be78-f47997212bd0&pf_rd_r=2WCJXPFGP94EAC8F1EWE&psc=1&qid=1584051066&sprefix=lnik+betwee%2Caps%2C219'>
											<img className="img-fluid" id="game-pic-1" src={GameImage}/>
										</a>
									</Col>
									<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">
										<a href='https://smile.amazon.com/Nintendo-Selects-Legend-Zelda-Between-Worlds/dp/B0792R1NYY/ref=sxin_0_ac_d_rm?ac_md=0-0-bGluayBiZXR3ZWVuIHdvcmxkcw%3D%3D-ac_d_rm&crid=2C6TP367GAC6H&cv_ct_cx=link+between+worlds&keywords=link+between+worlds&pd_rd_i=B0792R1NYY&pd_rd_r=82c3940e-527a-42e3-8331-c13220ae4a0e&pd_rd_w=IZMNt&pd_rd_wg=YdNV4&pf_rd_p=ec111f65-4a46-499c-be78-f47997212bd0&pf_rd_r=2WCJXPFGP94EAC8F1EWE&psc=1&qid=1584051066&sprefix=lnik+betwee%2Caps%2C219'>
											<img className="img-fluid" id="game-pic-1" src={GameImage}/>
										</a>
									</Col>
									<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">
										<a href='https://smile.amazon.com/Nintendo-Selects-Legend-Zelda-Between-Worlds/dp/B0792R1NYY/ref=sxin_0_ac_d_rm?ac_md=0-0-bGluayBiZXR3ZWVuIHdvcmxkcw%3D%3D-ac_d_rm&crid=2C6TP367GAC6H&cv_ct_cx=link+between+worlds&keywords=link+between+worlds&pd_rd_i=B0792R1NYY&pd_rd_r=82c3940e-527a-42e3-8331-c13220ae4a0e&pd_rd_w=IZMNt&pd_rd_wg=YdNV4&pf_rd_p=ec111f65-4a46-499c-be78-f47997212bd0&pf_rd_r=2WCJXPFGP94EAC8F1EWE&psc=1&qid=1584051066&sprefix=lnik+betwee%2Caps%2C219'>
											<img className="img-fluid" id="game-pic-1" src={GameImage}/>
										</a>
									</Col>
								</Row>
							</Card.Body>
						</Card>
					</Col>
				</Row>
			</Container>
		</main>
	</body>
);