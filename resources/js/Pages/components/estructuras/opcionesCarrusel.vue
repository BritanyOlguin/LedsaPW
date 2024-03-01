<template>
    <h5>Configuración carrusel</h5>
    <p>El tiempo para el pase automatico de las imagenes se configura en milisegundos</p>
    <p>Ejemplo: 5000 = 5 segundos / 10000 = 10 segundos</p>
    <div class="card flex flex-wrap justify-content-center gap-3">
        <div class="flex align-items-center">
            <label class="ml-2">Indicadores: </label><input type="checkbox" v-model="pagination">
        </div>
        <div class="flex align-items-center">
            <label class="ml-2">Automatico: </label><input type="checkbox" v-model="startAutoPlay">
        </div>
        <div class="tiempo-container flex align-items-center">
            <label class="ml-2">Tiempo en segundos: </label><input type="number" v-model="timeout">
        </div>
        <Button @click="guardarConfiguracion">Guardar Configuración</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pagination: false,
            startAutoPlay: false,
            timeout: 5000
        };
    },
    mounted() {
        this.cargarConfiguraciones();
    },
    methods: {
        cargarConfiguraciones() {
            axios.get('/api/configuraciones')
                .then(response => {
                    const configuraciones = response.data;
                    this.pagination = !!configuraciones.pagination; // Convierte a booleano verdadero/falso
                    this.startAutoPlay = !!configuraciones.startAutoPlay;
                    this.timeout = parseInt(configuraciones.timeout); // Asegura que el timeout sea numérico

                    console.log("Configuraciones cargadas:", configuraciones);
                })
                .catch(error => console.error("Error al cargar configuraciones:", error));
        },
        guardarConfiguracion() {
            const configuracion = {
                pagination: this.pagination,
                startAutoPlay: this.startAutoPlay,
                timeout: this.timeout
            };
            axios.post('/api/configuraciones', configuracion)
                .then(response => {
                    // Mostrar mensaje de éxito
                    this.$toast.add({
                        severity: "success",
                        summary: "Éxito",
                        detail: "Configuraciones guardadas correctamente",
                        life: 3000,
                    });
                    this.$emit('configuracion-guardada', configuracion);
                })
                .catch(error => {
                    console.error("Error al guardar configuraciones:", error);
                });
        },
    },
};
</script>

<style scoped>
.tiempo-container {
    flex-direction: row;
}

/* Estilos para pantallas móviles */
@media (max-width: 768px) {
    .tiempo-container {
        flex-direction: column;
    }

    .tiempo-container label {
        margin-bottom: 8px;
    }
}
</style>