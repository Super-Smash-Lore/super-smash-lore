// import React from "react";
//
// export class SearchBar {
// 	state = {
// 		query: "",
// 		data: [],
// 		filterData: []
// 	};
//
// 	handleInputChange = event => {
// 		const query = event.target.value;
//
// 		this.setState(prevState => {
// 			const filteredData = prevState.data.filter(element => {
// 				return element.name.toLowerCase().includes(query.toLowerCase());
// 			});
//
// 			return {
// 				query,
// 				filteredData
// 			};
// 		});
// 	};
//
// 	getData = () => {
// 		fetch(`http://localhost:3000/fighter-selection`)
// 			.then(response => response.json())
// 			.then(data => {
// 				const { query } = this.state;
// 				const filteredData = data.filter(element => {
// 					return element.name.toLowerCase().includes(query.toLowerCase())
// 				});
// 				this.setState({
// 					data,
// 					filteredData
// 				});
// 			});
// 	};
// 	componentWillMount() {
// 		this.getData();
// 	}
// 	render() {
// 		return (
// 			<SearchBar className="SearchBar">
// 				<form>
// 					<input
// 					placeholder="Search"
// 					value={this.state.query}
// 					onChange={this.handleInputChange}/>
// 				</form>
// 				<div>{this.state.filterData.map(i => <p>{i.name}</p>)}</div>
// 			</SearchBar>
// 		)
// 	}
// }


// import React, {Component} from "react";
// //
// // export const SearchBar = ({Character, history}) => {
// // 	const data = [
// // 		{characterName: 'Joker',
// // 		description: 'iuweiwuef'},
// // 		{
// // 			characterName: 'dede',
// // 			description: 'iuwfiuwerh'
// // 		}
// // 	];
// // 	{
// // 		return (
// // 			<SearchBar
// // 			placeholder = "Search"
// // 			data = {this.data}
// // 			callback={record => console.log(record)}/>
// // 		)
// // 	}
// // };
//
// import React, {useEffect} from "react";
// import {getCharacterByCharacterName} from "../actions/character-action";
// import {IndividualInfoCard} from "./IndividualInfoCard";
// import {useDispatch, useSelector} from "react-redux";
//
//
// export const SearchBar = ({match}) => {
// 	console.log(match.params.characterName);
// 	const dispatch = useDispatch();
// 	const sideEffects = () => {
// 		dispatch(getCharacterByCharacterName(match.params.characterName));
// 	};
// 	const sideEffectInputs = [match.params.characterName];
// 	useEffect(sideEffects, sideEffectInputs);
// 	const character = useSelector(state => (
// 		state.characters ? state.characters : null
// 	));
// 	console.log(character);
// 	return (
// 		<>
// 		<IndividualInfoCard></IndividualInfoCard>
// 		</>
// 	)
// };


