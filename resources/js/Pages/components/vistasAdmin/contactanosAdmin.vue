<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import estructuraHND from '../estructuras/estructuraHND.vue';
import estructuraN from '../estructuras/estructuraN.vue';

export default {
    components: {
        TabView,
        TabPanel,
        estructuraHND,
        estructuraN,
    }
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Contactos">
            <estructuraHND :loadDataUrl="'/Contactos/bannerData'" :registerBannerUrl="'/Contactos/registrarBanner'" :editBannerUrl="'/Contactos/editarBanner'" :deleteBannerUrl="'/Contactos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Departamentos">
            <estructuraN :Titulo="'Nombre del departamento:'" :loadDataUrl="'/Departamentos/bannerData'" :registerBannerUrl="'/Departamentos/registrarBanner'" :editBannerUrl="'/Departamentos/editarBanner'" :deleteBannerUrl="'/Departamentos/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>