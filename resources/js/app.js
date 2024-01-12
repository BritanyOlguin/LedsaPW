import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import router from './Router/index';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// Estilos PrimeVue
import PrimeVue from 'primevue/config';
import Button from 'primevue/button';
import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Toolbar from 'primevue/toolbar';
import Card from 'primevue/card';
import FileUpload from 'primevue/fileupload';
import Image from 'primevue/image';

// Importar estilos
import "./assets/styles.scss"
import './assets/layout/styles/theme/bootstrap4-light-blue/theme.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(router)
            .use(PrimeVue, {
                ripple: true,
                inputStyle: "outlined",
            })
            // Alertas emergentes de error, exito, etc
            .use(ToastService)
            .use(ZiggyVue)

            .component('Button', Button)
            .component('Toast', Toast)
            .component('Dialog', Dialog)
            .component('InputText', InputText)
            .component('Textarea', Textarea)
            .component('Toolbar', Toolbar)
            .component('Card', Card)
            .component('FileUpload', FileUpload)
            .component('Image', Image)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
