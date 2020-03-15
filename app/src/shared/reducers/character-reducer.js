export default (state = [], action) => {
	switch(action.type) {
		case "GET_ALL_CHARACTERS":
			return action.payload;
		case "GET_CHARACTER_BY_CHARACTER_ID":
			return action.payload;
		case "GET_CHARACTER_BY_CHARACTER_NAME":
			return action.payload;
		case "GET_CHARACTERS_BY_CHARACTER_NAME":
			return action.payload;
		case "GET_CHARACTER_BY_FAVORITE_PROFILE_ID":
			return action.payload;
		default:
			return state;
	}
}