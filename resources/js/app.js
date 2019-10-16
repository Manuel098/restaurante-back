require('./bootstrap');

window.Vue = require('vue');

Vue.component('hola-component', require('./components/hola.vue').default);

//import vuetify
import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});
