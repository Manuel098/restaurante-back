require('./bootstrap');

window.Vue = require('vue');

Vue.component('index-component', require('./components/App.vue').default);

//import vuetify
import Vue from 'vue';

import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

Vue.config.productionTip = false;

// Route information for Vue Router
import Router from './router';

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router: Router
}).$mount("#app");
