<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Galleria from 'primevue/galleria';

export default {
    components: {
        Galleria
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
        cargarBanner() {
            axios.post('/CarruselHome/bannerData').then((response) => {
                this.banner = response.data.map(bannerItem => ({
                    itemImageSrc: '/storage/' + bannerItem.imagen,
                    thumbnailImageSrc: '/storage/' + bannerItem.imagen,
                    alt: bannerItem.nombre
                }));
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.error("Error al cargar el banner:", error);
            });
        },
    },
    data() {
        return {
            banner: null,
            isBannerLoaded: false,
            autoplayInterval: 6000, // Cambia a 6000 para que sean 6 segundos
            autoplay: true,
            responsiveOptions: [
                {
                    breakpoint: '991px',
                    numVisible: 4
                },
                {
                    breakpoint: '767px',
                    numVisible: 3
                },
                {
                    breakpoint: '575px',
                    numVisible: 1
                }
            ],
        };
    },
};
</script>

<template>
    <div class="full-width-card">
        <Galleria v-if="isBannerLoaded" :value="banner" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true" containerStyle="width: 100%;" :showItemNavigators="true"
            :showThumbnails="false">
            <template #item="slotProps">
                <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" class="carousel-image" />
            </template>
        </Galleria>
    </div>
</template>

<style>
.full-width-card {
    width: 100%;
}

.carousel-image {
    width: 100%;
    object-fit: cover;
    display: block;
}

.p-galleria .p-galleria-item-nav {
    color: #f07c34;
    background-color: rgba(0, 0, 0, 0.3);
    border-radius: 50%;
}

/* Estilos para pantallas grandes */
@media (min-width: 469px) {
    .full-width-card {
        height: 460px;
    }

    .carousel-image {
        height: 460px;
    }
}

/* Estilos para teléfonos móviles */
@media (max-width: 468px) {
    .full-width-card {
        height: 600%;
    }

    .carousel-image {
        height: 600%;
    }
}</style>