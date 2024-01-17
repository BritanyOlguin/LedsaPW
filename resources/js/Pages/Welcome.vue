<script setup>
import Navbar from './components/vistasPublicas/Navbar.vue';
import home from './components/vistasPublicas/home.vue';
import Footer from './components/vistasPublicas/footer.vue';
</script>

<template>
    <Navbar />
    <div class="orange-stripe"></div>
    <home />
    <!-- <div class="orange-stripe"></div> -->
    <Footer />
</template>

<style>
.orange-stripe {
    background-color: #f07c34;
    height: 30px;
    width: 100%;
}</style>