import { createRouter, createWebHistory } from 'vue-router';
import HomeAdmin from '../Pages/components/vistasAdmin/homeAdmin.vue';
import ProductosAdmin from '../Pages/components/vistasAdmin/productosAdmin.vue';
import NosotrosAdmin from '../Pages/components/vistasAdmin/nosotrosAdmin.vue';
import AvisoPrivacidadAdmin from '../Pages/components/vistasAdmin/avisoPrivacidadAdmin.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/homeAdmin',
            name: 'home',
            component: HomeAdmin,
        },
        {
            path: '/productosAdmin',
            name: 'productos',
            component: ProductosAdmin,
        },
        {
            path: '/nosotrosAdmin',
            name: 'nosotros',
            component: NosotrosAdmin,
        },
        {
            path: '/avisoPrivacidadAdmin',
            name: 'avisoPrivacidad',
            component: AvisoPrivacidadAdmin,
        },
        {
            path: '/auth/login',
            name: 'login',
            component: () => import('../pages/auth/Login.vue')
        },
    ],
});

export default router;
