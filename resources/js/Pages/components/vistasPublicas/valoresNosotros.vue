<template>
    <div class="cards-container">
        <div v-for="(datosCard, index) in banner" :key="index" class="card-wrapper">
            <div class="card-img">
                <img :src="'/storage/' + datosCard.imagen" alt="Imagen" />
            </div>
            <div class="card-content">
                <h2>{{ datosCard.nombre }}</h2>
                <ul>
                    <li v-for="text in texto" :key="text.id">{{ text.nombre }}</li>
                </ul>
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
            axios.post('/Valores/bannerData').then((response) => {
                this.texto = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        cargarBanner() {
            axios.post('/ImgVal').then((response) => {
                this.banner = response.data;
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.log(error);
            });
        },
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
}

.card-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
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
    left: -20px;
}

.card-content h2,
.card-content li {
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

.card-content li {
    font-size: 16px;
    font-family: 'Futura Std', sans-serif;
    margin-right: 20px;
}

.card-content ul {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    list-style-type: disc;
    padding-left: 20px;
}

@media (min-width: 425px) and (max-width: 911px) {
    .card-wrapper {
        flex-direction: column;
    }

    .card-img {
        width: 100%;
        height: 244px;
    }

    .card-img img {
        width: 100%;
        height: auto;
    }

    .card-content h2 {
        font-size: 22px;
    }

    .card-content {
        width: calc(100% - 80px);
        height: auto;
        max-width: none;
        position: relative;
        top: -20px;
        margin: 0 auto;
        left: 0;
    }
}

@media (max-width: 424px) {
    .card-wrapper {
        flex-direction: column;
    }

    .card-img, .card-img img {
        width: 100%;
        height: 244px;
    }

    .card-content h2 {
        font-size: 22px;
    }

    .card-content {
        width: calc(100% - 80px);
        height: auto;
        max-width: none;
        position: relative;
        top: -20px;
        margin: 0 auto;
        left: 0;
    }

    .card-content ul {
        grid-template-columns: 1fr;
    }
}</style>
