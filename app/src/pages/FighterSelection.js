import React, {useEffect, useState} from "react";
import Row from "react-bootstrap/Row";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import "../index.css"
import {FighterCard} from "../shared/utils/FighterCard"
import {useDispatch, useSelector} from "react-redux";
import {getAllCharacters} from "../shared/actions/character-action";
import Col from "react-bootstrap/Col";


export const FighterSelection = () => {

	const [searchWord, setSearchWord] = useState('');

	const setWord = (e) => {
		e.preventDefault();

		setSearchWord(e.target.value);
	};

	const fighterState = useSelector(state => state.characters ? state.characters : []);

	const filteredFighters = fighterState.filter(character => character.characterName.toLowerCase().includes(searchWord));

	const characters = filteredFighters, dispatch = useDispatch();

	function sideEffects() {
		dispatch(getAllCharacters());
	}

	const sideEffectsInputs = [];

	useEffect(sideEffects, sideEffectsInputs);

	return (
		<div id="fighterBody">
			<main className="my-5">
				<Container fluid="true" className="container-fluid text-center text-md-center">
					<Row>
						<h2 className="text-lg-left col-lg-9"><strong>CHOOSE YOUR FIGHTER:</strong></h2>
						{/*search bar is below*/}
							<Col>
								<input id="search-box" className="pr-5"
										 type="text"
										 placeholder="Search"
										 searchWord={searchWord}
										 setSearchWord={setSearchWord}
										 onChange={setWord}
								/>
							<Button className="btn btn-primary" variant="outline-dark">Go!</Button>
							</Col>
						</Row>
					<Row>
						{characters.map(character => (<FighterCard character={character}/>))}
					</Row>
				</Container>
			</main>
		</div>
	)
};