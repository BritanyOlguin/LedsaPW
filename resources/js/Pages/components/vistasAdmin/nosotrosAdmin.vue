<script setup>
import carruselEstructura from '../estructuras/carruselEstructura.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Nosotros">
            <carruselEstructura :Titulo="'Titulo'" :Subtitulo="'Texto'" :loadDataUrl="'/nosotros/bannerData'" :registerBannerUrl="'/nosotros/registrarBanner'" :editBannerUrl="'/nosotros/editarBanner'" :deleteBannerUrl="'/nosotros/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>