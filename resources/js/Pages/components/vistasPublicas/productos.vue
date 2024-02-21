<script>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import { ref } from 'vue';
import DataView from 'primevue/dataview';
import DataViewLayoutOptions from 'primevue/dataviewlayoutoptions';
import ImgPrincipal from './ImgPrincipal.vue';

export default {
    components: {
    Navbar,
    Footer,
    DataView,
    DataViewLayoutOptions,
    ImgPrincipal
},
    setup() {
        const products = ref([]);
        const layout = ref('grid');

        const cargarBanner = async () => {
            try {
                const response = await axios.post('/Productos/bannerData');
                products.value = response.data;
            } catch (error) {
                console.log(error);
            }
        };
        cargarBanner();
        return { products, layout };
    },
    methods: {
        openPDFModal(pdf, name) {
            this.currentPDF = '/storage/pdfs/' + pdf;
            this.currentPDFName = name;
            this.showPDFModal = true;
        },
        closePDFModal() {
            this.showPDFModal = false;
        },
    },
    data() {
        return {
            showPDFModal: false,
        }
    },
}
</script>

<template>
    <Navbar />
    <div v-if="showPDFModal" class="pdf-modal">
        <div class="pdf-container">
            <button @click="closePDFModal" class="close-x">&#10005;</button>
            <div class="pdf-header" :style="{ backgroundColor: '#f07c34' }">
                {{ currentPDFName }}
            </div>
            <embed :src="currentPDF" type="application/pdf" width="100%" height="500px">
            <div class="pdf-buttons">
                <button @click="closePDFModal" class="close-button">Cerrar</button>
                <a :href="currentPDF" download :download="currentPDFName" class="download-button">
                    Descargar
                </a>
            </div>
        </div>
    </div>

    <ImgPrincipal :controllerName="'/ImgProduct'" />

    <DataView v-if="products.length > 0" :value="products" :layout="layout">
        <template #header>
            <div class="flex justify-content-end">
                <DataViewLayoutOptions v-model="layout" />
            </div>
        </template>

        <template #list="{ items }" class="list-section">
            <div class="grid grid-nogutter">
                <div v-for="item in items" :key="item.id" @click="openPDFModal(item.pdf, item.nombre)" class="col-12">
                    <div class="flex flex-column xl:flex-row xl:align-items-start p-4 gap-4"
                        :class="{ 'border-top-1 surface-border': item.id !== 0 }">
                        <img class="w-9 sm:w-16rem xl:w-10rem shadow-2 block xl:block mx-auto border-round"
                            :src="'/storage/' + item.imagen" :alt="item.nombre" />
                        <div
                            class="flex flex-column sm:flex-row justify-content-between align-items-center xl:align-items-start flex-1 gap-4">
                            <div class="flex flex-column align-items-center sm:align-items-start gap-3">
                                <p class="text-2xl font-bold text-900">{{ item.nombre }}</p>
                                <p>{{ item.contenido }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <template #grid="{ items }" class="list-section">
            <div class="grid grid-nogutter">
                <div v-for="item in items" :key="item.id" @click="openPDFModal(item.pdf, item.nombre)"
                    class="col-12 sm:col-6 lg:col-12 xl:col-4 p-2">
                    <div class="card-container border-1 surface-border surface-card border-round">
                        <div class="flex flex-wrap align-items-center justify-content-between gap-2">
                            <div class="image-container">
                                <img class="product-image" :src="'/storage/' + item.imagen" :alt="item.nombre" />
                            </div>
                            <div class="content-container">
                                <p class="text-2xl font-bold">{{ item.nombre }}</p>
                                <p>{{ item.contenido }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

    </DataView>
    <br>
    <Footer />
</template>

<style scoped>
.pdf-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
}

.pdf-container {
    position: relative;
    width: 75%;
    height: 80%;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.close-x {
    position: absolute;
    top: 5px;
    right: 15px;
    background-color: transparent;
    border: none;
    font-size: 24px;
    color: white;
    cursor: pointer;
    transition: color 0.3s ease;
}

.close-x:hover {
    color: #ffffff;
}

.pdf-header {
    height: 40px;
    line-height: 40px;
    text-align: center;
    color: white;
    font-size: medium;
    font-weight: bold;
}

.pdf-buttons {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.close-button {
    background-color: grey;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.download-button {
    background-color: #f07c34;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
}

.list-section {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1rem;
}

.tittle {
    text-align: center;
    font-size: 40px;
    font-weight: bold;
    color: white;
    background-color: #f07c34;
    margin-top: 0px;
}

.card-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.image-container {
    width: 100%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.product-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    overflow: hidden;
}

.content-container {
    text-align: center;
    padding: 10px;
}

@media (max-width: 1030px) {

    .pdf-modal embed {
        display: none;
    }

    .pdf-container {
        height: auto;
        overflow: visible;
    }

    .image-container {
        height: 150px;
    }

    .p-dataview-layout-options {
        display: none;
    }
}</style>