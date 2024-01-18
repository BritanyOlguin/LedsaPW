<template>
    <footer class="footer">
        <div class="footer-left">
            <div class="footer-column">
                <br>@LEDSA todos los
                <br>Derechos Reservados
            </div>
            <div class="footer-column links">
                <a href="/">Aviso Legal</a>
                <a href="/">Aviso de Privacidad</a>
                <a href="/">Mapa del sitio</a>
            </div>
        </div>
        <div class="footer-right">
            <p>@2021 LEDSA INDUSTRIAL S.A DE C.V</p>
        </div>
    </footer>
</template>

<script>
export default {
    // Opciones del componente
};
</script>

<style scoped>
.footer {
    background-color: #f07c34;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-left {
    margin-left: 50px;
    display: flex;
}

.footer-column {
    margin-right: 40px; /* Espacio entre las dos columnas */
}

.footer-column.links a {
    display: block; /* Cada enlace en una línea separada */
    color: white;
    text-decoration: none;
    margin-bottom: 5px; /* Espacio entre los enlaces */
}

.footer-column.links a:hover {
    color: rgb(73, 73, 73);
}

.footer-right {
    text-align: right;
    margin-right: 50px;
}

/* Estilos responsivos para pantallas pequeñas */
@media (max-width: 468px) {

    .footer-left, .footer-right {
        margin: 10px 0;
    }

    .footer-column {
        margin-right: 0; /* Quita el margen en pantallas pequeñas */
    }
}
</style>
