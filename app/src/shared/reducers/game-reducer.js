export default (state = [], action) => {
	switch(action.type) {
		case "GET_ALL_GAMES":
			return action.payload;
		case "GET_GAME_BY_GAME_CHARACTER_ID":
			return action.payload;
		default:
			return state;
	}
}