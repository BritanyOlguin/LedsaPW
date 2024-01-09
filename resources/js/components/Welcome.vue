<!-- Vista del Dashboard (Admin) -->

@<script setup>
import ApplicationLogo from '@/components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <h1>Administrador</h1>
        <!-- Ejemplo para permisos -->
        <!-- <button v-if="$page.props.user.permissions.includes('crear registro')">
            Crear registro
        </button>
        <button v-if="$page.props.user.permissions.includes('eliminar registro')">
            Eliminar registro
        </button> -->
    </div>
</template>

<style>
    button {
        background-color: green;
        color: white;
        padding: 20px;
        margin: 5px;
    }
</style>