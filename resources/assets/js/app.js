
require('./bootstrap');

// Import Vue js
window.Vue = require('vue');

import { VueEditor } from 'vue2-editor';

// Init Vue js components
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('vue-editor', VueEditor);
Vue.component('vue-editor-wrapper', require('./components/VueEditorWrapper.vue'));


const app = new Vue({
    el: '#app'
});
