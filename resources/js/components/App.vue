<template>
  <div class="w-100">
    <!-- Your application content here -->
    <nav-menu v-if="authenticated"  ></nav-menu>
    <div class="position-relative">
      <router-view></router-view>
    </div>
  </div>
  <!-- Button trigger modal -->
  
</template>


<style>
/* Your component styles here */
</style>


<script>
  import Nav from './Nav.vue';
  import LoginForm from './LoginForm.vue';
  import axios from 'axios';
  export default {
    components: {
      Nav,
      LoginForm,
    },
    data(){
      return {
        authenticated: false,
      }
    },
    mounted(){
      this.checkAuthStatus()
    },
    methods:{
      checkAuthStatus(){
        axios.get('/auth/status')
        .then(response=>{
          this.authenticated = response.data.authenticated;
        })
        .catch(error => {
          console.log(error);
        });
      },
      
    }
  }
</script>