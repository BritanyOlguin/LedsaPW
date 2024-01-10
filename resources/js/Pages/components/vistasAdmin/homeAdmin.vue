<script setup>
import EstructuraImgITI from '../estructuras/estructuraImgITI.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Home">
            <EstructuraImgITI :Titulo="'Nombre de la imagen'" :loadDataUrl="'/home/bannerData'" :registerBannerUrl="'/home/registrarBanner'" :editBannerUrl="'/home/editarBanner'" :deleteBannerUrl="'/home/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>