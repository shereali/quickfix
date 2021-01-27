/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../../bootstrap');

window.Vue = require('vue');
import master from '../../../../components/backend/customer-support/layouts/Master.vue'
import router from '../../../routes/backend/customer-support/router'
import store from '../../../store/backend/store-customer-support'
import Permissions from '../../../../components/backend/customer-support/auth/Permission.vue'
import moment from 'moment'
import VModal from 'vue-js-modal'
import Toasted from 'vue-toasted';
import VuejsDialog from 'vuejs-dialog';
import VuejsDialogMixin from 'vuejs-dialog/dist/vuejs-dialog-mixin.min.js'; // only needed in custom components

Vue.mixin(Permissions)
// include the default style
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
Vue.use(VModal)
Vue.use(Toasted)
Vue.use(VuejsDialog)
Vue.use(VuejsDialogMixin)

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
Vue.component('v-select', vSelect)


// Excell
import JsonExcel from "vue-json-excel";
Vue.component("downloadExcel", JsonExcel);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('Navbar', require('../../../../components/backend/customer-support/layouts/Navbar.vue').default);
Vue.component('PageHeader', require('../../../../components/backend/customer-support/layouts/PageHeader').default);
Vue.component('TableContent', require('../../../../components/backend/customer-support/layouts/TableContent').default);
Vue.component('FormButton', require('../../../../components/backend/customer-support/layouts/FormButton').default);
Vue.component('Sidebar', require('../../../../components/backend/customer-support/layouts/Sidebar').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,moment,store,
    created() {
        const userInfo = localStorage.getItem("user");
        if (userInfo) {
            const userData = JSON.parse(userInfo);
            this.$store.commit("setUserData", userData);
        }
        axios.interceptors.response.use(
            response => response,
            error => {
                if (error.response.status === 401) {
                    this.$store.dispatch('singOut')
                }
                return Promise.reject(error)
            }
        )
    },
    render: h => h(master)
}).$mount('#app_customer_support');