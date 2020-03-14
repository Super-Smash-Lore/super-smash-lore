import React, {useEffect} from "react";
import {httpConfig} from "../shared/utils/http-config";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import Image from "../img/Odyssey-Of-Ultimate-Banner.png";
import {NavBar} from "../shared/utils/NavBar";
import "./styles.css"
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";


export const SignIn = () => {
		useEffect(() => {
		httpConfig.get("/apis/earl-grey")
	});
	return(
		<body id="signInBody">
			<NavBar></NavBar>
			<main>
				<div className="container pt-lg-5">
					<div className="row">
						<div className="col-lg-5 pt-lg-5">
							<Card>
								<img className="odysseyUltimate " src={Image} alt="odyssey"/>
							</Card>
						</div>
						<div id="signIn" className="col-lg-6 mx-lg-4 text-center">
							<h2 className="mb-5">Sign In</h2>
							<Form>
								<div className="form-group my-4">
									<label className="float-left">UserName</label>
									<input type="email" className="form-control " placeholder="Enter email" />
								</div>
								<div className="form-group my-5">
									<label className="float-left">Password</label>
									<input type="password" className="form-control" placeholder="Enter password" />
								</div>
								<Button type="submit" className="btn btn-primary btn-block my-4">Sign In</Button>
								<p className="forgot-password text-right m-4">
									New to Odyssey of Ultimate? <a href="#">Sign Up</a>
								</p>
							</Form>
						</div>
					</div>
				</div>
			</main>
			<div id="footerWidth" className="position-static">
				<footer className="page-footer font-small bg-primary">
					<div className="text-center py-3">
						<div className="d-flex justify-content-center">
							<p className="mr-3"><strong>OdysseyOfUltimate.com 2020</strong></p>
						</div>
					</div>
				</footer>
			</div>
		</body>
	)
};
