import React, {useEffect} from "react";
import Container from 'react-bootstrap/Container';
import Row from "react-bootstrap/Row";
import {IndividualInfoCard} from "../shared/utils/IndividualInfoCard";
import {useDispatch, useSelector} from "react-redux";
import {getAllCharacters} from "../shared/actions/character-action";



export const FighterInfo = () => {
	const dispatch = useDispatch();
	const characters = useSelector(state => state.characters ? state.characters : []);
	const sideEffects = () => {
		dispatch(getAllCharacters())
	}
	const sideEffectInputs = [];

	useEffect(sideEffects, sideEffectInputs)
	return (
		<div id="background-fighter">
		<main className="my-5">
			<Container fluid="true" className="container-fluid">
				<Row>
					{characters.split(",".map)(character => (<IndividualInfoCard character={character}/>))}
				</Row>
			</Container>
		</main>
		</div>
	);
}