import React from "react";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import  "../../index.css";
import Image from "../../img/OoD-Logo-v2.png";


export const NavBar = () => {
	return (
		<>
			<Navbar sticky="top" bg="dark" variant="dark" collapseOnSelect expand="lg">
				<Navbar.Brand href="/"><img id="Logo-2" className="ml-5" src={Image} alt="nav-logo"/></Navbar.Brand>
				<Navbar.Toggle aria-controls="responsive-navbar-nav" />
				<Navbar.Collapse id="responsive-navbar-nav">
					<div className="navbar-collapse flex-row-reverse" id="navbarNavAltMarkup">
						<Nav.Link className="nav-link nav-item active" href="/about-us">About</Nav.Link>
						<Nav.Link className="nav-link nav-item active" href="/fighter-selection">Fighters</Nav.Link>
						<Nav.Link className="nav-link nav-item active" href="/profile">Profile</Nav.Link>
						<Nav.Link className="nav-link nav-item active" href="/favorites">Favorites</Nav.Link>
						<Nav.Link className="nav-link nav-item active" href="/sign-in">Sign-In</Nav.Link>
						<Nav.Link className="nav-link nav-item active" href="/sign-up">Sign-Up</Nav.Link>
					</div>
				</Navbar.Collapse>
			</Navbar>
		</>
	)
};