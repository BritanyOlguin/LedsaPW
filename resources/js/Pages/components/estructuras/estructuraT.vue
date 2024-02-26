<script>
export default {
    props: {
        loadDataUrl: {
            type: String,
            required: true
        },
        registerBannerUrl: {
            type: String,
            required: true
        },
        editBannerUrl: {
            type: String,
            required: true
        },
        deleteBannerUrl: {
            type: String,
            required: true
        },
        Titulo: {
            type: String,
            required: true
        },
    },
    computed: {
        filteredBanner() {
            if (!this.searchQuery) {
                return this.departamento;
            }
            return this.departamento.filter(item =>
                item.nombre.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },
        dialogStyle() {
            if (window.innerWidth <= 500) {
                return { width: '100vw', height: '100vh' };
            }
            return { width: '25vw' };
        }
    },
    mounted() {
        this.cargarBanner();
        window.addEventListener('resize', this.handleResize);
        this.handleResize();
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.handleResize);
    },
    methods: {
        handleResize() {
            this.$forceUpdate();
        },
        cargarBanner() {
            axios.post(this.loadDataUrl).then((response) => {
                this.departamento = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },

        registrarBanner() {
            this.submitted = true;
            //validar si hay campos vacios
            if (this.nombre == null) {
                // si alguno de los campos esta vacio, no enviar el formulario y mostrar un mensaje de error
                this.$toast.add({
                    severity: "error",
                    summary: "Error",
                    detail: "Todos los campos son obligatorios",
                    life: 3000,
                });
                //cerrar el dialogo
                return false;
            }

            this.isLoading = true;

            const formData = new FormData();
            formData.append('nombre', this.nombre);

            axios.post(this.registerBannerUrl,
                formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                this.cargarBanner();
                this.nombre = null;
                this.dialogTable = false;
                this.$toast.add({
                    severity: "success",
                    summary: "Exito",
                    detail: "Registro exitoso",
                    life: 3000,
                });
                this.isLoading = false;
            }).catch((error) => {
                console.log(error);
                this.isLoading = false;
            });
        },
        editarBanner() {
            this.submitted = true;
            //validar si hay campos vacios
            if (this.datosArreglo.nombre == null || this.datosArreglo.nombre == '') {
                // si alguno de los campos esta vacio, no enviar el formulario y mostrar un mensaje de error
                this.$toast.add({
                    severity: "error",
                    summary: "Error",
                    detail: "Todos los campos son obligatorios",
                    life: 3000,
                });
                //cerrar el dialogo
                return false;
            }
            this.isLoading = true;

            const formData = new FormData();
            formData.append('id', this.datosArreglo.id);
            formData.append('nombre', this.datosArreglo.nombre);

            axios.post(this.editBannerUrl,
                formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                this.cargarBanner();
                this.datosArreglo = {};
                this.editarDialog = false;
                this.$toast.add({
                    severity: "success",
                    summary: "Exito",
                    detail: "Edicion exitosa",
                    life: 3000,
                });
                this.isLoading = false;
            }).catch((error) => {
                console.log(error);
                this.isLoading = false;
            });

        },
        editarSelect(datosArreglo) {
            this.datosArreglo = { ...datosArreglo }; // esto es para que se muestre los datos del datosArregloo en el formulario
            this.editarDialog = true;
        },
        confirmarEliminar(datosArreglo) {
            this.datosArreglo = datosArreglo;
            this.eliminarDialog = true;
        },
        eliminarBanner() {
            const data = {
                id: this.datosArreglo.id,
            };


            axios.post(this.deleteBannerUrl, data).then((response) => {
                this.cargarBanner();
                this.eliminarDialog = false;
                this.datosArreglo = {};
                this.$toast.add({
                    severity: "success",
                    summary: "Exito",
                    detail: "Eliminacion exitosa",
                    life: 3000,
                });
            }).catch((error) => {
                console.log(error);
            });
        },
        openRegistro() {
            this.datosArreglo = {};
            this.submitted = false;
            this.dialogTable = true;
            this.nombre = null;
        }
    },
    data() {
        return {
            departamento: [],
            searchQuery: '',
            nombre: null,
            mensajeSinDatos: "No hay datos disponibles",
            dialogTable: false,
            editarDialog: false,
            eliminarDialog: false,
            isLoading: false,
        };
    },

};
</script>

