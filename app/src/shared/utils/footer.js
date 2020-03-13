import React from "react";
import Image from "../../img/footer-logo.png";
import "../../pages/styles.css"
export const Footer = () => {
	return (
		<>
			<div className="">
			<footer className="page-footer font-small blue bg-primary">
				<div className="footer-copyright text-center py-3 ">
					<div className="d-flex justify-content-center">

						<p className="mr-3"><strong>OdysseyOfUltimate.com 2020</strong></p>
					<a href="/"><img id="footer-logo" src={Image} alt="footer logo"/> </a>
					</div>
				</div>
			</footer>
			</div>
		</>
	)
};

