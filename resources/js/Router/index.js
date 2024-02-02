import { createRouter, createWebHashHistory } from 'vue-router';
import HomeAdmin from '../Pages/components/vistasAdmin/homeAdmin.vue';
import ProductosAdmin from '../Pages/components/vistasAdmin/productosAdmin.vue';
import NosotrosAdmin from '../Pages/components/vistasAdmin/nosotrosAdmin.vue';
import AvisoPrivacidadAdmin from '../Pages/components/vistasAdmin/avisoPrivacidadAdmin.vue';
import ContactanosAdmin from '../Pages/components/vistasAdmin/contactanosAdmin.vue';

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            children: [
                {
                    path: '/',
                    name: 'home',
                    component: HomeAdmin,
                },
                {
                    path: '/productos',
                    name: 'productos',
                    component: ProductosAdmin,
                },
                {
                    path: '/nosotros',
                    name: 'nosotros',
                    component: NosotrosAdmin,
                },
                {
                    path: '/avisoPrivacidad',
                    name: 'avisoPrivacidad',
                    component: AvisoPrivacidadAdmin,
                },
                {
                    path: '/contactanos',
                    name: 'contactanos',
                    component: ContactanosAdmin,
                },
                //jajajajajaj
            ],
        },
    ],
});

export default router;
