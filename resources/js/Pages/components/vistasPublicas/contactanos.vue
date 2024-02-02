<script>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import ImgContactos from './ImgContactos.vue';
import listaContactos from './listaContactos.vue';

export default {
    components: {
        Navbar,
        Footer,
        ImgContactos,
        listaContactos,
    },
}
</script>

<template>
    <Navbar />
    <ImgContactos />
    <listaContactos :controllerName="'/Contactos/bannerData'" />
    <Footer />
</template>

<style></style>