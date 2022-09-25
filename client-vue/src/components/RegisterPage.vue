<template>
    <div class="container">
        <h1>Register</h1>
        <main>
            <form>
                <input v-model="firstname" class="input-field" type="text" placeholder="Enter your FirstName" />
                <input v-model="lastname" class="input-field" type="text" placeholder="Enter your LastName" />
                <input v-model="phonenumber" class="input-field" type="text" placeholder="Enter your PhoneNumber" />
                <input v-model="password" class="input-field" type="password" placeholder="Enter your Password" />
                <input class="submit-btn" v-on:click="doRegister" type="button" value="REGISTER" />
                <p>Already have an account? <a href="/">Login</a></p>
            </form>
        </main>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import RegisterService from './services/register_service/register_service';

export default defineComponent({
    name: 'RegisterPage',
    data() {
        return {
            firstname: "",
            lastname: "",
            phonenumber: "",
            password: "",
        }
    },
    methods: {
        doRegister: async function () {
            const response = await RegisterService({ firstname: this.firstname, lastname: this.firstname, phonenumber: this.phonenumber, password: this.password });
            if (response.isAuthorized) {
                // 
            }
        },
        RegisterService
    }
});
</script>

<style scoped>

</style>