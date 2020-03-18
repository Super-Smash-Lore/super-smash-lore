// import React from "react";
// import {FighterSelection} from "../../pages/FighterSelection";
//
//
// export class SearchBar extends FighterSelection {
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
// 	.then(response => response.json())
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
// 						placeholder="Search"
// 						value={this.state.query}
// 						onChange={this.handleInputChange}/>
// 				</form>
// 				<div>{this.state.filterData.map(i => <p>{i.name}</p>)}</div>
// 			</SearchBar>
// 		)
// 	}
// }