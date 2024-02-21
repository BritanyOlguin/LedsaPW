<script setup>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import ImgPrincipal from './ImgPrincipal.vue';
import HistoriaNosotros from './HistoriaNosotros.vue';
</script>

<template>
    <Navbar />
    <ImgPrincipal :controllerName="'/ImgNosotro'" />
    <HistoriaNosotros />
    <br>
    <Footer />
</template>