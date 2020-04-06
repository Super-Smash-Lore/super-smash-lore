import React, {useEffect} from "react";
import Card from "react-bootstrap/Card";
import CardImg from "react-bootstrap/CardImg";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container';
import CardDeck from "react-bootstrap/CardDeck";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {useDispatch, useSelector} from "react-redux";
import {getProfileByProfileId, getAllFavorites, getFavoritesByFavoriteCharacterId} from "../shared/actions/character-action";
import {UseJwtProfileId} from "../shared/utils/JwtHelpers";


export const Favorites = () => {

	const dispatch = useDispatch();
// grab the jwt and username for logged in users
	const profileId = UseJwtProfileId();
	console.log(profileId);

	useEffect(() => {
		dispatch(getProfileByProfileId(profileId))
	}, [profileId]);

	const profile = useSelector(state => state.profiles ? state.profiles.find(index => index.profileId === profileId) : []);

	return (
		<div id="favorites-body">
			<main className="my-5 flex-row">
				<Container fluid="true" className="container-fluid">
					<Row>
						<div className="text-right col-12 pb-1">
							<h1 className="" id="character-name">Your Favorites:</h1>
						</div>
					</Row>
				</Container>
				<Container fluid="true" className="container-fluid" id="whole-row">
					<Row className="favorite-row">
						<Col className="profile-area col-12 offset-lg-0 col-xl-3 pb-5 mb-5">
							<Card className="card-body border-0 text-center" id="card-3">
								<div className="Profile d-flex pt-3 col-xl-12">
									<div className="mr-auto col-xl-12 pb-5 pt-2">
										<div> {profile && (<h2>Username: {profile.profileUserName}</h2>)}</div>
										<a type="button" href="/profile" className="btn btn-primary">Profile Settings</a>
									</div>
								</div>
								<div className="p-2 align-self-center col-xl-12">
									<h3>Save all of your favorite fighters here to see information about them whenever you
										want.</h3>
								</div>
							</Card>
						</Col>
						<Col className="favorite-panel pre-scrollable col-12 col-xl-9 border-left border-dark pt-2 ">
							<Card className="border-0" id="card-4">
								<Card.Body>
									<CardDeck>
										<h2>
											Feature Coming Soon!
										</h2>
										{/*{characters.map}*/}
									</CardDeck>
								</Card.Body>
							</Card>
						</Col>
					</Row>
				</Container>
			</main>
		</div>
	)
};