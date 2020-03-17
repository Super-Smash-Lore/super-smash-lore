import smash from "../../img/Playing-Switch.jpg"
import Card from "react-bootstrap/Card";
import React from "react";

export const SignUpContent = (props) => {
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
			<main>
				<div className="container pt-sm-5 mt-sm-5">
					<div className="row">
						<div className="col-lg-8">
							<Card id="sign-up-image">
								<Card.Img src={smash}/>
								<p id="sign-up-text">Start saving some of your favorite characters!</p>
							</Card>
						</div>
						<div className="col-lg-4 text-left">
							<h2>Sign Up</h2>
							<form onSubmit={handleSubmit}>
								{/*controlId must match what is passed to the initialValues prop*/}
								<div className="form-group mb-lg-4">
									<label htmlFor="profileUsername">Username:</label>
									<div className="input-group">
										<input
											className="form-control"
											id="profileUsername"
											type="text"
											value={values.profileUsername}
											placeholder="Your Username"
											onChange={handleChange}
											onBlur={handleBlur}
										/>
									</div>
									{
										errors.profileUsername && touched.profileUsername && (
											<div className="alert alert-danger">
												{errors.profileUsername}
											</div>
										)
									}
								</div>
								<div className="form-group mb-lg-4">
									<label htmlFor="profileEmail">Email:</label>
									<div className="input-group">
										<input
											className="form-control"
											id="profileEmail"
											type="email"
											value={values.profileEmail}
											placeholder="youremail@gmail.com"
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
								{/*controlId must match what is defined by the initialValues object*/}
								<div className="form-group mb-lg-4">
									<label htmlFor="profilePassword">Password:</label>
									<div className="input-group">
										<input
											id="profilePassword"
											className="form-control"
											type="password"
											placeholder="Enter Password"
											value={values.profilePassword}
											onChange={handleChange}
											onBlur={handleBlur}
										/>
									</div>
									{errors.profilePassword && touched.profilePassword && (
										<div className="alert alert-danger">{errors.profilePassword}</div>
									)}
								</div>

								<div className="form-group mb-lg-4">
									<label htmlFor="profilePasswordConfirm">Confirm Password:</label>
									<div className="input-group">
										<input
											className="form-control"
											type="password"
											id="profilePasswordConfirm"
											placeholder="Re-Enter Password"
											value={values.profilePasswordConfirm}
											onChange={handleChange}
											onBlur={handleBlur}
										/>
									</div>
									{errors.profilePasswordConfirm && touched.profilePasswordConfirm && (
										<div className="alert alert-danger">{errors.profilePasswordConfirm}</div>
									)}
								</div>
								<div className="form-group">
									<button className="btn btn-primary btn-block mt-5 mb-1" type="submit">Sign-Up!</button>
									<p className="forgot-password text-right">
										Already registered <a href="/sign-in">sign in?</a>
									</p>
								</div>
							</form>
						</div>
						{console.log(
							status
						)}
						{
							status && <div className={status.type}>{status.message}</div>
						}
					</div>
				</div>
			</main>
		</>
	)
};