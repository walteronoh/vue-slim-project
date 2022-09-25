<template>
    <div>
        <h3>Dashboard</h3>
        <h5>Hello {{firstname}}</h5>
        <em class="logout-btn" v-on:click="doLogout">Logout</em>
    </div>
</template>
  
<script lang="ts">
import router from '@/routes/routes';
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'DashboardPage',
    data() {
        return {
            firstname: "",
            lastname: "",
            phonenumber: ""
        }
    },
    methods: {
        getLocalStorageData: function () {
            this.firstname = localStorage.getItem("firstname") + '';
            this.lastname = localStorage.getItem("lastname") + '';
            this.phonenumber = localStorage.getItem("phonenumber") + '';
        },
        doLogout: function () {
            // Clear local Storage and redirect to login
            localStorage.clear();
            router.push("/");
        }
    },
    mounted() {
        this.getLocalStorageData();
    },
});
</script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
  