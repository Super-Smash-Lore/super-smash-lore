import React, {useState, useEffect} from "react";
import {useSelector} from "react-redux";
import {httpConfig} from "../misc/http-config";
import {UseJwt} from "./JwtHelpers";
import {isEmpty} from "../misc/js-object-helpers";
import {handleSessionTimeout} from "../misc/handle-session-timeout";

import Button from "react-bootstrap/Button";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
// import Badge from "react-bootstrap/Badge";

//Based on Example from Rochelle Lewis

export const HeartButton = ({characterId, profileId}) => {


	// grab the jwt for logged in users
	const jwt = UseJwt();

	/*
	* State Variables
	*
	* isFavorited will hold a text value that will set the button color
	* to red whether or not the logged in user has favorited the beer.
	*
	* favoriteCount holds the number of favorites for each post by postId.
	* */
	const [isFavorited, setIsFavorited] = useState(null);
	const [favoriteCount, setFavoriteCount] = useState(0);

	// Grab all favorites from the redux store
	const favorites = useSelector(state => (state.favorites ? state.favorites : []));

console.log(favorites);

	const effects = () => {
		initializeFavorites(profileId);
		countFavorites(characterId);
		console.log(favoriteCount);
	};

	// add favorites to inputs - this informs React that favorites are being updated from Redux. This ensures proper component rendering.
	const inputs = [favorites, characterId, profileId];
	useEffect(effects, inputs);

	/*
	* initializeFavorites function filters over all the favorites
	* from the Redux store, and sets the isFavorited state variable
	* to "active" if the logged in user has already favorited the character.
	*
	* "active" is a Bootstrap class that makes the buttons red.
	*
	* We're using a custom function isEmpty() to check for an empty object.
	* See: js-object-helpers.js
	* */
	const initializeFavorites = (profileId) => {
		const profileFavorites = favorites.filter(favorite => favorite.favoriteProfileId === profileId);
		const favorited = profileFavorites.find(function(o) {return o.favoriteCharacterId === characterId});
		return (isEmpty(favorited) === false) && setIsFavorited("active");
	};

	/*
	* countFavorites function filters over the favorites from the Redux store,
	* creating a subset of favorites for this characterId.
	*
	* The favoriteCount state variable is set to the length of this set.
	* */
	const countFavorites = (characterId) => {
		const characterFavorites = favorites.filter(favorite => favorite.favoriteCharacterId === characterId);
		console.log(characterId);
		return (setFavoriteCount(characterFavorites.length));
	};

	/*
	* data object gets passed in Axios POST and DELETE requests.
	* See submitFavorite and deleteFavorite below.
	* */
	const data = {
		favoriteCharacterId: characterId,
		favoriteProfileId: profileId
	};

	/*
	* toggleFavorite gets called when a Favorite is successfully created or deleted by the profile.
	* This toggles the state of the isFavorited variable.
	*
	* See submitFavorite and deleteFavorite.
	* */
	const toggleFavorite = () => {
		setIsFavorited(isFavorited === null ? "active" : null);
	};

	/*
	* Profile posts a favorite.
	* */
	const submitFavorite = () => {
		const headers = {'X-JWT-TOKEN': jwt};
		httpConfig.post("/apis/favorite/", data, {
			headers: headers})
			.then(reply => {
				let {message, type} = reply;
				if(reply.status === 200) {
					toggleFavorite();
					setFavoriteCount(favoriteCount + 1);
				}
				// if there's an issue with a $_SESSION mismatch with xsrf or jwt, alert profile and do a sign out
				if(reply.status === 401) {
					handleSessionTimeout();
				}
			});
	};
/*
* Profile removes a favorite.
**/
	const removeFavorite = () => {
		const headers = {'X-JWT-TOKEN': jwt};
		httpConfig.put("/apis/favorite/", data, {
			headers: headers})
			.then(reply => {
				let {message, type} = reply;
				if(reply.status === 200) {
					toggleFavorite();
					setFavoriteCount(favoriteCount > 0 ? favoriteCount - 1 : 0);
				}
				// if there's an issue with a $_SESSION mismatch with xsrf or jwt, alert profile and do a sign out
				if(reply.status === 401) {
					handleSessionTimeout();
				}
			});
	};

	/*
	* Fire this function onclick
	* */
	const clickFavorite = () => {
		(isFavorited === "active") ? removeFavorite() : submitFavorite();
	};


	return (
		<>
			<Button variant="outline-primary" size="sm" className={`post-favorite-btn ${(isFavorited !== null ? isFavorited : "")}`} disabled={!jwt && true} onClick={clickFavorite}>
				Favorite <FontAwesomeIcon icon="heart"/>
			</Button>
			<p className="mt-2 font-weight-bold text-primary">
				Favorited By: {favoriteCount}
			</p>
		</>
	)
};

