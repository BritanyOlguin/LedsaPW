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
            axios.post('/Mis').then((response) => {
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
@import url('https://fonts.cdnfonts.com/css/futura-std-4');
@import url('https://db.onlinewebfonts.com/c/e8d88139fe7f412e3a34d99df3552869?family=ITC+Handel+Gothic+Arabic+Bold');

.titulo {
    font-size: 40px;
    color: black;
    font-family: "ITC Handel Gothic Arabic Bold";
    margin-bottom: 25px;
    display: inline-block;
    border-bottom: 5px solid #f07c34;
    padding-bottom: 5px;
    text-transform: uppercase;
}

.contenido {
    font-size: 17px;
    line-height: 1.8;
    color: #333;
    font-family: 'Futura Std', sans-serif;
    font-style: normal;
}

/* Estilos para dispositivos móviles */
@media (max-width: 768px) {
    .texto-wrapper {
        text-align: center;
    }

    .titulo,
    .contenido {
        display: block;
    }
}
</style>
