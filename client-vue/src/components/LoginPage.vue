<template>
    <div class="container">
        <h1>Login</h1>
        <main>
            <form>
                <input v-model="phonenumber" class="input-field" type="text" placeholder="Enter your phonenumber" />
                <input v-model="password" class="input-field" type="password" placeholder="Enter your password" />
                <input class="submit-btn" v-on:click="doLogin" type="button" value="LOGIN" />
                <p>Dont have an account? <a href="/register">Register</a></p>
            </form>
        </main>
    </div>
</template>

<script lang="ts">
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
// ss
            }
        }, LoginService
    }
});
</script>

<style scoped>

</style>