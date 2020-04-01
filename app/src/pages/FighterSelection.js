import React, {useEffect} from "react";
import Row from "react-bootstrap/Row";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import "../index.css"
import {FighterCard} from "../shared/utils/FighterCard"
import {useDispatch, useSelector} from "react-redux";
import {getAllCharacters, searchCharacterByName} from "../shared/actions/character-action";


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
					<Form className="form-inline md-form mr-auto mb-4">
						<h2 className="text-md-left col-lg-6"><strong>CHOOSE YOUR FIGHTER:</strong></h2>
						{/*search bar is below*/}
						<Row>
							<Container>
								<input className=""
									type="text"
									placeholder="Search"
									onChange={handleChange}
								/>
							<Button className="btn btn-outline-primary btn-sm my-0" variant="outline-dark">Search</Button>
							</Container>
						</Row>
					</Form>
					<Row>
						{characters.map(character => (<FighterCard character={character}/>))}
					</Row>
				</Container>
			</main>
		</div>
	)
};