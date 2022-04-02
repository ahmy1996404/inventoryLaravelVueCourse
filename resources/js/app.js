/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
//router import
import {routes} from './routes'

const router = new VueRouter({
    routes,
    mode:'history'
})
// import user class
import User from './Helpers/User'
window.User = User


// import notification class
import Notifcation from "./Helpers/Notifcation";
window.Notifcation = Notifcation;

// import sweet alert
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
window.Toast = Toast;


const app = new Vue({
    el: '#app',
    router
});
