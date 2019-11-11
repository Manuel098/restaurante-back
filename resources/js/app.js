require('./bootstrap');

window.Vue = require('vue');

Vue.component('index-component', require('./components/App.vue').default);

//import vuetify
import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});
