import router from './router'
require('./bootstrap');


window.Vue = require('vue');

Vue.component('app', require('./components/App.vue'))
Vue.component('nav-main', require('./components/NavMain.vue'))

const app = new Vue({
    router: router,
    el: '#app'
});
