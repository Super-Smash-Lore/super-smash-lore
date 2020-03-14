import React from 'react';
import ReactDOM from 'react-dom'
import 'bootstrap/dist/css/bootstrap.css';
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";
import {FourOhFour} from "./pages/FourOhFour";
import {Home} from "./pages/Home";
import {AboutUs} from "./pages/AboutUs";
import {Favorites} from "./pages/Favorites";
import {EmailValidation} from "./pages/EmailValidation";
import {ProfileSettings} from "./pages/ProfileSettings";

const Routing = () => (
	<>
		<BrowserRouter>
			<Switch>
				<Route exact path="/about-us" component={AboutUs}/>
				<Route exact path="/favorites" component={Favorites}/>
				<Route exact path="/email-validation" component={EmailValidation}/>
				<Route exact path="/profile-settings" component={ProfileSettings}/>
				<Route exact path="/" component={Home}/>
				<Route component={FourOhFour}/>
			</Switch>
		</BrowserRouter>
	</>
);
ReactDOM.render(<Routing/>, document.querySelector('#root'));