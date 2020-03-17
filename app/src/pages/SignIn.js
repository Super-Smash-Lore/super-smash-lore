import React, {useState} from 'react';
import {httpConfig} from "../shared/utils/http-config.js";
import {Formik} from "formik/dist/index";
import * as Yup from "yup";
import {SignInContent} from "../shared/utils/SignInContent";
import {Redirect} from "react-router";

export const SignIn = () => {

	// state variable to handle redirect to posts page on sign in
	const [toHome, setToHome] = useState(null);

	const  validator = Yup.object().shape({
		profileEmail: Yup.string()
			.email("email must be a valid email")
			.required('email is required'),
		profilePassword: Yup.string()
			.required("Password is required")
			.min(8, "Password must be at least eight characters")
	});

	//the initial values object defines what the request payload is.
	const signIn = {
		profileEmail: "",
		profilePassword: ""
	};

	const submitSignIn = (values, {resetForm, setStatus}) => {
		httpConfig.post("/apis/sign-in/", values)
			.then(reply => {
				let {message, type} = reply;
				if(reply.status === 200 && reply.headers["x-jwt-token"]) {
					window.localStorage.removeItem("jwt-token");
					window.localStorage.setItem("jwt-token", reply.headers["x-jwt-token"]);
					resetForm();
					setTimeout(() => {
						setToHome(true);
					}, 1500);
				}
				setStatus({message, type});
			});
	};

	return (
		<>
			{/* redirect user to posts page on sign in */}
			{toHome ? <Redirect to="/profile" /> : null}

			<Formik
				initialValues={signIn}
				onSubmit={submitSignIn}
				validationSchema={validator}
			>
				{SignInContent}
			</Formik>
		</>
	)
};