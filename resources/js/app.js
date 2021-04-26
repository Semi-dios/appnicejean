/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
window.Vue = Vue;
import App from './App.vue';
import router from './routes';
import store from './store';
require('./bootstrap');
import VeeValidate from 'vee-validate';

 import VueRouter from 'vue-router';
 Vue.use(VueRouter);


Vue.config.productionTip = false;
Vue.use(VeeValidate)

new Vue({
    router,
    store,
    created() {
        const userInfo = localStorage.getItem('user')
        if(userInfo) {
            const userData = JSON.parse(userInfo)
            this.$store.commit('setUserData',userData)
        }

        axios.interceptors.response.use (
            response =>response,
            error => {
                if(error.response.status === 401){
                    this.$store.dispatch('logout')
                }
                return Promise.reject(error)
            }
        )
    },
    render: h=>h(App),

}).$mount('#app');

