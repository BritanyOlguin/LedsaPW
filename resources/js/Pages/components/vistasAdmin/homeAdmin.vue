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
        <TabPanel header="Imagen Productos">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <EstructuraImgITI :Titulo="'Nombre de la imagen'" :loadDataUrl="'/CardProductos/bannerData'"
                :registerBannerUrl="'/CardProductos/registrarBanner'" :editBannerUrl="'/CardProductos/editarBanner'"
                :deleteBannerUrl="'/CardProductos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Imagen Bolsa de trabajo">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <EstructuraImgITI :Titulo="'Nombre de la imagen'" :loadDataUrl="'/CardBolsaTrabajo/bannerData'"
                :registerBannerUrl="'/CardBolsaTrabajo/registrarBanner'" :editBannerUrl="'/CardBolsaTrabajo/editarBanner'"
                :deleteBannerUrl="'/CardBolsaTrabajo/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>