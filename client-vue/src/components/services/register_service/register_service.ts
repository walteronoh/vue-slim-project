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

    const result = await response.json();

    if (response.status == 201) {
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

export default RegisterService;