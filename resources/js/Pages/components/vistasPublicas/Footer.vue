<template>
    <footer class="footer">
        <div class="footer-columns">
            <div class="footer-column">
                <p>@LEDSA todos los Derechos Reservados</p>
            </div>
            <div class="footer-column">
                <ul>
                    <li><a href="/legal">Aviso Legal</a></li>
                    <li><a href="/privacy">Aviso de Privacidad</a></li>
                    <li><a href="/sitemap">Mapa del sitio</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-rights">
            <p>@2021 LEDSA INDUSTRIAL S.A DE C.V</p>
        </div>
    </footer>
</template>

<script>
export default {
    // Opciones del componente
};
</script>

<style>
.footer {
    background-color: #f07c34;
    color: white;
    padding: 40px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.footer-columns {
    display: flex;
    flex-direction: column;
}

.footer-column ul {
    padding: 0;
    list-style-type: none;
    margin: 0;
}

.footer-column a {
    color: white;
    text-decoration: none;
}

.footer-column a:hover {
    color: lightgray;
}

.footer-rights {
    text-align: right;
}
</style>
