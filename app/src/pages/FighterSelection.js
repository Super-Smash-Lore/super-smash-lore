import React, {useEffect} from "react";
import Card from "react-bootstrap/Card";
import CardColumns from "react-bootstrap/CardColumns";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Form from "react-bootstrap/Form";
import InputGroup from "react-bootstrap/InputGroup";
import FormControl from "react-bootstrap/FormControl";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import Image from "../img/Ganon-Placeholder.jpg";
import {NavBar} from "../shared/utils/NavBar";
import "../index.css";
import {FighterCard} from "../shared/utils/FighterCard"
import {useDispatch, useSelector} from "react-redux";
import {getAllCharacters} from "../shared/actions/character-action";
import {SearchBar} from "../shared/utils/SearchBar";



export const FighterSelection = () => {
	const dispatch = useDispatch();
	const characters = useSelector(state => state.characters ? state.characters : [] );
	const sideEffects = () => {
		dispatch(getAllCharacters())
	}
	const sideEffectInputs = [];

	useEffect(sideEffects, sideEffectInputs)

	return (
		<div id="fighterBody">
		<main  className="my-5">
			<Container fluid="true" className="container-fluid text-center text-md-center">
				<SearchBar/>
				<Form inline>
					<h2 className="text-md-left col-lg-6"><strong>CHOOSE YOUR FIGHTER:</strong></h2>
					<FormControl type="text" placeholder="Search" className="mr-sm-2 col-lg-5 border-dark" />
					<Button className="btn btn-primary my-sm-4" variant="outline-dark">Search</Button>
				</Form>
				<Row>
					{characters.map(character =>(<FighterCard character={character}/>))}
				</Row>
			</Container>
		</main>
		</div>
	)
};