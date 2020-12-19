require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('post-create-component', require('./components/PostCreateComponent.vue').default);

const app = new Vue({
  el: '#app',
});