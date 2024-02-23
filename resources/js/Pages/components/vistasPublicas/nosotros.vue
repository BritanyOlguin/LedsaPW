<script setup>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import ImgPrincipal from './ImgPrincipal.vue';
import HistoriaNosotros from './HistoriaNosotros.vue';
import MisionNosotros from './MisionNosotros.vue';
import VisionNosotros from './VisionNosotros.vue';

</script>

<template>
    <Navbar />
    <ImgPrincipal :controllerName="'/ImgNosotro'" />
    <HistoriaNosotros />
    <div class="mision-vision-container">
        <div class="mision">
            <MisionNosotros />
        </div>
        <VisionNosotros />
    </div>
    <Footer />
</template>


<style scoped>
.mision-vision-container {
    display: flex;
    justify-content: space-around;
    /* Separa los componentes */
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    max-width: 80%;
    text-align: center;
}

.mision {
    margin-right: 50px;
    /* Separa el componente de la visión */
    margin-bottom: 50px;
}

@media (max-width: 768px) {
    .mision-vision-container {
        flex-direction: column;
        /* Alinea los componentes en columna en dispositivos móviles */
        align-items: center;
        /* Centra los componentes */
        margin-bottom: 50px;
    }

    .mision {
        margin-right: 0;
        /* Elimina el margen derecho */
    }
}</style>