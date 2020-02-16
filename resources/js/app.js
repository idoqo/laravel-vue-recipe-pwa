require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: ExampleComponent
        }
    ]
});

const app = new Vue({
    el: '#app',
    components: {ExampleComponent},
    router
});
