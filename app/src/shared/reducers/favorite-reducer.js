export default (state = [], action) => {
	switch(action.type) {
		case "GET_ALL_FAVORITES":
			return action.payload;
		case "GET_FAVORITES_BY_FAVORITE_CHARACTER_ID":
			return action.payload;
		default:
			return state;
	}
}