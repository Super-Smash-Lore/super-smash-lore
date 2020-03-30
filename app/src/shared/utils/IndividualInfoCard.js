import React, {useEffect} from "react";
import Card from "react-bootstrap/Card";
import CardImg from "react-bootstrap/CardImg";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {HeartButton} from "../utils/HeartButton";
import {
	getCharacterByCharacterId,
	getFavoritesByFavoriteCharacterId,
	getGameByGameCharacterId
} from "../actions/character-action";
import {useDispatch, useSelector} from "react-redux";
// import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import Badge from "react-bootstrap/Badge";
import {UseJwtProfileId} from "./JwtHelpers";


export const IndividualInfoCard = ({match}) => {
	const dispatch = useDispatch();
	const sideEffects = () => {
		dispatch(getCharacterByCharacterId(match.params.characterId));
		dispatch(getGameByGameCharacterId(match.params.characterId));
		dispatch(getFavoritesByFavoriteCharacterId(match.params.characterId));
	};
	const sideEffectInputs = [match.params.characterId];
	useEffect(sideEffects, sideEffectInputs);
	const character = useSelector(state => (
		state.characters ? state.characters : null
	));
	const game = useSelector(state => (
		state.games ? state.games :null
	));
console.log(game);
	//Write useSelector to grab favorites from Redux

	const profileId = UseJwtProfileId();

	return (
		<>
			{character && (
				<div id="background-fighter">
					<main className="my-5">
						<Container fluid="true" className="container-fluid">
							<Row>
								<Col>
								<div className="col-12">
									<h1 className="" id="character-name">{character.characterName}</h1>
								</div>
								<div className="col-12" id="favorite-button">
									{/*pass favorites into heart button*/}
									<HeartButton characterId={character.characterId} profileId={profileId}/>
								</div>
								</Col>
							</Row>
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
											<a id="song-link" href={character.characterMusicUrl}>{character.characterSong}</a>
											<h2 id="quotes">
												Quotes:
											</h2>
											<ul id="carousel">
												{character.characterQuotes && character.characterQuotes.split(",").map(characterQuote => (
													<li>{characterQuote}</li>))}
											</ul>
											<h2 id="games">
												Games:
											</h2>
											<Row>
												<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">
													<Card>
														{/*{game.gameUrl && game.gameUrl.split(",").map(gameUrl => ({gameUrl}))}*/}
													<CardImg id="game-link" alt="Game Pictures" src={game.gamePictureUrl && game.gamePictureUrl.split(",").map(gamePictureUrl => (<p> {gamePictureUrl}</p>))}
													/>
													</Card>
												</Col>
												{/*<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">*/}
												{/*	<a id="song-link" href={game.gamePictureUrl}>{game.gameUrl}</a>*/}
												{/*</Col>*/}
												{/*<Col className="col-6 offset-3 offset-sm-0 col-sm-6 col-md-4 col-lg-3 mb-5">*/}
												{/*		<img className="img-fluid" id="game-pic-1" src={GameImage}/>*/}
												{/*</Col>*/}
											</Row>
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