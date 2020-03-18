import {combineReducers} from 'redux'
import characterReducer from './get-character'
import gameReducer from './game-reducer'
import profileReducer from './profile-reducer'
import favoriteReducer from './favorite-reducer'

export const combinedReducers = combineReducers({
	characters: characterReducer,
	games: gameReducer,
	favorites: favoriteReducer,
	profiles: profileReducer
});