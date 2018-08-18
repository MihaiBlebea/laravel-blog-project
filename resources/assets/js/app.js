
require('./bootstrap')

// Import Vue js
window.Vue = require('vue')

// import VueMasonry from 'vue-masonry-css'

import Multiselect from 'vue-multiselect'

// Init Vue js components
Vue.component('vue-chart', require('./components/Chart.vue'))

Vue.component('image-modal', require('./components/ImageUpload/ImageModal.vue'))
Vue.component('image-upload', require('./components/ImageUpload/ImageUpload.vue'))
Vue.component('image-card', require('./components/ImageUpload/ImageCard.vue'))
Vue.component('image-grid', require('./components/ImageUpload/ImageGrid.vue'))
Vue.component('image-details', require('./components/ImageUpload/ImageDetails.vue'))

Vue.component('markdown-editor', require('./components/MarkdownEditor/Editor.vue'))

Vue.component('vue-schedule', require('./components/Schedule/VueSchedule.vue'))

Vue.component('vue-calendar', require('./components/Schedule/VueCalendar.vue'))

Vue.component('vue-modal', require('./components/Schedule/VueModal.vue'))

Vue.component('v-multiselect', Multiselect)

Vue.component('search-box', require('./components/SearchBox/SearchBox.vue'))

// Setup global variables
Vue.prototype.api = '/api/v1/'


const app = new Vue({
    el: '#app'
});
