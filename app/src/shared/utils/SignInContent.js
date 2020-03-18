import React, {useEffect} from "react";
import Form from "react-bootstrap/Form";
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import Image2 from "../../img/homemade-2.jpg";



export const SignInContent = (props) => {
	const {
		status,
		values,
		errors,
		touched,
		dirty,
		isSubmitting,
		handleChange,
		handleBlur,
		handleSubmit,
		handleReset
	} = props;
	return (
		<>
			<body id="signInBody">
			<main>
				<div className="container pt-lg-5">
					<div className="row">
						<div className="col-lg-5 pt-lg-5">
							<Card>
								<img className="odysseyUltimate rounded" src={Image2} alt="odyssey"/>
							</Card>
						</div>
						<div id="signIn" className="col-lg-6 mx-lg-4 text-left">
							<h2 className="mb-5">Sign In</h2>
							<form onSubmit={handleSubmit}>
								{/*controlId must match what is passed to the initialValues prop*/}
								<div className="form-group my-4 text-left">
									<label>Enter Email:</label>
									<label htmlFor="profileEmail" className="text-white font-weight-bold">Email</label>
									<div className="input-group">
										<input
											className="form-control"
											id="profileEmail"
											type="email"
											value={values.profileEmail}
											placeholder="Enter email"
											onChange={handleChange}
											onBlur={handleBlur}
										/>
									</div>
									{
										errors.profileEmail && touched.profileEmail && (
											<div className="alert alert-danger">
												{errors.profileEmail}
											</div>
										)
									}
								</div>
								{/*control Id must match what is defined by the initialValues object*/}
								<div className="form-group my-5 text-left">
									<label>Enter Password:</label>
									<label htmlFor="profilePassword" className="text-white font-weight-bold">Password</label>
									<div className="input-group">
										<input
											id="profilePassword"
											className="form-control"
											type="password"
											placeholder="Password"
											value={values.profilePassword}
											onChange={handleChange}
											onBlur={handleBlur}
										/>
									</div>
									{errors.profilePassword && touched.profilePassword && (
										<div className="alert alert-danger">{errors.profilePassword}</div>
									)}
								</div>
								<div className="form-group">
									<button className="btn btn-primary btn-block my-4" type="submit">Sign In</button>
									<p className="forgot-password text-right m-4">
										New to Odyssey of Ultimate? <a href="/sign-up">Sign Up</a>
									</p>
								</div>
							</form>
							{status && (<div className={status.type}>{status.message}</div>)}
						</div>
					</div>
				</div>
			</main>
			</body>
		</>
	)
};