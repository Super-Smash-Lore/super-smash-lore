import React from "react";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import "../index.css";
import Image from "../img/homemade-2.jpg";
import Col from "react-bootstrap/Col";
import {NavBar} from "../shared/utils/NavBar";
// import {Footer} from "../shared/utils/footer"
export const ProfileSettings = () => {
	return(
		<body id="settingsInBody">
		<main>
			<div className="mr-auto col-xl-12 pt-2 text-right">
				<h2 id="Profile-section">Profile: Name</h2>
				<a type="button" href="/favorites" className="btn btn-primary">Favorites</a>
			</div>
			<div className="container  mt-5 col-xl-12">
				<row className="row">
					<div className="col-xl-5 ml-3 mt-3 mr-3">
						<Card>
							<Card.Img id="logo-pic" variant="top" src={Image} />
						</Card>
					</div>
					<div id="ProfileSettings" className="col-xl-6 my-sm-1 text-center border-left border-dark">
						<h2 className="mb-sm-3">Profile Settings</h2>
						<Form>
							<div className="form-group  ml-5">
								<label className="float-left">Change UserName</label>
								<input type="email" className="form-control " placeholder="New Username" />
							</div>
							<div className="form-group ml-5">
								<label className="float-left">Change Email</label>
								<input type="email" className="form-control" placeholder="New Email" />
							</div>
							<div className="form-group ml-5">
								<label className="float-left">Change Password</label>
								<input type="password" className="form-control " placeholder="New Password" />
							</div>
							<div className="form-group ml-5">
								<label className="float-left">Confirm New Password</label>
								<input type="password" className="form-control" placeholder="Confirm New Password" />
							</div>
							<div className="d-flex justify-content-end">
								<Button type="submit">Apply Changes</Button>
								<p className="forgot-password text-right m-sm-4">
								</p>
							</div>
						</Form>
					</div>
				</row>
			</div>
		</main>
		</body>
	)
};