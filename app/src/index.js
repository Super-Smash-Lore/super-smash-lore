 import React from 'react';
import ReactDOM from 'react-dom'
import 'bootstrap/dist/css/bootstrap.css';
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";
import {FourOhFour} from "./pages/FourOhFour";
import {Home} from "./pages/Home";
import {SignIn} from "./pages/SignIn";
import {NavBar} from "./shared/utils/NavBar";
import {FighterSelection} from "./pages/FighterSelection";
import {FighterCard} from "./shared/utils/FighterCard";


 const Routing = () => (
	<>
		<BrowserRouter>
			<Switch>
				<Route exact path="/" component={Home}/>
				<Route exact path="/sign-in" component={SignIn}/>
				<Route exact path="./shared/NavBar" component={NavBar}/>
				<Route exact path="/fighter-selection" component={FighterSelection}/>
				<Route exact path="./shared/FighterCard" component={FighterCard}/>
				<Route component={FourOhFour}/>
			</Switch>
		</BrowserRouter>
	</>
);
ReactDOM.render(<Routing/>, document.querySelector('#root'));