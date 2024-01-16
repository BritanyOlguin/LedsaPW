<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Galleria from 'primevue/galleria';

export default {
    components: {
        Galleria
    },
    props: {
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
    <div class="card">
        <Galleria v-if="isBannerLoaded" :value="banner" :responsiveOptions="responsiveOptions" :numVisible="5"
            :circular="true" containerStyle="max-width: 640px" :showItemNavigators="true" :showThumbnails="false">
            <template #item="slotProps">
                <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" style="width: 100%; display: block;" />
            </template>
            <template #thumbnail="slotProps">
                <img :src="slotProps.item.thumbnailImageSrc" :alt="slotProps.item.alt" style="display: block;" />
            </template>
        </Galleria>
    </div>
</template>
