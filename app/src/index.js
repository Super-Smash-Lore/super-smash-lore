import React from 'react';
import ReactDOM from 'react-dom'
import 'bootstrap/dist/css/bootstrap.css';
import "./index.css";
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";
import {FourOhFour} from "./pages/FourOhFour";
import {Home} from "./pages/Home";
import {SignUp} from "./pages/SignUp";
import {AboutUs} from "./pages/AboutUs";
import {FighterInfo} from "./pages/FighterInfo";
import {Favorites} from "./pages/Favorites";
import {FighterSelection} from "./pages/FighterSelection";
import {SignIn} from "./pages/SignIn";
import {FighterCard} from "./shared/utils/FighterCard";
import {NavBar} from "./shared/utils/NavBar";
import {ProfileSettings} from "./pages/ProfileSettings";

const Routing = () => (
	<>
		<BrowserRouter>
			<Switch>
				<Route exact path="./shared/NavBar" component={NavBar}/>
				<Route exact path="/sign-in" component={SignIn}/>
				<Route exact path="/profile" component={ProfileSettings}/>
				<Route exact path="/about-us" component={AboutUs} />
				<Route exact path="/favorites" component={Favorites} />
				<Route exact path="/sign-up" component={SignUp}/>
				<Route exact path="/" id="home" component={Home}/>
				<Route exact path="/fighter" component={FighterInfo}/>
				<Route exact path="/fighter-selection" component={FighterSelection}/>
				<Route exact path="./shared/FighterCard" component={FighterCard}/>
				<Route component={FourOhFour}/>
			</Switch>
		</BrowserRouter>
	</>
);
ReactDOM.render(<Routing/>, document.querySelector('#root'));