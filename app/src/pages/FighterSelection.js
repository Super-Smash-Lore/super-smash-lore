import React, {useEffect} from "react";
import Row from "react-bootstrap/Row";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import "../index.css"
import {FighterCard} from "../shared/utils/FighterCard"
import {useDispatch, useSelector} from "react-redux";
import {getAllCharacters, searchCharacterByName} from "../shared/actions/character-action";
import Col from "react-bootstrap/Col";


export const FighterSelection = () => {
	const dispatch = useDispatch();
	const characters = useSelector(state => state.characters ? state.characters : []);
	const sideEffects = () => {
		dispatch(getAllCharacters())
	};
	const sideEffectInputs = [];

	useEffect(sideEffects, sideEffectInputs);

	const handleChange = event => {
		dispatch(searchCharacterByName(event.target.value))
		//return statement if search bar is empty needs to be made.
	};
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
									onChange={handleChange}
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