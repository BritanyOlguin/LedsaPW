<script>

import axios from 'axios';

export default {

    data() {
        return {
            direccion: 'Camino viejo, Calle del Carmen SN, La Piedad, 76146 Qro.',
            datos: [],
            showMapModal: false,
        };
    },
    methods: {
        openInNewTab(url) {
            window.open(url, '_blank');
        },
        openMapModal() {
            this.showMapModal = true;
        },
        closeMapModal() {
            this.showMapModal = false;
        },
    },
}
</script>

<template>
    <div class="container">
        <!-- Div para la información y los botones -->
        <div class="contact-and-buttons">
            <div>
                <p>
                    <span class="block">
                        <strong>
                            <i class="pi pi-map-marker"></i>
                            Dirección:
                        </strong>
                        {{ direccion }}
                    </span>
                </p>
            </div>

            <!-- Botón para abrir el modal -->
            <button @click="openMapModal" class="btn-flotante items-center">
                <span>Ver Google Maps</span>
                <i class="et-map"></i>
            </button>
        </div>
    </div>

    <!-- Modal como un pop-up -->
    <div v-if="showMapModal" class="popup-modal">
        <div class="popup-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #fff; text-align: left; font-size: 25px;">Ubicación de la empresa
                </h4>
            </div>
            <div class="modal-body">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3735.369670292526!2d-100.2703784200769!3d20.5729557569138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d343a321b07821%3A0x3d3a77de5065dc50!2sLedsa%20Industrial!5e0!3m2!1ses!2smx!4v1708013124767!5m2!1ses!2smx"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" @click="closeMapModal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    @click="openInNewTab('https://maps.app.goo.gl/nVSdtAuZDHtF1dz46')">Ver
                    en Google Maps</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.contact-and-buttons {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
}

.btn-flotante {
    font-size: 16px;
    text-transform: uppercase;
    font-weight: bold;
    color: #ffffff;
    border-radius: 5px;
    letter-spacing: 2px;
    background-color: #f07c34;
    padding: 18px 30px;
    bottom: 40px;
    right: 40px;
    transition: all 300ms ease 0ms;
    box-shadow: 0px 8px 15px #08162fe6;
    z-index: 99;
    margin-bottom: 15px;
}

.btn-flotante:hover {
    background-color: grey;
    /* Color de fondo al pasar el cursor */
    box-shadow: 0px 15px 20px rgba(8, 22, 47, 0.9);
    transform: translateY(-7px);
}

.block {
    margin-bottom: 10px;
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    line-height: 1.5;
    color: #666;
    text-align: center;
}

.strong {
    font-weight: bolder;
    font-size: 16px;
    line-height: 1.5;
    box-sizing: border-box;
    text-align: center;
}

.popup-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    overflow-y: auto;
}

.popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 90%;
    overflow: auto;
    width: 95%;
    max-width: 1000px;
}

.close-popup {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

.modal-header {
    background: #f07c34;
    display: block;
    -webkit-box-align: start;
    -webkit-box-pack: justify;
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: 0.3rem;
    border-top-right-radius: 0.3rem;
    box-sizing: border-box;
}

.btn-default {
    font-size: 17px;
    line-height: 1.6;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
    border-width: 1px;
    padding: 6px 12px;
    border-radius: 7px;
}

.btn-primary {
    font-size: 17px;
    line-height: 1.6;
    color: #fff;
    background-color: #f07c34;
    border-color: #f07c34;
    border-width: 1px;
    padding: 6px 12px;
    border-radius: 7px;
    margin-top: 10px;
    margin-left: 20px;
}

@media (max-width: 1440px) {
    .popup-content {
        max-width: 90%;
        max-height: 100%;
    }

    .modal-header,
    .modal-footer {
        padding: 10px;
    }

    .btn-default,
    .btn-primary {
        font-size: 15px;
        padding: 5px 10px;
    }
}

@media (max-width: 425px) {
    .popup-content {
        max-width: 85%;
    }
}

@media (max-width: 425px) {
    .button-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Centra los botones en pantallas pequeñas */
        margin-top: 20px;
        /* Espacio entre la información y los botones */
    }

    .btn-flotante {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: bold;
        color: #ffffff;
        border-radius: 5px;
        letter-spacing: 2px;
        background-color: #f07c34;
        padding: 18px 30px;
        margin-bottom: 15px;
        transition: all 300ms ease 0ms;
        box-shadow: 0px 8px 15px #08162fe6;
        z-index: 99;
    }

    .btn-flotante:hover {
        background-color: grey;
        box-shadow: 0px 15px 20px rgba(8, 22, 47, 0.9);
        transform: translateY(-7px);
    }

    .block {
        margin-bottom: 10px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        font-size: 16px;
        -webkit-font-smoothing: antialiased;
        line-height: 1.5;
        color: #666;
    }

    .strong {
        font-weight: bolder;
        font-size: 16px;
        line-height: 1.5;
        box-sizing: border-box;
    }
}</style>