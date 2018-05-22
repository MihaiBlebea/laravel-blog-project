
require('./bootstrap');

// Import Vue js
window.Vue = require('vue');

import { VueEditor } from 'vue2-editor';


// Init Vue js components
Vue.component('vue-editor', VueEditor);
Vue.component('vue-editor-wrapper', require('./components/VueEditorWrapper.vue'));
Vue.component('file-upload', require('./components/FileUpload.vue'));
Vue.component('vue-chart', require('./components/Chart.vue'));
Vue.component('textarea-counter', require('./components/TextareaCounter.vue'));


const app = new Vue({
    el: '#app'
});
