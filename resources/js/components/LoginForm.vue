<template>
    <video autoplay="" muted="" loop="" class="position-absolute vw-100 vh-100"  style="object-fit: cover;">
        <source src="https://www.theblackcoders.com/test/erpsys/assets/login-assets/video/erp-bg.webm" type="video/mp4">
    </video>
    <div class="vh-100 vw-100 bg-black d-flex justify-content-center align-items-center">
        <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
            <div class="position-relative" style="max-width:350px;">
                <div class="messageAlert"></div>
                <div class=" bg-white shadow rounded-2 overflow-hidden ">
                    <div class="d-flex px-3">
                        <img class="w-100" src="https://www.theblackcoders.com/test/erpsys/assets/images/blackbox-erp-logo.png" alt="">
                    </div>
                    <form  @submit.prevent="login" class="p-4 pt-0">
                        <div>
                            <label class="position-relative bg-white px-2" style="top:10px;left:5px;">Username</label>
                            <input type="text" class="form-control shadow-none text-center" v-model="username" placeholder="username">
                        </div>
                        <div>
                            <label class="position-relative bg-white px-2" style="top:10px;left:5px;">Password</label>
                            <input type="password" class="form-control shadow-none text-center" v-model="password" placeholder="password">
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-dark b1 text-light w-100 btnLogin"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useRouter } from 'vue-router';
import axios from 'axios';
// Set the X-XSRF-TOKEN header
axios.defaults.headers.common['X-XSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

export default {
  data() {
    return {
      username: '',
      password: ''
    };
  },
  methods: {
    login() {
        axios.post('/auth/authRequest', {
            username: this.username,
            password: this.password
        })
        .then(response => {
            console.log(response.data)
            if(response.data.isSuccess === true){
                // this.$router.push('/dashboard');
                location.reload()
            }
        })
        .catch(error => {

        });
    }
  }
};
</script>