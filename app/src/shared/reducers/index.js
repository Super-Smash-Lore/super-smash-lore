import {combineReducers} from 'redux'
import {characterReducer} from './character-reducer'

export const combinedReducers = combineReducers({
	characters: characterReducer
});