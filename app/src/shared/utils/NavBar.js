import React from "react";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import  "../../pages/styles.css"
import Image from "../../img/OoD-Logo-v2.png";


export const NavBar = () => {
	return (
		<>
			<Navbar sticky="top" bg="dark" variant="dark">
				<Navbar.Brand href="/"><img id="Logo" className="ml-5" src={Image} alt="kirb"/></Navbar.Brand>
				<Nav className="mr-auto container active">
					<Nav.Link href="about">About</Nav.Link>
					<Nav.Link href="/fighter">Fighters</Nav.Link>
					<Nav.Link href="#profile">Profile</Nav.Link>
					<Nav.Link href="#favorites">Favorites</Nav.Link>
					<Nav.Link href="/sign-in">Sign In</Nav.Link>
					<Nav.Link href="#signUp">Sign Up</Nav.Link>
				</Nav>
			</Navbar>
		</>
	)
};