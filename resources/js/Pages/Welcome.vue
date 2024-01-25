<script setup>
import Navbar from './components/vistasPublicas/Navbar.vue';
import home from './components/vistasPublicas/home.vue';
import Footer from './components/vistasPublicas/Footer.vue';
import cardProductos from './components/vistasPublicas/cardProductos.vue';
import CardBolsaTrabajo from './components/vistasPublicas/CardBolsaTrabajo.vue';
</script>

<template>
    <Navbar />
    <div class="orange-stripe"></div>
    <home :controllerName="'/CarruselHome/bannerData'" />
    <div class="orange-stripe"></div>
    <br>
    <div class="card-container">
        <cardProductos :controllerName="'/cardP'" :redirectUrl="'/productos'" />
        <CardBolsaTrabajo :controllerName="'/cardBT'" :redirectUrl="'https://ledsa-industrial.pandape.computrabajo.com/'" />
    </div>
    <br>
    <Footer />
</template>

<style>
.orange-stripe {
    background-color: #f07c34;
    height: 30px;
    width: 100%;
}

.card-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    /* Espacio entre los componentes */
    margin: 0 auto;
    /* Centra el contenedor */
    padding: 0 15px;
    /* Padding horizontal */
}

/* Estilos para pantallas pequeñas (móviles) */
@media (max-width: 468px) {
    .card-container {
        flex-direction: column;
        align-items: center;
    }
}</style>
