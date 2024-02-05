<script setup>
import estructuraPdf from '../estructuras/estructuraPdf.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Aviso de Privacidad">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del
                registro</p>
            <estructuraPdf :loadDataUrl="'/avisoPrivacidad/bannerData'"
                :registerBannerUrl="'/avisoPrivacidad/registrarBanner'" :editBannerUrl="'/avisoPrivacidad/editarBanner'"
                :deleteBannerUrl="'/avisoPrivacidad/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>