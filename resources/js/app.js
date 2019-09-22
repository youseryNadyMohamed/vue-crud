import {AlertSuccess} from "vform/src";

require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue'
import Main from './Main'
import router from './routes'
import { Form, HasError, AlertError } from 'vform'
window.Form=Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertSuccess.name, AlertSuccess);
const app = new Vue({
    el: '#app',
    router,
    render: h=>h(Main)
});
