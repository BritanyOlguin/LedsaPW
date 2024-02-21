<script>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import listaContactos from './listaContactos.vue';
import Ubicacion from './Ubicacion.vue';
import ImgPrincipal from './ImgPrincipal.vue';

export default {
    components: {
    Navbar,
    Footer,
    listaContactos,
    Ubicacion,
    ImgPrincipal
},
}
</script>

<template>
    <Navbar />
    <ImgPrincipal :controllerName="'/ImgContact'" />
    <listaContactos :controllerName="'/Contactos/bannerData'" />
    <div style="background-color: white;">
        <Ubicacion />
    </div>
    <Footer />
</template>

<style scoped></style>