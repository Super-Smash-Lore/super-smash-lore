import React from "react";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";

export const NavBar = () => {
	return (
		<>
			<Navbar sticky="top" bg="primary" variant="dark">
				<Navbar.Brand href="#home">Home</Navbar.Brand>
				<Nav className="container">
					<Nav.Link href="#home">About</Nav.Link>
					<Nav.Link href="#fighters">Fighters</Nav.Link>
					<Nav.Link href="#profile">Profile</Nav.Link>
					<Nav.Link href="#favorites">Favorites</Nav.Link>
					<Nav.Link href="#signIn">Sign In</Nav.Link>
					<Nav.Link href="#signUp">Sign Up</Nav.Link>
				</Nav>
			</Navbar>
		</>
	)
};