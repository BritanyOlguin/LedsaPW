<script>
import EstructuraImgITI from '../estructuras/estructuraImgITI.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import opcionesCarrusel from '../estructuras/opcionesCarrusel.vue';

export default {
    components: {
        EstructuraImgITI,
        TabView,
        TabPanel,
        opcionesCarrusel,
    },
    methods: {
        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        }
    }
}
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Home">
            <opcionesCarrusel id="carruselPrincipal" @configuracion-guardada="updateCarouselSettings" />
            <EstructuraImgITI :Titulo="'Nombre de la imagen'" :loadDataUrl="'/home/bannerData'"
                :registerBannerUrl="'/home/registrarBanner'" :editBannerUrl="'/home/editarBanner'"
                :deleteBannerUrl="'/home/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>