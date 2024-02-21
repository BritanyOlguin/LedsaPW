<template>
    <div class="texto-wrapper" v-for="text in texto" :key="text.id">
        <h2 class="titulo">{{ text.titulo }}</h2>
        <p class="contenido">{{ text.contenido }}</p>
    </div>
</template>

<script>

export default {
    mounted() {
        this.cargarTexto();
    },
    methods: {
        cargarTexto() {
            axios.post('/Histor').then((response) => {
                this.texto = response.data;
            }).catch((error) => {
                console.log(error);
            });
        }
    },
    data() {
        return {
            texto: []
        };
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Annapurna+SIL:wght@700&family=Yeseva+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Annapurna+SIL:wght@700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Yeseva+One&display=swap');

.texto-wrapper {
    margin-bottom: 20px;
    padding: 50px;
}

.titulo {
    font-size: 40px;
    font-weight: 400;
    color: black;
    font-family: "Yeseva One", serif;
    margin-bottom: 25px;
    display: inline-block; /* Ajusta el ancho al contenido */
    border-bottom: 5px solid #f07c34; /* Línea naranja debajo del texto */
    padding-bottom: 5px; /* Espacio entre el texto y la línea */
    text-transform: uppercase; /* Transforma el texto a mayúsculas */
}

.contenido {
    font-size: 17px;
    line-height: 1.8;
    color: #333;
    font-family: "Open Sans", sans-serif;
    font-weight: 600;
    font-style: normal;
}

/* Estilos para dispositivos móviles */
@media (max-width: 768px) {
    .texto-wrapper {
        text-align: center; /* Centra todo el texto */
    }

    .titulo, .contenido {
        display: block; /* Asegura que el texto ocupe todo el ancho disponible */
    }
}
</style>
