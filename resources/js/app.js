import { createApp } from 'vue/dist/vue.esm-bundler';
import Feedback from './Pages/Form/Feedback.vue';
import './bootstrap';
import './checkout/order';
import './header/navbar-collapse';
import './header/notification';

const app = createApp({});
app.component('receipt-feedback', Feedback);
app.mount('#app');
