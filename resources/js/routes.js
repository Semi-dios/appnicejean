import Vue from 'vue'
import VueRouter from 'vue-router'

/* Web */
import Landing from './views/pages/Landing.vue'
import Login from './views/pages/Login.vue'
import Register from './views/pages/Register.vue'





/* Dashboard */
import Employe from './views/Employe.vue'
import Dashboard from './views/Dashboard.vue'
import Userprofile from './views/Userprofile.vue'
import Sale from './views/Sale.vue'


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
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/userprofile',
            name: 'userprofile',
            component: Userprofile,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/employe',
            name: 'employe',
            component: Employe,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/sale',
            name: 'sale',
            component: Sale,
            meta: { requiresAuth: true },
        },

    ]
})


export default  router;

