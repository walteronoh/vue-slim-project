import ApiService from "../api_service";
import { LoginServiceTypes } from "../api_service_types";

const LoginService = async (args: LoginServiceTypes) => {
    const body = {
        phonenumber: args.phonenumber,
        password: args.password
    }
    const response = await ApiService({
        url_route: "/login",
        method: "POST",
        body: body,
    });

    const result = await response.json();

    if (response.status == 200) {
        console.log(result.body);
        // Store values in local storage
        localStorage.setItem('isAuthorized', 'Ok');
        localStorage.setItem('firstname', result.body[0].firstname);
        localStorage.setItem('lastname', result.body[0].firstname);
        localStorage.setItem('phonenumber', result.body[0].phonenumber);
        return {
            isAuthorized: true,
            message: result.message
        }
    }
    return {
        isAuthorized: false,
        message: result.message
    }
}

export default LoginService;