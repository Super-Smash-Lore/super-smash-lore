import React, {useEffect} from "react";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import "../index.css";
import Image from "../img/homemade-2.jpg";
import {UseJwt, UseJwtProfileId} from "../shared/utils/JwtHelpers";
import {getProfileByProfileId} from "../shared/actions/character-action";
import {useDispatch, useSelector} from "react-redux";
import Row from "react-bootstrap/Row";


export const ProfileSettings = () => {

	const dispatch = useDispatch();
	// grab the jwt and username for logged in users
	const profileId = UseJwtProfileId();

	useEffect(() => {
		dispatch(getProfileByProfileId(profileId))
	}, [profileId]);

	const profile = useSelector (state => state.profiles ? state.profiles.find(index => index.profileId === profileId) : []);

	return(
		<div id="settingsInBody">
		<main>
			<div className="mr-auto col-xl-12 pt-2 text-right">
				<div> {profile && (<h2>Username: {profile.profileUserName}</h2>)}</div>
				<a type="button" href="/favorites" className="btn btn-primary">Favorites</a>
			</div>
			<div className="container mt-5 col-lg-12">
				<Row>
					<div className="col-lg-6 mt-3">
						<Card id="about-border">
							<Card.Img className="rounded" variant="top" src={Image} />
						</Card>
					</div>
					<div id="ProfileSettings" className="col-lg-5 my-sm-2 text-center">
						{/*<h2 className="mb-sm-3">Profile Settings</h2>*/}
						<br/>
						<h2>
							New features with your
						</h2>
						<h2>
							profile coming soon!
						</h2>
						{/*<Form>*/}
						{/*	<div className="form-group">*/}
						{/*		<label className="float-left">Change UserName</label>*/}
						{/*		<input type="email" className="form-control " placeholder="New Username" />*/}
						{/*	</div>*/}
						{/*	<div className="form-group">*/}
						{/*		<label className="float-left">Change Email</label>*/}
						{/*		<input type="email" className="form-control" placeholder="New Email" />*/}
						{/*	</div>*/}
						{/*	<div className="form-group">*/}
						{/*		<label className="float-left">Change Password</label>*/}
						{/*		<input type="password" className="form-control " placeholder="New Password" />*/}
						{/*	</div>*/}
						{/*	<div className="form-group">*/}
						{/*		<label className="float-left">Confirm New Password</label>*/}
						{/*		<input type="password" className="form-control" placeholder="Confirm New Password" />*/}
						{/*	</div>*/}
						{/*	<div className="text-left mt-4">*/}
						{/*		<Button type="submit">Apply Changes</Button>*/}
						{/*		<p className="forgot-password text-right m-sm-4">*/}
						{/*		</p>*/}
						{/*	</div>*/}
						{/*</Form>*/}
					</div>
				</Row>
			</div>
		</main>
		</div>
	)
};