<template>
    <div class="container">
        <h1>Register</h1>
        <main>
            <form>
                <label>First Name</label>
                <input v-model="firstname" class="input-field" type="text" placeholder="Enter your FirstName" />
                <label>Last Name</label>
                <input v-model="lastname" class="input-field" type="text" placeholder="Enter your LastName" />
                <label>Phone Number</label>
                <input v-model="phonenumber" class="input-field" type="text" placeholder="Enter your PhoneNumber" />
                <label>Password</label>
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
import router from '@/routes/routes';

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
                alert(response.message);
                router.push('/');
            } else {
                alert(response.message)
            }
        },
        RegisterService
    }
});
</script>

<style scoped>

</style>