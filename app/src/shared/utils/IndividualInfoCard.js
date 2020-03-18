import React, {useEffect} from "react";
import Card from "react-bootstrap/Card";
import CardImg from "react-bootstrap/CardImg";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {getCharacterByCharacterId} from "../actions/character-action";
import {useDispatch, useSelector} from "react-redux";
// import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import Badge from "react-bootstrap/Badge";

export const IndividualInfoCard = ({match}) => {
const dispatch = useDispatch();
	const sideEffects = () => {
		dispatch(getCharacterByCharacterId(match.params.characterId));
	};
	const sideEffectInputs = [match.params.characterId];
	useEffect(sideEffects, sideEffectInputs);
	const character = useSelector(state => (
		state.characters ? state.characters : null
	));
	return (
		<>
			{character && (
		<div id="background-fighter">
			<main className="my-5">
				<Container fluid="true" className="container-fluid">
					<Row>
						<div className="text-right col-12">
							<h1 className="" id="character-name">{character.characterName}</h1>
						</div>
					</Row>
					{/*<Row>*/}
					{/*<Button variant="outline-danger" size="sm" className={`post-like-btn ${(isLiked !== null ? isLiked : "")}`} onClick={clickLike} disabled={!jwt && true}>*/}
					{/*	<FontAwesomeIcon icon="heart"/>&nbsp;*/}
					{/*	<Badge variant="danger">1</Badge>*/}
					{/*</Button>*/}
					{/*</Row>*/}
				</Container>
				<Container fluid="true" className="container-fluid" id="whole-row">
					<Row>
						<Col className="col-6 offset-3 offset-lg-0 col-lg-3 fighter-img-panel">
							<Card className="card-body border-0 text-center" id="card-1">
								<CardImg src={character.characterPictureUrl}/>
							</Card>
						</Col>
						<Col className="col-12 offset-lg-3 col-lg-9 fighter-text-panel">
							<Card className="border-0" id="card-2">
								<Card.Body>
									<h2 id="about">
										About:
									</h2>
									<p id="about-character">{character.characterDescription}</p>
									<h2 id="universe">
										Universe:
									</h2>
									<p id="universe-character">{character.characterUniverse}</p>
									<h2 id="debut">
										Debut:
									</h2>
									<p id="debut-character">{character.characterReleaseDate}</p>
									<h2 id="song">
										Theme Music:
									</h2>
									<a id="song-link"  href={character.characterMusicUrl}>{character.characterSong}</a>
									<h2 id="quotes">
										Quotes:
									</h2>
									<ul id="carousel">
										{character.characterQuotes && character.characterQuotes.split(",").map(characterQuote => (<li>{characterQuote}</li>))}
									</ul>
									{/*<h2 id="games">*/}
									{/*	Games:*/}
									{/*</h2>*/}
									{/*<Row>*/}
									{/*	<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">*/}
									{/*		<a href='https://smile.amazon.com/Nintendo-Selects-Legend-Zelda-Between-Worlds/dp/B0792R1NYY/ref=sxin_0_ac_d_rm?ac_md=0-0-bGluayBiZXR3ZWVuIHdvcmxkcw%3D%3D-ac_d_rm&crid=2C6TP367GAC6H&cv_ct_cx=link+between+worlds&keywords=link+between+worlds&pd_rd_i=B0792R1NYY&pd_rd_r=82c3940e-527a-42e3-8331-c13220ae4a0e&pd_rd_w=IZMNt&pd_rd_wg=YdNV4&pf_rd_p=ec111f65-4a46-499c-be78-f47997212bd0&pf_rd_r=2WCJXPFGP94EAC8F1EWE&psc=1&qid=1584051066&sprefix=lnik+betwee%2Caps%2C219'>*/}
									{/*			<img className="img-fluid" id="game-pic-1" src={character.characterGamePictureUrls.map(gamePictureUrl=>(gamePictureUrl) )}/>*/}
									{/*		</a>*/}
									{/*	</Col>*/}
									{/*	<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">*/}
									{/*		<a href='https://smile.amazon.com/Nintendo-Selects-Legend-Zelda-Between-Worlds/dp/B0792R1NYY/ref=sxin_0_ac_d_rm?ac_md=0-0-bGluayBiZXR3ZWVuIHdvcmxkcw%3D%3D-ac_d_rm&crid=2C6TP367GAC6H&cv_ct_cx=link+between+worlds&keywords=link+between+worlds&pd_rd_i=B0792R1NYY&pd_rd_r=82c3940e-527a-42e3-8331-c13220ae4a0e&pd_rd_w=IZMNt&pd_rd_wg=YdNV4&pf_rd_p=ec111f65-4a46-499c-be78-f47997212bd0&pf_rd_r=2WCJXPFGP94EAC8F1EWE&psc=1&qid=1584051066&sprefix=lnik+betwee%2Caps%2C219'>*/}
									{/*			<img className="img-fluid" id="game-pic-1" src={GameImage}/>*/}
									{/*		</a>*/}
									{/*	</Col>*/}
									{/*	<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">*/}
									{/*		<a href='https://smile.amazon.com/Nintendo-Selects-Legend-Zelda-Between-Worlds/dp/B0792R1NYY/ref=sxin_0_ac_d_rm?ac_md=0-0-bGluayBiZXR3ZWVuIHdvcmxkcw%3D%3D-ac_d_rm&crid=2C6TP367GAC6H&cv_ct_cx=link+between+worlds&keywords=link+between+worlds&pd_rd_i=B0792R1NYY&pd_rd_r=82c3940e-527a-42e3-8331-c13220ae4a0e&pd_rd_w=IZMNt&pd_rd_wg=YdNV4&pf_rd_p=ec111f65-4a46-499c-be78-f47997212bd0&pf_rd_r=2WCJXPFGP94EAC8F1EWE&psc=1&qid=1584051066&sprefix=lnik+betwee%2Caps%2C219'>*/}
									{/*			<img className="img-fluid" id="game-pic-1" src={GameImage}/>*/}
									{/*		</a>*/}
									{/*	</Col>*/}
									{/*</Row>*/}
								</Card.Body>
							</Card>
						</Col>
					</Row>
				</Container>
			</main>
		</div>
			)}
		</>
	);
};