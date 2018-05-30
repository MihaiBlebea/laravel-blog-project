
require('./bootstrap');

// Import Vue js
window.Vue = require('vue');

import { VueEditor } from 'vue2-editor';
import VueMasonry from 'vue-masonry-css'


// Init Vue js components
Vue.component('vue-editor', VueEditor);
Vue.component('vue-editor-wrapper', require('./components/VueEditorWrapper.vue'));
Vue.component('vue-chart', require('./components/Chart.vue'));
Vue.component('textarea-counter', require('./components/TextareaCounter.vue'));

Vue.component('image-modal', require('./components/ImageUpload/ImageModal.vue'));
Vue.component('image-upload', require('./components/ImageUpload/ImageUpload.vue'));
Vue.component('image-card', require('./components/ImageUpload/ImageCard.vue'));
Vue.component('image-grid', require('./components/ImageUpload/ImageGrid.vue'));
Vue.component('image-details', require('./components/ImageUpload/ImageDetails.vue'));

Vue.component('masonry-wrapper', require('./components/MasonryWrapper.vue'));

Vue.component('vue-schedule', require('./components/Schedule/VueSchedule.vue'));

// Setup global variables
Vue.prototype.api = '/api/v1/';

// Link Vue with 'use' function
Vue.use(VueMasonry);


const app = new Vue({
    el: '#app'
});
