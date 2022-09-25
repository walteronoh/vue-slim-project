interface ApiServiceTypes {
    body: Record<string, string>,
    method: ApiServiceMethods,
    url_route: string
}

type ApiServiceMethods = "POST" | "GET";

// Login Service
interface LoginServiceTypes {
    phonenumber: string,
    password: string
}

// Register Service
interface RegisterServiceTypes {
    firstname: string,
    lastname: string,
    phonenumber: string,
    password: string
}

export type { ApiServiceTypes, ApiServiceMethods, LoginServiceTypes, RegisterServiceTypes }