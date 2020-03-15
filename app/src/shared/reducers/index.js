import {combineReducers} from 'redux'
import {characterReducer} from './character-reducer'
import {gameReducer} from './game-reducer'
import {profileReducer} from './profile-reducer'
import {favoriteReducer} from './favorite-reducer'

export const combinedReducers = combineReducers({
	characters: characterReducer,
	game: gameReducer,
	favorite: favoriteReducer,
	profile: profileReducer
});