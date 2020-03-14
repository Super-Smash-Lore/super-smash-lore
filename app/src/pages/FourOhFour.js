import React from "react"
import {NavBar} from "../shared/utils/NavBar";
import Navi from "../img/Navi-Pixels.png"

export const FourOhFour = () => {
	return (
		<>
			<NavBar></NavBar>
			<h2 className="text-center mt-5">Error: 404</h2>
			<div className="text-center">
				<img src={Navi} alt="Navi"/>
			</div>
			<h3 className="text-center mt-5">Listen!</h3>
			<h3 className="text-center mt-5">?? No response. He's still asleep...</h3>
		</>
	)
};