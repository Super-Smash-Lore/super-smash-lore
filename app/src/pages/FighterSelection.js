import React, {useEffect, useState} from "react";
import Row from "react-bootstrap/Row";
import Container from 'react-bootstrap/Container';
import "../index.css"
import {FighterCard} from "../shared/utils/FighterCard"
import {useDispatch, useSelector} from "react-redux";
import {getAllCharacters} from "../shared/actions/character-action";
import Col from "react-bootstrap/Col";
import { faSearch } from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";


export const FighterSelection = () => {

	const [searchWord, setSearchWord] = useState('');

	// functions help setting up the search are below
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
						{/*search bar for the fighter page is below*/}
							<Col>
								<input id="search-box" className="pr-5"
										 type="text"
										 placeholder="Search"
										 searchWord={searchWord}
										 setSearchWord={setSearchWord}
										 onChange={setWord}
								/>
								<span>
									<FontAwesomeIcon icon={faSearch}/>
								</span>
							</Col>
						</Row>
					<Row>
						{/*characters mapped from our database are called below*/}
						{characters.map(character => (<FighterCard character={character}/>))}
					</Row>
				</Container>
			</main>
		</div>
	)
};