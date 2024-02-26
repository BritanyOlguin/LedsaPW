<script setup>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import EstructuraImgITI from '../estructuras/estructuraImgITI.vue';
import EstructuraTextos from '../estructuras/estructuraTextos.vue';
import estructuraT from '../estructuras/estructuraT.vue';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Imagen Principal de Nosotros">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <EstructuraImgITI :Titulo="'Titulo que llevara el apartado en la vista:'"
                :loadDataUrl="'/ImgNosotros/bannerData'" :registerBannerUrl="'/ImgNosotros/registrarBanner'"
                :editBannerUrl="'/ImgNosotros/editarBanner'" :deleteBannerUrl="'/ImgNosotros/eliminarBanner'" />
        </TabPanel>

        <TabPanel header="Historia">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <EstructuraTextos :Titulo="'Titulo en vista:'" :Subtitulo="'Contenido:'" :loadDataUrl="'/Historia/bannerData'"
                :registerBannerUrl="'/Historia/registrarBanner'" :editBannerUrl="'/Historia/editarBanner'"
                :deleteBannerUrl="'/Historia/eliminarBanner'" />
        </TabPanel>

        <TabPanel header="Misión">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <EstructuraTextos :Titulo="'Titulo en vista:'" :Subtitulo="'Contenido:'" :loadDataUrl="'/Mision/bannerData'"
                :registerBannerUrl="'/Mision/registrarBanner'" :editBannerUrl="'/Mision/editarBanner'"
                :deleteBannerUrl="'/Mision/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Visión">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <EstructuraTextos :Titulo="'Titulo en vista:'" :Subtitulo="'Contenido:'" :loadDataUrl="'/Vision/bannerData'"
                :registerBannerUrl="'/Vision/registrarBanner'" :editBannerUrl="'/Vision/editarBanner'"
                :deleteBannerUrl="'/Vision/eliminarBanner'" />
        </TabPanel>

        <TabPanel header="Valores">
            <TabView ref="tabview1" class="p-3">
                <TabPanel header="Valor">
                    <estructuraT :Titulo="'Valor:'" :loadDataUrl="'/Valores/bannerData'"
                        :registerBannerUrl="'/Valores/registrarBanner'" :editBannerUrl="'/Valores/editarBanner'"
                        :deleteBannerUrl="'/Valores/eliminarBanner'" />
                </TabPanel>
                <TabPanel header="Imagen valores">
                    <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento
                        del
                        registro</p>
                    <EstructuraImgITI :Titulo="'Titulo que llevara el apartado en la vista:'"
                        :loadDataUrl="'/ImgValores/bannerData'" :registerBannerUrl="'/ImgValores/registrarBanner'"
                        :editBannerUrl="'/ImgValores/editarBanner'" :deleteBannerUrl="'/ImgValores/eliminarBanner'" />
                </TabPanel>
            </TabView>
        </TabPanel>

        <!-- <TabPanel header="Adicional">
            <carruselEstructura :Titulo="'Titulo'" :Subtitulo="'Texto'" :loadDataUrl="'/nosotros/bannerData'" :registerBannerUrl="'/nosotros/registrarBanner'" :editBannerUrl="'/nosotros/editarBanner'" :deleteBannerUrl="'/nosotros/eliminarBanner'" />
        </TabPanel> -->
    </TabView>
</template>