import React, {useEffect} from "react";
import {httpConfig} from "../shared/utils/http-config";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import Image from "../img/Odyssey-Of-Ultimate-Banner.png";
import {NavBar} from "../shared/utils/NavBar";
import "./styles.css"


export const SignIn = () => {
		useEffect(() => {
		httpConfig.get("/apis/earl-grey")
	});
	return(
		<>
			<NavBar></NavBar>
			<main>
				<div className="container pt-sm-5 mt-sm-5">
					<div className="row">
						<div className="col-6">
							<Card>
								<img className="odysseyUltimate" src={Image} alt="odyssey"/>
							</Card>
						</div>
						<div id="signIn" className="col-6 text-center">
							<h2 className="mb-sm-5">Sign In</h2>
							<Form>
								<div className="form-group my-sm-4">
									<label className="float-left">UserName</label>
									<input type="email" className="form-control " placeholder="Enter email" />
								</div>
								<div className="form-group my-sm-5">
									<label className="float-left">Password</label>
									<input type="password" className="form-control" placeholder="Enter password" />
								</div>
								<Button type="submit" className="btn btn-primary btn-block my-sm-4">Sign In</Button>
								<p className="forgot-password text-right m-sm-4">
									New to Odyssey of Ultimate? <a href="#">Sign Up</a>
								</p>
							</Form>
						</div>
					</div>
				</div>
			</main>
		</>
	)
};
