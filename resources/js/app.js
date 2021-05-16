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
Vue.use(VueAxios, axios)

Vue.prototype.$isLoggin= false;
/* import store from './store'; */
require('./bootstrap');
import VeeValidate from 'vee-validate';

 import VueRouter from 'vue-router';
 Vue.use(VueRouter);
/*
import common from './common';

Vue.mixin(common); */


Vue.config.productionTip = false;
Vue.use(VeeValidate)

new Vue({
    router,
    render: h=>h(App),

}).$mount('#app');

