/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
window.Vue = Vue;
import App from './App.vue';
import router from './routes';
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

//Vue.prototype.$isLoggin= false;
 import store from './store/index';
require('./bootstrap');
import VeeValidate from 'vee-validate';

 import VueRouter from 'vue-router';
 Vue.use(VueRouter);
/*
import common from './common';

Vue.mixin(common); */
axios.defaults.withCredentials = true;
axios.defaults.baseUrl = 'http://localhost:3000/#/'

axios.interceptors.response.use(undefined, function(error){
    if(error){
        const originalRequest = error.config;
        if(error.response.status === 401  && !originalRequest._retry) {
            originalRequest._retry = true;
            store.dispatch("LogOut")
            return router.push("/")
        }
    }
})




Vue.config.productionTip = false;
Vue.use(VeeValidate)

new Vue({
    store,
    router,
    render: h=>h(App),

}).$mount('#app');

