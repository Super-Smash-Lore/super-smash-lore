import React, {useEffect} from "react";
import {httpConfig} from "../shared/utils/http-config";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";

export const SignIn = () => {
		useEffect(() => {
		httpConfig.get("/apis/earl-grey")
	});
	return(
		<>
			<main>
				<div className="container pt-sm-5 mt-sm-5">
					<div className="row">
						<div className="col-4">
							<Card>
								<p>Insert images!</p>
							</Card>
						</div>
						<div className="col-4 text-center">
							<h2>Log In</h2>
							<Form action="">
								<div>
									<input type="text" className="userNameInput px-sm-5 m-sm-4" id="user" placeholder="Username" />
								</div>
								<div>
									<input type="password"  className="password px-sm-5 m-sm-4" id="password" placeholder="Password"/>
								</div>
								<Button variant="outline-primary" type="submit" className="p-sm-3 m-sm-4 float-left">Set Sail</Button>
								<p className="mx-sm-4 text-center float-left">Want to save your favorites? Sign up!</p>
								<Button variant="outline-primary" className="p-sm-3 m-sm-4 float-left" type="submit"><a href=""></a>Begin you Odyssey!</Button>
							</Form>
						</div>
						<div className="col-4">
							<Card>
								<p>Insert images!</p>
							</Card>
						</div>
					</div>
				</div>
			</main>
		</>
	)
};
