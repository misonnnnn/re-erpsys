import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './components/App.vue';
import Nav from './components/Nav.vue';
import LoginForm from './components/LoginForm.vue';
import EmployeeDashboard from './components/pages/EmployeeDashboard.vue';
import UserProfile from './components/pages/Profile.vue';
import Modules from './components/pages/Modules.vue';
import Modal from './components/Modal/Modal.vue';
import Modules_addmenucategory from './components/Modal/Modules_addmenucategory.vue';
import Modules_addmodules from './components/Modal/Modules_addmodules.vue';
import mitt from 'mitt';

const routes = [
  {
    path: '/auth/login',
    component: LoginForm
  },
  {
    path: '/dashboard/employee-dashboard',
    component: EmployeeDashboard
  },
  {
    path: '/user-profile',
    component: UserProfile
  },
  {
    path: '/settings-and-setup/modules',
    component: Modules
  }
];

const pathArray = [];
routes.map(i=>{
  pathArray.push(i.path);
})

const router = createRouter({
  history: createWebHistory(),
  routes
});

const app = createApp({});

const emitter = mitt();
// Make the emitter available globally to all components
app.config.globalProperties.$emitter = emitter;

app.component('login-form', LoginForm);
app.component('nav-menu', Nav);
app.component('app', App);
app.component('employee-dashboard', EmployeeDashboard);
app.component('user-profile', UserProfile);
app.component('modules', Modules);
app.component('modal', Modal);
app.component('Modules_addmenucategory', Modules_addmenucategory);
app.component('Modules_addmodules', Modules_addmodules);

app.use(router);
app.mount('#app');
