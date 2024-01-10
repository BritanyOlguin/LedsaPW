<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import estructuraPdfNTIP from '../estructuras/estructuraPdfNTIP.vue';

export default {
    components: {
        TabView,
        TabPanel,
        estructuraPdfNTIP,
    }
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Productos">
            <estructuraPdfNTIP :Titulo="'Nombre:'" :Subtitulo="'Texto:'" :loadDataUrl="'/productos/bannerData'" :registerBannerUrl="'/productos/registrarBanner'" :editBannerUrl="'/productos/editarBanner'" :deleteBannerUrl="'/productos/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>