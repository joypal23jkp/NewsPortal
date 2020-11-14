
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-header-component', require('./components/AdminHeader.vue').default);



const app = new Vue({
    el: '#app',
});
