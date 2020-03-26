import {httpConfig} from "../misc/http-config";

export const getAllCharacters = () => async dispatch => {
	const {data} = await httpConfig('/apis/character/');
	dispatch({type: "GET_ALL_CHARACTERS", payload: data })
};

export const getCharacterByCharacterName = (name) => async dispatch => {
	const {data} = await httpConfig('/apis/character/?characterName=$(name)');
	dispatch({type: "GET_CHARACTER_BY_CHARACTER_NAME", payload: data })
};

export const getCharactersByCharacterName = (name) => async dispatch => {
	const {data} = await httpConfig('/apis/character/?characterName=$(name)');
	dispatch({type: "GET_CHARACTERS_BY_CHARACTER_NAME", payload: data })
};

export const getCharacterByFavoriteProfileId = (id) => async dispatch => {
	const {data} = await httpConfig('/apis/favorite/');
	dispatch({type: "GET_CHARACTER_BY_FAVORITE_PROFILE_ID", payload: data })
};

export const getCharacterByCharacterId = (id) => async dispatch => {
	const {data} = await httpConfig(`/apis/character/${id}`);
	dispatch({type: "GET_CHARACTER_BY_CHARACTER_ID", payload: data })
};
export const getGameByGameCharacterId = (characterId) => async dispatch => {
	const {data} = await httpConfig(`/apis/game/?gameCharacterId=${characterId}`);
	dispatch({type: "GET_GAME_BY_GAME_CHARACTER_ID", payload: data })
};

export const getFavoritesByFavoriteCharacterId = (characterId) => async dispatch => {
	const {data} = await httpConfig(`/apis/favorite/?favoriteCharacterId=${characterId}`);
	dispatch({type: "GET_FAVORITES_BY_FAVORITE_CHARACTER_ID", payload: data })
};

export const getAllFavorites = () => async dispatch => {
	const {data} = await httpConfig('/apis/favorite/');
	dispatch({type: "GET_ALL_FAVORITES", payload: data })
};

export const getProfileByProfileId = (id) => async dispatch => {
	const {data} = await httpConfig(`/apis/profile/${id}`);
	dispatch({type: "GET_PROFILE_BY_PROFILE_ID", payload: data })
};

// export const getBeerByTagId = (tagId) => async dispatch => {
// 	const {data} = await httpConfig(`/apis/beer/?tagId=${tagId}`);
// 	dispatch({type: "GET_BEER_BY_BEER_TYPE", payload: data})