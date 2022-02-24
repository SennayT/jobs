/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import { extend } from 'vee-validate'
import { required, email } from 'vee-validate/dist/rules'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(Vuetify)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('job-form',require('./components/JobForm.vue').default);
Vue.component('editor',require('./components/editor.vue').default);
Vue.component('application-form',require('./components/ApplicationForm').default);
Vue.component('job-card',require('./components/JobCard').default);
Vue.component('delete-dialog',require('./components/DeleteDialog').default);

/**
 * Vee-validate form validation rules
 */

extend('positive', value => {
    if (value >= 0) {
        return true
    }

    return 'The field must be a positive number. field name is {_field_}'
})

extend('required', {
    ...required,
    message: '{_field_} is required'
})

extend('email', {
    ...email,
    message: 'email must be valid'
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify : new Vuetify()
});
