import { httpConfig } from '../utils/http-config'

export const getAllPosts = () => async (dispatch) => {
	const {data} = await httpConfig('/apis/post/')
	dispatch({ type: 'GET_ALL_POSTS', payload: data })
}







// import {httpConfig} from "../misc/http-config";
//
// export const userAction = () => async dispatch => {
// 	const {data} = await httpConfig('../../../../php/public_html/apis/character');
// 	dispatch({type: "GET_ALL_CHARACTERS", payload: data })
// };
//
// export const getCharacterByCharacterName = (name) => async dispatch => {
// 	const {data} = await httpConfig(`/apis/character`);
// 	dispatch({type: "GET_CHARACTER_BY_CHARACTER_NAME", payload: data })
// };
//
// export const getCharactersByCharacterName = (name) => async dispatch => {
// 	const {data} = await httpConfig(`../../../../php/public_html/apis/character`);
// 	dispatch({type: "GET_CHARACTERS_BY_CHARACTER_NAME", payload: data })
// };
//
// export const getCharacterByFavoriteProfileId = (id) => async dispatch => {
// 	const {data} = await httpConfig(`../../../../php/public_html/apis/favorite`);
// 	dispatch({type: "GET_CHARACTER_BY_FAVORITE_PROFILE_ID", payload: data })
// };
//
// export const getCharacterByCharacterId = (id) => async dispatch => {
// 	const {data} = await httpConfig(`../../../../php/public_html/apis/character`);
// 	dispatch({type: "GET_CHARACTER_BY_CHARACTER_ID", payload: data })
// };
// export const getGamesByCharacterId = (id) => async dispatch => {
// 	const {data} = await httpConfig(`../../../../php/public_html/apis/game`);
// 	dispatch({type: "GET_GAMES_BY_CHARACTER_NAME", payload: data })
// };
//
// export const getFavoritesByFavoriteCharacterId = (id) => async dispatch => {
// 	const {data} = await httpConfig(`../../../../php/public_html/apis/favorite`);
// 	dispatch({type: "GET_FAVORITES_BY_FAVORITE_CHARACTER_ID", payload: data })
// };
//
// export const getProfileByProfileId = (id) => async dispatch => {
// 	const {data} = await httpConfig(`../../../../php/public_html/apis/profile`);
// 	dispatch({type: "GET_PROFILE_BY_PROFILE_ID", payload: data })
// };