<template>
    <Toolbar class="mb-4">
        <template #start>
            <Button label="Nuevo Registro" icon="pi pi-plus" class="p-button-success !mr-2" @click="openRegistro" />
        </template>
        <template #end>
            <span class="p-input-icon-right">
                <i class="pi pi-search" />
                <InputText v-model="searchQuery" placeholder="Search" />
            </span>
        </template>
    </Toolbar>

    <!-- Cartas en admin -->
    <div class="cards-container">
        <Card v-for="datosCard in filteredBanner" class="card">
            <template #title> {{ datosCard.nombre }} </template>
            <template #footer>
                <Button icon="pi pi-pencil" class="p-button p-button-warning !mr-6" @click="editarSelect(datosCard)" />
                <Button icon="pi pi-trash" class="p-button p-button-danger" @click="confirmarEliminar(datosCard)" />
            </template>
            <template #empty>
                <div class="flex justify-center align-middle text-xl">
                    <h2>No se encontraron datos</h2>
                </div>
            </template>
        </Card>

    </div>

    <Toast />
    <Dialog v-model:visible="dialogTable" :style="dialogStyle" header="Nuevo Registro" :modal="true" class="p-fluid">
        <div class="field">
            <form @submit.prevent="registrarBanner">
                <!-- select con opciones -->

                <div class="field col-12 md:col-12">
                    <label for="minmax">{{ this.Titulo }}</label>
                    <InputText inputId="minmax" v-model="nombre" :min="0" :max="10000" :showButtons="true" />
                </div>
                <Button type="submit" id="btnRegisrar" :disabled="isLoading"
                    class="flex items-center justify-center space-x-2 rounded-md border-2 border-blue-500 px-4 py-2 font-medium text-blue-600 transition hover:bg-blue-500 hover:text-white">
                    <span v-if="!isLoading"> Registrar </span>
                    <span v-else>
                        <i class="pi pi-spin pi-spinner"></i>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </Button>
            </form>
        </div>
    </Dialog>

    <Dialog v-model:visible="editarDialog" :style="dialogStyle" header="Nuevo Registro" :modal="true" class="p-fluid">
        <div class="field">
            <form @submit.prevent="editarBanner">
                <!-- select con opciones -->
                <InputText id="id" v-model.trim="datosArreglo.id" hidden />

                <div class="field col-12 md:col-12">
                    <label for="minmax">{{ this.Titulo }}</label>
                    <InputText inputId="minmax" v-model="datosArreglo.nombre" :min="0" :max="10000" :showButtons="true" />
                </div>

                <Button type="submit" id="btnRegisrar" :disabled="isLoading"
                    class="flex items-center justify-center space-x-2 rounded-md border-2 border-blue-500 px-4 py-2 font-medium text-blue-600 transition hover:bg-blue-500 hover:text-white">
                    <span v-if="!isLoading"> Registrar </span>
                    <span v-else>
                        <i class="pi pi-spin pi-spinner"></i>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </Button>
            </form>
        </div>
    </Dialog>
    <Dialog v-model:visible="eliminarDialog" :style="{ width: '450px' }" header="Confirmar" :modal="true">
        <div class="confirmation-content flex justify-center items-center">
            <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
            <span v-if="datosArreglo">¿Confirma eliminar el registro <b>{{ datosArreglo.nombre }}</b>?<br>¡Nota importante!
                Si deseas eliminar este departamento antes debes eliminar los contactos que lo utilizan o modificar el
                departamento, de lo contrario no te dejara eliminar el registro.</span>
        </div>
        <template #footer>
            <Button label="No" icon="pi pi-times" class="p-button-text" @click="eliminarDialog = false" />
            <Button label="Si" icon="pi pi-check" class="p-button-text" @click="eliminarBanner" />
        </template>
    </Dialog>
</template>

<style lang="scss" scoped>
.card-header {
    display: flex;
    justify-content: center;
    /* Centra la imagen horizontalmente */
    align-items: center;
    /* Centra la imagen verticalmente */
}

.imagen-resolucion {
    width: 90%;
    height: width;
}

.cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    /* Para dar un espacio uniforme entre los cards */
}

.card {

    /* Esto permite que cada card tome el espacio necesario y se expanda según el contenido */
    margin: 10px;
    /* Espacio alrededor de cada card */
    width: 30em;
    margin-bottom: 40px;
}
</style>