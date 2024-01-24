<script setup>
import { ref } from 'vue';
import AppMenuItem from './AppMenuItem.vue';

const model = ref([
    {
        label: 'Apartados que se pueden modificar',
        items: [
            { label: 'Home', icon: 'pi pi-fw pi-home', to: '/homeAdmin' },
            { label: 'Productos', icon: 'pi pi-fw pi-list', to: '/productosAdmin' },
            { label: 'Nosotros', icon: 'pi pi-fw pi-user', to: '/nosotrosAdmin' },
            { label: 'Aviso de privacidad', icon: 'pi pi-fw pi-file', to: '/avisoPrivacidadAdmin' },
        ]
    },
]);
</script>

<template>
    <ul class="layout-menu">
        <template v-for="(item, i) in model" :key="item">
            <app-menu-item v-if="!item.separator && $page.props.user.permissions.includes('leer registro')" :item="item" :index="i"></app-menu-item>
            <li v-if="item.separator" class="menu-separator"></li>
        </template>
    </ul>
</template>

<style lang="scss" scoped></style>
