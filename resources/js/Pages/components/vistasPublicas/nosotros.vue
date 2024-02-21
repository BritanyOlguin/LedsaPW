<script setup>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import ImgPrincipal from './ImgPrincipal.vue';
</script>

<template>
    <Navbar />
    <ImgPrincipal :controllerName="'/ImgNosotro'" />
    
    <br>
    <Footer />
</template>