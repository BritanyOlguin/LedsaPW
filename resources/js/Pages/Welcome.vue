<script setup>
import Navbar from './components/vistasPublicas/Navbar.vue';
import home from './components/vistasPublicas/home.vue';
</script>

<template>
    <Navbar />
    <home :controllerName="'/CarruselHome/bannerData'" />
</template>