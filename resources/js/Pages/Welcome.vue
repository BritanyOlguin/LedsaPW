<script setup>
import Navbar from './components/vistasPublicas/Navbar.vue';
import home from './components/vistasPublicas/home.vue';
import Footer from './components/vistasPublicas/Footer.vue';
import cardsHome from './components/vistasPublicas/cardsHome.vue';
</script>

<template>
    <Navbar />
    <div class="orange-stripe"></div>
    <home :controllerName="'/CarruselHome/bannerData'" />
    <div class="orange-stripe"></div>
    <br>
    <cardsHome />
    <br>
    <Footer />
</template>

<style>
.orange-stripe {
    background-color: #f07c34;
    height: 30px;
    width: 100%;
}
</style>
