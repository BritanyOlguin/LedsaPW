<template>
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

    <footer class="footer">
        <div class="footer-left">
            <div class="footer-column">
                <p><span class="rights-symbol">&reg;</span> LEDSA Todos los Derechos Reservados</p>
            </div>
            <div class="footer-column links">
                <a href="/contactanos">Contactanos</a>
                <a @click="openPDFModal(pdfInfo)">Aviso de Privacidad</a>
            </div>
        </div>
        <div class="redes-sociales">
            <a href="https://mx.linkedin.com/company/ledsa-industrial" target="_blank" rel="noopener noreferrer"><i class="pi pi-linkedin icono"></i></a>
            <a href="https://www.instagram.com/rh_ledsa/" target="_blank" rel="noopener noreferrer"><i class="pi pi-instagram icono"></i></a>
            <a href="https://www.facebook.com/ledsaindustrial/" target="_blank" rel="noopener noreferrer"><i class="pi pi-facebook icono"></i></a>
        </div>

        <div class="footer-right">
            <p><span class="rights-symbol">&reg;</span> 2021 LEDSA INDUSTRIAL S.A DE C.V</p>
        </div>
    </footer>
</template>

<script>
export default {
    methods: {
        cargarAvisoPrivacidadPDF() {
            axios.post('/AvisoPrivacidad/bannerData').then((response) => {
                const pdfInfo = response.data[0];
                this.avisoPrivacidadPDF = pdfInfo;
            }).catch((error) => {
                console.error("Error cargando PDF:", error);
            });
        },
        openPDFModal() {
            if (this.avisoPrivacidadPDF) {
                this.currentPDF = '/storage/pdfs/' + this.avisoPrivacidadPDF.pdf;
                this.currentPDFName = this.avisoPrivacidadPDF.nombre;
                this.showPDFModal = true;
            } else {
                console.error("PDF no cargado");
            }
        },
        closePDFModal() {
            this.showPDFModal = false;
        }
    },
    mounted() {
        this.cargarAvisoPrivacidadPDF();
    },
    data() {
        return {
            showPDFModal: false,
            currentPDF: '',
            currentPDFName: '',
            avisoPrivacidadPDF: null,
        }
    }
};
</script>

<style scoped>
/* Estilos icono */
.icono {
    font-size: 2em;
    margin: 0 20px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.icono:hover {
    transform: scale(1.2);
}


/* Estilos R */
.rights-symbol {
    font-size: 1.7em;
    vertical-align: middle;
}

.footer {
    background-color: #f07c34;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-left {
    margin-left: 50px;
    display: flex;
}

.footer-column {
    margin-right: 40px;
}

.footer-column>p {
    margin-top: 0px;
    margin-bottom: 0px;
}

.footer-column.links a {
    display: block;
    /* Cada enlace en una línea separada */
    color: white;
    text-decoration: none;
    margin-bottom: 5px;
    /* Espacio entre los enlaces */
    cursor: pointer;
}

.footer-column.links a:hover {
    color: rgb(73, 73, 73);
}

.footer-right {
    text-align: right;
    margin-right: 50px;
}

/* Estilos responsivos para pantallas pequeñas */
@media (min-width: 572px) and (max-width: 1060px) {
    .redes-sociales .icono {
        margin-bottom: 20px;
    }

    .redes-sociales {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 328px) {
    .footer-right {
        text-align: center;
        margin-right: 0;
    }
}

@media (max-width: 468px) {

    .footer-left,
    .footer-right {
        margin: 10px 0;
    }

    .footer-column {
        margin-right: 0;
    }
}

/* Estilos responsivos para pantallas pequeñas */
@media (max-width: 568px) {
    .footer {
        flex-direction: column;
        text-align: center;
    }

    .footer-left,
    .footer-right {
        margin: 10px;
        flex: 1;
    }

    .footer-left {
        order: 2;
    }

    .footer-column,
    .footer-right p,
    .footer-column.links a {
        font-size: 14px;
        margin-left: 25px;
    }

    .footer-column {
        margin-right: 0;
    }

    .footer-column.links a {
        margin-bottom: 5px;
    }
}

@media (max-width: 468px) {
    .footer {
        flex-direction: column;
        text-align: center;
    }

    .footer-left,
    .footer-right {
        margin: 10px;
        flex: 1;
    }

    .footer-left {
        order: 2;
    }

    .footer-column,
    .footer-right p,
    .footer-column.links a {
        font-size: 14px;
        margin-left: 10px;
    }

    .footer-column {
        margin-right: 0;
    }

    .footer-column.links a {
        margin-bottom: 5px;
    }
}

/* Estilos PDF */
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
}
</style>
