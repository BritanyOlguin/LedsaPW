import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// Estilos PrimeVue
import PrimeVue from 'primevue/config';
import Button from 'primevue/button';
import Toast from 'primevue/toast';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Toolbar from 'primevue/toolbar';
import Card from 'primevue/card';
import FileUpload from 'primevue/fileupload';
import Image from 'primevue/image';

// Importar estilos
import 'primevue/resources/themes/lara-light-green/theme.css'
import 'primeflex/primeflex.css';
import 'primeicons/primeicons.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                ripple: true,
                inputStyle: "outlined",
            })
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
