import ApiService from "../api_service";
import { RegisterServiceTypes } from "../api_service_types";

const RegisterService = async (args: RegisterServiceTypes) => {
    const body = {
        firstname: args.firstname,
        lastname: args.lastname,
        phonenumber: args.phonenumber,
        password: args.password
    }
    const response = await ApiService({
        url_route: "/register",
        method: "POST",
        body: body,
    });

    if (response.status == 200) {
        return {
            isAuthorized: true,
            message: 'Registration Successful'
        }
    }
    return {
        isAuthorized: false,
        message: response.body
    }
}

export default RegisterService;