import { createWebHistory, createRouter } from "vue-router";

// import LoginPage from '../components/LoginPage.vue';
// import RegisterPage from '../components/RegisterPage.vue';
// import DashboardPage from '../components/RegisterPage.vue';

const routes = [
    {
        path: "/",
        name: "Login",
        component: () => import('../components/LoginPage.vue'),
    },
    {
        path: "/register",
        name: "Register",
        component: () => import('../components/RegisterPage.vue'),
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: () => import('../components/DashboardPage.vue'),
        meta: {
            requiresAuth: true
        }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (localStorage.getItem("usertoken")) {
            next();
        } else {
            next("/");
        }
    } else {
        next();
    }
})

export default router;