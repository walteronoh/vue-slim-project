import { ApiServiceTypes } from "./api_service_types";

const ApiService = (args: ApiServiceTypes) => {
    const url = "http://localhost:8000" + args.url_route
    return fetch(url, {
        method: args.method,
        body: JSON.stringify(args.body),
        headers: {
            "Content-Type": "Application/Json",
        }
    })
}

export default ApiService;
