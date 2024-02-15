<script>
import DataTable from "primevue/datatable";
import InputText from "primevue/inputtext";
import Column from "primevue/column";
import Button from "primevue/button";
import Card from 'primevue/card';
import Dialog from 'primevue/dialog';
import FileUpload from 'primevue/fileupload';
import Paginator from 'primevue/paginator';
import axios from "axios";
import Toast from "primevue/toast";
import Carousel from "../estructuras/Carousel.vue";
import Slide from "../estructuras/Slide.vue";

export default {
    components: {
        DataTable,
        Column,
        InputText,
        Button,
        Card,
        Dialog,
        FileUpload,
        Toast,
        Paginator,
        Carousel,
        Slide,
    },
    props:{
        controllerName: String
    },
    mounted() {
        this.cargarBanner();
    },

    methods: {
        assignConsecutiveIDs() {
            this.banner.forEach((image, index) => {
                image.id = index + 1;
            });
        },

        updateCarouselSettings(settings) {
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        },

        cargarBanner() {
            axios.post(this.controllerName).then((response) => {
                this.banner = response.data;
                this.assignConsecutiveIDs();
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    data() {
        const id = 'carruselPrincipal'
        return {
            banner: [],
            isBannerLoaded: false,
            pagination: localStorage.getItem(id + 'pagination') === 'true' || false,
            startAutoPlay: localStorage.getItem(id + 'startAutoPlay') === 'true' || false,
            timeout: Number(localStorage.getItem(id + 'timeout')) || 5000
        };
    },
};
</script>

<template>
    <!-- Carrusel dinamico -->
    <Carousel v-if="isBannerLoaded" :pagination="pagination" :startAutoPlay="startAutoPlay"
        :timeout="timeout" :slides="banner" class="carousel" v-slot="{ currentSlide }">
        <Slide v-for="datosCard in banner" :key="datosCard">
            <div v-show="currentSlide === datosCard.id" class="slide-info">
                <img :src="'/storage/' + datosCard.imagen" alt="" />
            </div>
        </Slide>
    </Carousel>
</template>

<style>
.carousel {
    position: relative;
    max-height: 90vh;
    height: 90vh;

    img[src$=".svg"] {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    .slide-info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        max-height: 100%;
        height: 100%;

        img {
            width: 100%;
            height: 100%;
        }
    }

    @media (max-width: 399px) {
        height: 30vh;
    }

    @media (min-width: 400px) and (max-width: 499px) {
        height: 40vh;
    }

    @media (min-width: 500px) and (max-width: 699px) {
        height: 50vh;
    }

    @media (min-width: 700px) and (max-width: 899px) {
        height: 60vh;
    }

    @media (min-width: 900px) and (max-width: 999px) {
        height: 70vh;
    }

    @media (min-width: 1000px) {
        height: 100vh;
    }

}
</style>