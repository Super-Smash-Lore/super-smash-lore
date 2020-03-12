import React from "react";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import "./styles.css"
import Image from "../img/Super-smash.png";
import Col from "react-bootstrap/Col";
import {Footer} from "../shared/utils/footer"

export const ProfileSettings = () => {

	return(
		<body id="settingsInBody">

		<main>

			<div className="container pt-sm-5 mt-sm-5">
				<div className="row">
					<div className="col-5 mt-5 mr-5">
						<Card>
							<Card.Img id="logo-pic" variant="top" src={Image} />
						</Card>
					</div>
					<div id="ProfileSettings" className="col-6 my-sm-1 text-center border-left border-dark">
						<h2 className="mb-sm-3">Profile Settings</h2>
						<Form>
							<div className="form-group my-sm-3 ml-5">
								<label className="float-left">Change UserName</label>
								<input type="email" className="form-control " placeholder="New Username" />
							</div>
							<div className="form-group my-sm-3 ml-5">
								<label className="float-left">Change Email</label>
								<input type="email" className="form-control" placeholder="New Email" />
							</div>
							<div className="form-group my-sm-3 ml-5">
								<label className="float-left">Change Password</label>
								<input type="password" className="form-control " placeholder="New Password" />
							</div>
							<div className="form-group my-sm-3 ml-5">
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
				</div>
			</div>
		</main>
		<Footer> </Footer>
		</body>
	)
};