import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

let routes = [
    {
        path:'/',
        component: require('./components/Home').default
    },
    {
        path:'/login',
        component: require('./components/Login').default
    },
    {
        path:'/logout',
        component: require('./components/Logout').default
    },
    {
        path:'/Task',
        component: require('./components/Task').default
    },
    {
        path:'/Task/create',
        component: require('./components/CreateTask').default
    },
    {
        path:'*',
        redirect:'/'
    }
];

export default new VueRouter({
    mode:'history',
    routes
});
