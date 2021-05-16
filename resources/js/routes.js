import Vue from 'vue'
import VueRouter from 'vue-router'

/* Web */
import Landing from './views/pages/Landing.vue'
import Login from './views/pages/Login.vue'
import Logout from './views/pages/Logout.vue'
import Register from './views/pages/Register.vue'
import Forgot from './views/pages/Forgot.vue'
import Recovery from './views/pages/Recovery.vue'


/* Not Found */

import NotFound from './views/404.vue'
/* Dashboard */
import Dashboard from './views/Dashboard.vue'

/* Users */

import Employe from './views/Employe.vue'
import ListUser from './views/Users.vue'
import RegisterUser from './views/user/RegisterUser.vue'
import ShowUser from './views/user/ShowUser.vue'
import EditUser from './views/user/EditUser.vue'
import Userprofile from './views/Userprofile.vue'


/* Sales */

import Sale from './views/Sale.vue'
import CreateOrden from './views/sale/CreateOrden.vue'
import ShowOrden from './views/sale/ShowOrden.vue'
import EditOrden from './views/sale/EditOrden.vue'

Vue.use(VueRouter);

/* Client */
const router  = new VueRouter ({

    linkActiveClass: 'is-active',
    base: process.env.BASE_URL,
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
            path: '/forgot',
            name: 'forgot',
            component: Forgot
        },
        {
            path: '/recovery',
            name: 'recovery',
            component: Recovery
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            meta: { requiresAuth: true },
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
            name: 'employes',
            component: Employe,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/users',
            name: 'users',
            component: ListUser,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/users/registeruser',
            name: 'users.register',
            component: RegisterUser,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/users/showuser',
            name: 'users.show',
            component: ShowUser,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/users/edituser',
            name: 'users.edit',
            component: EditUser,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/sale',
            name: 'sale',
            component: Sale,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/sale/create',
            name: 'sale.create',
            component: CreateOrden,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/sale/showorden',
            name: 'sale.show',
            component: ShowOrden,
            meta: { requiresAuth: true },
        },
        {
            path: '/dashboard/sale/editorden',
            name: 'sale.edit',
            component: EditOrden,
            meta: { requiresAuth: true },
        },
        {
            path: '*',
            name: 'notfound',
            component: NotFound,

        },

        {
            path: '/dashboard/clients',
            name: 'passport-clients',
            component: require('./components/passport/Clients.vue').default,

        },
        {
            path: '/dashboard/clients/authorized',
            name: 'passport-authorized-clients',
            component: require('./components/passport/AuthorizedClients.vue').default,

        },
        {
            path: '/dashboard/clients/tokens',
            name: 'passport-personal-access-tokens',
            component: require('./components/passport/PersonalAccessTokens.vue').default,

        },

    ]
})

router.beforeEach((to, from, next)=> {
    const publicPages = ['/','/login','/register'];
    if (to.name !== 'login' && !publicPages.includes(to.path)) next({ name: 'login' })
    else next()
})


export default  router;

