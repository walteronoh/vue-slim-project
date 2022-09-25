<template>
    <div class="container">
        <h1>Login</h1>
        <main>
            <form>
                <label>Phone Number</label>
                <input v-model="phonenumber" class="input-field" type="text" placeholder="Enter your phonenumber" />
                <label>Password</label>
                <input v-model="password" class="input-field" type="password" placeholder="Enter your password" />
                <input class="submit-btn" v-on:click="doLogin" type="button" value="LOGIN" />
                <p>Dont have an account? <a href="/register">Register</a></p>
            </form>
        </main>
    </div>
</template>

<script lang="ts">
import router from '@/routes/routes';
import { defineComponent } from 'vue';
import LoginService from '../components/services/login_service/login_service';

export default defineComponent({
    name: 'LoginPage',
    data() {
        return {
            phonenumber: "",
            password: ""
        }
    },
    methods: {
        doLogin: async function () {
            const response = await LoginService({ phonenumber: this.phonenumber, password: this.password });
            if (response.isAuthorized) {
                alert(response.message);
                router.push("/dashboard");
            } else {
                alert(response.message)
            }
        }, LoginService
    }
});
</script>

<style scoped>

</style>