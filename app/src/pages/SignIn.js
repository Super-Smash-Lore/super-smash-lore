import React, {useEffect} from "react";
import {httpConfig} from "../..shared/utils/http-config";


export const SignIn = () => {
	useEffect(() => {
		httpConfig.get("/apis/earl-grey")
	})
};