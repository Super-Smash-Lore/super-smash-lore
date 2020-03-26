import {httpConfig} from "../misc/http-config";

export const getAllGames = () => async dispatch => {
	const {data} = await httpConfig('/apis/game/');
	dispatch({type: "GET_ALL_GAMES", payload: data})
};

export const getGameByCharacterId = (id) => async dispatch => {
	const {data} = await httpConfig(`/apis/game/${id}`);
	dispatch({type: "GET_GAME_BY_CHARACTER_ID", payload: data})
};