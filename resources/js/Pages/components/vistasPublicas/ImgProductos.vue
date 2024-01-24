<script>
export default {
    mounted() {
        this.cargarBanner();
    },
    methods: {
        cargarBanner() {
            axios.post('/ImgProductos/bannerData').then((response) => {
                this.banner = response.data;
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    data() {
        return {
            banner: [],
            isBannerLoaded: false,
        };
    }
}
</script>

<template>
    <div class="orange-stripe"></div>
    <div class="contenedor">
        <div v-for="datosCard in banner" class="contenedorImg">
            <img class="img" :src="'/storage/' + datosCard.imagen" alt="" />
        </div>
        <div class="text" v-for="datosCard in banner">
            {{ datosCard.nombre }}
        </div>
    </div>
    <div class="orange-stripe"></div>
</template>

<style scoped>
.orange-stripe {
    background-color: #f07c34;
    height: 30px;
    width: 100%;
}

.contenedor {
    width: 100%;
    height: 400px;
    overflow: hidden;
    position: relative;
}

.contenedorImg {
    width: 100%;
    height: 400px;
    position: relative;
}

.contenedorImg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: black;
    opacity: 0.5;
    z-index: 1;
}

.text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 70px;
    color: white;
    font-weight: bold;
    text-shadow: 2px 2px 4px #000000;
    z-index: 2;
}

.img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@media (max-width: 800px) {

    .contenedor,
    .contenedorImg {
        height: 200px;
    }

    .text {
        font-size: 30px;
    }
}
</style>
