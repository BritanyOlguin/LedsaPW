<template>
    <div class="cards-container">
        <div v-for="(datosCard, index) in banner" :key="index" class="card-wrapper">
            <div class="card-img">
                <img :src="'/storage/' + datosCard.imagen" alt="Imagen" />
            </div>
            <div class="card-content" v-if="texto.length > index">
                <h2>
                    <!-- Utilizar el método dividirTitulo para procesar el título -->
                    <span>{{ dividirTitulo(texto[index].titulo).parte1 }}</span>
                    <br>
                    <span>{{ dividirTitulo(texto[index].titulo).parte2 }}</span>
                </h2>
                <p>{{ texto[index].contenido }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.cargarTexto();
        this.cargarBanner();
    },
    methods: {
        cargarTexto() {
            axios.post('/Vis').then((response) => {
                this.texto = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        cargarBanner() {
            axios.post('/ImgVis').then((response) => {
                this.banner = response.data;
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.log(error);
            });
        },
        dividirTitulo(titulo) {
            const division = titulo.split(' ');
            const parte1 = division.slice(0, 2).join(' ');
            const parte2 = division.slice(2).join(' ');

            return { parte1, parte2 };
        }
    },
    data() {
        return {
            texto: [],
            banner: [],
            isBannerLoaded: false,
        };
    }
};
</script>

<style scoped>
@import url('https://fonts.cdnfonts.com/css/futura-std-4');
@import url('https://db.onlinewebfonts.com/c/e8d88139fe7f412e3a34d99df3552869?family=ITC+Handel+Gothic+Arabic+Bold');

.cards-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 40px;
    width: 100%;
    /* Asegúrate de que el contenedor ocupe todo el ancho */
}

.card-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    /* Añadido para centrar las tarjetas */
    flex-direction: row-reverse;
    /* Cambia el orden de los elementos */
}

.card-img,
.card-content {
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.card-img {
    width: 481px;
    height: 481px;
    overflow: hidden;
}

.card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-content {
    min-width: 200px;
    max-width: 407px;
    background: white;
    padding: 20px;
    position: relative;
    right: -20px;
    /* Ajustado para mover el contenido hacia la derecha */
}

.card-content p {
    margin: 0;
    padding: 10px;
    text-align: justify;
}

.card-content h2 {
    font-size: 30px;
    font-family: "ITC Handel Gothic Arabic Bold", sans-serif;
    text-transform: uppercase;
    display: inline-block;
    border-bottom: 5px solid #f07c34;
    padding-bottom: 15px;
    margin-bottom: 10px;
}

.card-content p {
    font-size: 16px;
    font-family: 'Futura Std', sans-serif;
}

@media (max-width: 910px) {
    .card-wrapper {
        flex-direction: column;
    }

    .card-img {
        width: 100%;
        height: 244px;
    }

    .card-content h2 {
        font-size: 22px;
    }

    .card-content {
        width: calc(100% - 80px);
        /* Ancho ajustado */
        height: auto;
        /* Alto ajustado */
        max-width: none;
        position: relative;
        top: -20px;
        margin: 0 auto;
        /* Centrado horizontalmente */
        left: 0;
        /* Reset para evitar desplazamiento innecesario */
    }
}
</style>