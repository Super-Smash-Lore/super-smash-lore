import React from 'react';
import ReactDOM from 'react-dom'
import 'bootstrap/dist/css/bootstrap.css';
import "./index.css";
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";
import {FourOhFour} from "./pages/FourOhFour";
import {Home} from "./pages/Home";
import {SignUp} from "./pages/SignUp";
import {FighterInfo} from "./pages/FighterInfo";

const Routing = () => (
	<>
		<BrowserRouter>
			<Switch>

				<Route exact path="/sign-up" component={SignUp}/>
				<Route exact path="/" id="home" component={Home}/>
				<Route exact path="/fighter" component={FighterInfo}/>
				<Route component={FourOhFour}/>
			</Switch>
		</BrowserRouter>
	</>
);
ReactDOM.render(<Routing/>, document.querySelector('#root'));