import Vue from 'vue'
import VueRouter from 'vue-router'

import Landing from './views/Landing.vue'
import Login from './views/Login.vue'
import Employe from './views/Employe.vue'


const router  = new VueRouter ({
     routes: [
        {
            path: '/',
            name: 'landing',
            component: Landing
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/employe',
            name: 'employe',
            component: Employe
        },

    ]
})


export default  router;

