<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import estructuraHND from '../estructuras/estructuraHND.vue';
import estructuraN from '../estructuras/estructuraN.vue';
import carruselEstructura from '../estructuras/carruselEstructura.vue';

export default {
    components: {
        TabView,
        TabPanel,
        estructuraHND,
        estructuraN,
        carruselEstructura,
    }
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Imagen Principal de Contactanos">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <carruselEstructura :Titulo="'Titulo que llevara el apartado en la vista:'" :Subtitulo="'Correo empresarial que estara en la vista:'" :loadDataUrl="'/ImgContactos/bannerData'" :registerBannerUrl="'/ImgContactos/registrarBanner'"
                :editBannerUrl="'/ImgContactos/editarBanner'" :deleteBannerUrl="'/ImgContactos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Contactos">
            <estructuraHND :loadDataUrl="'/Contactos/bannerData'" :registerBannerUrl="'/Contactos/registrarBanner'" :editBannerUrl="'/Contactos/editarBanner'" :deleteBannerUrl="'/Contactos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Departamentos">
            <estructuraN :Titulo="'Nombre del departamento:'" :loadDataUrl="'/Departamentos/bannerData'" :registerBannerUrl="'/Departamentos/registrarBanner'" :editBannerUrl="'/Departamentos/editarBanner'" :deleteBannerUrl="'/Departamentos/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>