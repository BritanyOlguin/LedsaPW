import { createRouter, createWebHashHistory } from 'vue-router';
import HomeAdmin from '../Pages/components/vistasAdmin/homeAdmin.vue';
import ProductosAdmin from '../Pages/components/vistasAdmin/productosAdmin.vue';
import NosotrosAdmin from '../Pages/components/vistasAdmin/nosotrosAdmin.vue';
import AvisoPrivacidadAdmin from '../Pages/components/vistasAdmin/avisoPrivacidadAdmin.vue';

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/homeAdmin',
            name: 'homeAdmin',
            component: HomeAdmin,
        },
        {
            path: '/productosAdmin',
            name: 'productosAdmin',
            component: ProductosAdmin,
        },
        {
            path: '/nosotrosAdmin',
            name: 'nosotrosAdmin',
            component: NosotrosAdmin,
        },
        {
            path: '/avisoPrivacidadAdmin',
            name: 'avisoPrivacidadAdmin',
            component: AvisoPrivacidadAdmin,
        },
    ],
});

export default router;
