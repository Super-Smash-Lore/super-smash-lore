import React from "react";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import Image from "../../img/kirby.jpg";


export const NavBar = () => {
	return (
		<>
			<Navbar sticky="top" bg="primary" variant="dark">
				<Navbar.Brand href="Home"><img className="ml-5" src={Image} alt="kirb"/></Navbar.Brand>
				<Nav className="mr-auto container active">
					<Nav.Link href="about">About</Nav.Link>
					<Nav.Link href="#fighters">Fighters</Nav.Link>
					<Nav.Link href="#profile">Profile</Nav.Link>
					<Nav.Link href="#favorites">Favorites</Nav.Link>
					<Nav.Link href="SignIn.js">Sign In</Nav.Link>
					<Nav.Link href="#signUp">Sign Up</Nav.Link>
				</Nav>
			</Navbar>
		</>
	)
};