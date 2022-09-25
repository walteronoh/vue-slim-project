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

    if (response.status == 200) {
        return {
            isAuthorized: true,
            message: 'Login Successful'
        }
    }
    return {
        isAuthorized: false,
        message: response.body
    }
}

export default LoginService;