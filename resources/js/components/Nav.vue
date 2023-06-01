<template>
    <div class="primary-background-1">
		<div class="container-fluid d-flex justify-content-between align-items-center shadow-sm py-2 text-light" style="height: 50px;">
			<span @click="dashboard" class="h-100">
				<img src="https://www.theblackcoders.com/test/erpsys/assets/images/company-logo/system_logo.png" alt="" class="h-100">
			</span>
			<div class="d-flex">
				<div class="d-flex">
					<i class="bi bi-search fs-5 mt-1"></i>
					<input type="text" class=" ms-2 shadow-none primary-color-2" placeholder="Search module..." autocomplete="off" style="background: transparent;border: 0;outline:none">
					<i class="bi bi-bell fs-5 mt-1"></i>
				</div>
				<div>
					<div class="rounded-circle overflow-hidden bg-secondary position-relative ms-2 border-solid-2" data-bs-toggle="dropdown" style="width: 40px;height: 40px;">
						<img src="https://www.theblackcoders.com/test/erpsys/assets/upload-files/profile-images/default.jpg" class="w-100" alt="">
					</div>
					<ul class="dropdown-menu" style="min-width: 230px;">
						<li class="px-3">
							<p class="p-0 m-0 fs-4 text-capitalize">{{ authName }}</p>
							<p class="p-0 m-0 fs_small text-muted">Web Developer</p>
						</li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#" @click="profile"><i class="bi bi-person primary-color-3"></i> My Profile</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-journals primary-color-3"></i> Taskboard</a></li>
						<li><a class="dropdown-item" href="#" @click="logout"><i class="bi bi-box-arrow-left primary-color-3"></i> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
    <!-- NAVIGATION MENU -->
    <div class="m-3 px-3">
      <div class="row rounded" style="border:dotted 1px #aaa">
          <div class="col-2" v-for="category in modulecategory" >
            <div class="dropdown position-relative">
              <a href="#" class="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="primary-color-2 p-2 text-start">
                  <i class="bi bi-archive me-1"></i>
                  <span class="text-capitalize"> {{ category.categoryname }}</span>
                </div>
              </a>
              <ul class="dropdown-menu position-absolute start-0" style="" v-if="category.module.length > 0">
                <li v-for="module in category.module">
                  <router-link :to="module.moduleurl" class="dropdown-item fs_small"><i class="bi bi-arrow-right"></i>  {{ module.modulename }}</router-link>
                </li>
              </ul>
              <ul class="dropdown-menu position-absolute start-0" style="" v-else>
                <li>
                  <span class="fs_small text-muted">No module for this category</span>
                </li>
              </ul>
            </div>
          </div>  
      </div>
    </div>
    <!-- BREAD CRUMBS -->
		<div class="container-fluid px-4">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#" class="text-decoration-none  text-uppercase" ><i class="bi bi-house"></i> home</a></li>
					<li class="breadcrumb-item text-uppercase primary-color-3" aria-current="page">library</li>
				</ol>
			</nav>
      <div class="w-100 primary-background-1 position-absolute top-0 start-0" style="z-index:-99;min-height: 350px !important;"></div>
		</div>
    </div>

</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      authenticated: false,
      authName: '',
      modulecategory : []
    };
  },
  created(){
      this.$emitter.on('updateModule',this.getModules);
  },
  mounted() {
    this.getFullName();
    this.getModules();
  },
  methods: {
    getFullName() {
      axios.get('/auth/getFullName')
        .then(response => {
            this.authName  = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    logout() {
      axios.get('/auth/logout')
        .then(response => {
          location.reload()
        })
        .catch(error => {
          console.error(error);
        });
    },
    getModules(){
        axios.get('/api/getmodulescategory')
        .then(response => {
          this.modulecategory = response.data;
        })
        .catch(error => {
            console.error(error);
        });
    },
   
    dashboard(){
      this.$router.push('/dashboard');
    },
    profile(){
      this.$router.push('/user-profile');
    },
  }
};
</script>

<style>
  .fs_small{
    font-size: 12px;
  }
  .breadcrumb-item::before{
	  color:#aaa !important;
  }
  /* Custom CSS for hover dropdown */
  .dropdown:hover .dropdown-menu {
    display: block;
  }

</style>