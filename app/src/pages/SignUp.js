import React, {useEffect} from "react";
import {httpConfig} from "../shared/utils/http-config";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import smash from "../img/Playing-Switch.jpg";
import Image from "../img/OoD-Logo-v2.png";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import {NavBar} from "../shared/utils/NavBar";




export const SignUp = () => {
	useEffect(() => {
		httpConfig.get("/apis/earl-grey")
	});
	return(
		<>
			<main>
				<div className="container pt-sm-5 mt-sm-5">
					<div className="row">
						<div className="col-lg-8">
							<Card id="sign-up-image">
								<Card.Img src={smash}/>
								<p id="sign-up-text">Start saving some of your favorite characters!</p>
							</Card>
						</div>
						<div className="col-lg-4 text-left">
							<h2>Sign Up</h2>
							<form>
								<div className="form-group mb-lg-4 mt-lg-4">
									<label>Name</label>
									<input type="text" className="form-control" placeholder="Jane Doe" />
								</div>
								<div className="form-group mb-lg-4">
									<label>Email:</label>
									<input type="email" className="form-control" placeholder="yourmail@gmail.com" />
								</div>
								<div className="form-group mb-lg-4">
									<label>Password:</label>
									<input type="password" className="form-control" placeholder="Enter Password" />
								</div>
								<div className="form-group mb-lg-4">
									<label>Confirm Password:</label>
									<input type="password" className="form-control" placeholder="Re-Enter Password" />
								</div>
								<button type="submit" className="btn btn-primary btn-block mt-5 mb-1">Sign Up</button>
								<p className="forgot-password text-right">
									Already registered <a href="#">sign in?</a>
								</p>
							</form>
						</div>
					</div>
				</div>
			</main>
			</>
	)
};