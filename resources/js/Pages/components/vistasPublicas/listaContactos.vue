<script>
export default {
    mounted() {
        this.cargarContactos();
    },
    props: {
        controllerName: String
    },
    methods: {
        cargarContactos() {
            axios.post(this.controllerName).then((response) => {
                this.contactos = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    computed: {
        contactosPorDepartamento() {
            const grupos = {};
            this.contactos.forEach(contacto => {
                const depto = contacto.departamento.nombre.toUpperCase();
                if (!grupos[depto]) {
                    grupos[depto] = [];
                }
                grupos[depto].push(contacto);
            });
            return grupos;
        }
    },
    data() {
        return {
            contactos: [],
        };
    }
}
</script>


<template>
    <div class="departamentos-container">
        <div class="departamento" v-for="(grupo, departamento) in contactosPorDepartamento" :key="departamento">
            <h3 style="font-size: 1.9em; font-weight: bold;">{{ departamento }}</h3>
            <div v-if="grupo.length > 0" class="contacto-info">
                <i class="pi pi-envelope icono"></i>
                <p style="font-size: 1.2em; font-weight: bold;" >{{ grupo[0].departamento.link }}</p>
            </div>
            <div v-for="contacto in grupo" :key="contacto.id" class="contacto">
                <p class="titulo">{{ contacto.titulo }}</p>
                <div class="contacto-info">
                    <i class="pi pi-phone icono"></i>
                    <p>{{ contacto.contenido }}</p>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>
.departamentos-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    text-align: center;
    background: #fff;
}

.departamento {
    margin: 10px;
    padding: 20px;
    box-sizing: border-box;
}

.contacto-info {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 5px 0;
}

.icono {
    margin-right: 8px;
}

.contacto {
    margin: 20px 0;
}

.contacto p {
    margin: 0;
    color: black;
    font-size: 1.3em;
}

.contacto p.titulo {
    color: grey;
    font-size: 1.4em;
}

/* Estilos para pantallas muy pequeñas (1 columna) */
@media (max-width: 548px) {
    .departamento {
        flex-basis: 100%;
    }
}

/* Estilos para pantallas pequeñas (2 columnas) */
@media (min-width: 549px) and (max-width: 800px) {
    .departamento {
        flex-basis: calc(50% - 20px);
    }
}

/* Estilos para pantallas medianas (3 columnas) */
@media (min-width: 801px) and (max-width: 1999px) {
    .departamento {
        flex-basis: calc(33.333% - 20px);
    }
}

/* Estilos para pantallas grandes (4 columnas) */
@media (min-width: 2000px) {
    .departamento {
        flex-basis: calc(25% - 20px);
    }
}
</style>
