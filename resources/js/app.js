require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

Vue.component('comment-component', require('./components/CommentComponent.vue').default);
Vue.component('post-create-component', require('./components/PostCreateComponent.vue').default);
Vue.component('post-update-component', require('./components/PostUpdateComponent.vue').default);
Vue.component('notification-component', require('./components/NotificationComponent.vue').default);

const app = new Vue({
  el: '#app',
});