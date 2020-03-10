import React, {useEffect} from "react";
import {httpConfig} from "../shared/utils/http-config";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import smash from "../img/smash-pic-1.PNG";
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
							<Card className="border-right border-bottom-0 border-left-0 border-top-0 mr-5 pr-5 border-dark rounded-0">
								<Card.Img src={smash}/>
								<p id="sign-up-text">Sign up today and start saving some of your favorite characters!</p>
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
						{/*<div className="col-4">*/}
						{/*	<Card>*/}
						{/*		<p>Insert images!</p>*/}
						{/*	</Card>*/}
						{/*</div>*/}
					</div>
				</div>
			</main>
		</>
	)
};