<script setup>
import carruselEstructura from '../estructuras/carruselEstructura.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <carruselEstructura :Titulo="'Titulo'" :Subtitulo="'Link'" :loadDataUrl="'/home/bannerData'" :registerBannerUrl="'/home/registrarBanner'" :editBannerUrl="'/home/editarBanner'" :deleteBannerUrl="'/home/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>