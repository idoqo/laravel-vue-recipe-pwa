require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

import App from './components/App'
import Home from "./components/Home";
import Recipe from './components/Recipe'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/recipes/:recipeId',
            name: 'recipe',
            component: Recipe
        }
    ]
});

const app = new Vue({
    el: '#app',
    components: {App},
    router
});
