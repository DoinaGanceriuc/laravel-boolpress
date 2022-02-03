/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/* SETUP VUE-ROUTER */
//import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

/* DEFINIZIONE PAGINE COMPONENTI */

const Home = Vue.component('Home', require('./pages/Home.vue').default);
const Posts = Vue.component('Posts', require('./pages/Posts.vue').default);
const Post = Vue.component('Post', require('./pages/Post.vue').default);
const Page404 = Vue.component('Page404', require('./pages/Page404.vue').default);

/* DEFINIZIONE ROTTE */

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/posts',
        name: 'posts',
        component: Posts,
    },
    {
        path: '/posts/:id',
        name: 'post',
        component: Post,
    },
    {
        path: '*',
        component: Page404
    }


]

/* CREAZIONE VUE ROUTER */


const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('App', require('./App.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts-list-component', require('./components/PostsListComponent.vue').default);
Vue.component('post-component', require('./components/PostComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
});
