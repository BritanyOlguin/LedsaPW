<script>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import ImgContactos from './ImgContactos.vue';
import listaContactos from './listaContactos.vue';
import Ubicacion from './Ubicacion.vue';

export default {
    components: {
        Navbar,
        Footer,
        ImgContactos,
        listaContactos,
        Ubicacion
    },
}
</script>

<template>
    <Navbar />
    <ImgContactos />
    <listaContactos :controllerName="'/Contactos/bannerData'" />
    <div style="background-color: white;">
        <Ubicacion />
    </div>
    <Footer />
</template>

<style scoped></style>