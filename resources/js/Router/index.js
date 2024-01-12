import { createRouter, createWebHashHistory } from 'vue-router';
import AppLayout from '@/Layouts/AppLayout.vue';

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            component: AppLayout,
            children: [
                {
                    path: '/',
                    name: 'dashboard',
                    component: () => import('@/Pages/Dashboard.vue')
                },
                {
                    path: '/homeAdmin',
                    name: 'homeAdmin',
                    component: () => import('@/Pages/components/vistasAdmin/homeAdmin.vue'),
                },
                {
                    path: '/productosAdmin',
                    name: 'productosAdmin',
                    component: () => import('@/Pages/components/vistasAdmin/productosAdmin.vue')
                },
                {
                    path: '/nosotrosAdmin',
                    name: 'nosotrosAdmin',
                    component: () => import('@/Pages/components/vistasAdmin/nosotrosAdmin.vue')
                },
                {
                    path: '/avisoPrivacidadAdmin',
                    name: 'avisoPrivacidadAdmin',
                    component: () => import('@/Pages/components/vistasAdmin/avisoPrivacidadAdmin.vue'),
                }
            ]
        },
    ]
});


export default router;