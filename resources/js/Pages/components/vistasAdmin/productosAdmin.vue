<script>
import EstructuraImgITI from '../estructuras/estructuraImgITI.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import estructuraPdfNTIP from '../estructuras/estructuraPdfNTIP.vue';

export default {
    components: {
        TabView,
        TabPanel,
        estructuraPdfNTIP,
        EstructuraImgITI,
    }
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Imagen Principal de Productos">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <EstructuraImgITI :Titulo="'Titulo que llevara el apartado en la vista:'"
                :loadDataUrl="'/ImgProductos/bannerData'" :registerBannerUrl="'/ImgProductos/registrarBanner'"
                :editBannerUrl="'/ImgProductos/editarBanner'" :deleteBannerUrl="'/ImgProductos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Productos">
            <estructuraPdfNTIP :Titulo="'Nombre:'" :Subtitulo="'Texto:'" :loadDataUrl="'/productos/bannerData'"
                :registerBannerUrl="'/productos/registrarBanner'" :editBannerUrl="'/productos/editarBanner'"
                :deleteBannerUrl="'/productos/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>