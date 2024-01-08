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
                    path: '/home',
                    name: 'home',
                    component: () => import('@/Pages/components/vistasAdmin/homeAdmin.vue'),
                },
                {
                    path: '/productos',
                    name: 'productos',
                    component: () => import('@/Pages/components/vistasAdmin/productosAdmin.vue')
                },
                {
                    path: '/nosotros',
                    name: 'nosotros',
                    component: () => import('@/Pages/components/vistasAdmin/nosotrosAdmin.vue')
                },
                {
                    path: '/avisoPrivacidad',
                    name: 'avisoPrivacidad',
                    component: () => import('@/Pages/components/vistasAdmin/avisoPrivacidadAdmin.vue'),
                }
            ]
        },
    ]
});


export default router;