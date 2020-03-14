import React from "react"
import {NavBar} from "../shared/utils/NavBar";

export const FourOhFour = () => {
	return (
		<>
			<NavBar></NavBar>
			<h2 className="text-center mt-5">Error: 404</h2>
			<h3 className="text-center mt-5">Oh no! You've Lost your way!</h3>
		</>
	)
};