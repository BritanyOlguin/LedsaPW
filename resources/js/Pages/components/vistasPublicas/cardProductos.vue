<script>
export default {
    props: {
        controllerName: String,
        redirectUrl: String
    },
    mounted() {
        this.cargarBanner();
    },
    methods: {
        cargarBanner() {
            axios.post(this.controllerName).then((response) => {
                this.banner = response.data;
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.log(error);
            });
        },
        redirectToPage() {
            window.location.href = this.redirectUrl;
        }
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
    <div class="align-items-center justify-content-center">
        <Card class="responsive-card" @click="redirectToPage" :style="{ cursor: 'pointer' }">
            <template #header>
                <div v-for="datosCard in banner">
                    <img :src="'/storage/' + datosCard.imagen" alt="" />
                </div>
            </template>
            <template #title>
                <div v-for="datosCard in banner">
                    {{ datosCard.nombre }}
                </div>
            </template>
        </Card>
    </div>
</template>

<style scoped>
.responsive-card {
    width: 25em;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
}

@media (max-width: 368px) {
    .responsive-card {
        width: 18em;
    }
}
</style>
