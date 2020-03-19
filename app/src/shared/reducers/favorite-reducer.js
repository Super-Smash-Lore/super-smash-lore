export default (state = [], action) => {
	switch(action.type) {
		case "GET_ALL_FAVORITES":
			return action.payload;
		case "GET_FAVORITE_BY_FAVORITE_CHARACTER_ID_AND_FAVORITE_PROFILE_ID":
			return [...state, action.payload];
		case "GET_FAVORITES_BY_FAVORITE_CHARACTER_ID":
			return action.payload;
		default:
			return state;
	}
}