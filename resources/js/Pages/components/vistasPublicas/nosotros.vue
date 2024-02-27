<script setup>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import ImgPrincipal from './ImgPrincipal.vue';
import HistoriaNosotros from './HistoriaNosotros.vue';
import MisionNosotros from './MisionNosotros.vue';
import VisionNosotros from './VisionNosotros.vue';
import valoresNosotros from './valoresNosotros.vue';

</script>

<template>
    <Navbar />
    <ImgPrincipal :controllerName="'/ImgNosotro'" />
    <HistoriaNosotros />
    <MisionNosotros />
    <br>
    <br>
    <VisionNosotros />
    <br>
    <br>
    <valoresNosotros />
    <br>
    <br>
    <Footer />
</template>


<style scoped></style>