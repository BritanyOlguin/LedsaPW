<script>
import TabMenu from 'primevue/tabmenu';

export default {
    components: {
        TabMenu
    },
    setup() {
        const items = [
            { label: 'Home', icon: 'pi pi-fw pi-home', to: '/' },
            { label: 'Productos', icon: 'pi pi-list', to: '/productos' },
            { label: 'Bolsa de trabajo', icon: 'pi pi-inbox' },
            { label: 'Nosotros', icon: 'pi pi-user', to: '/nosotros' },
        ];

        const onTabChange = (event) => {
            const selectedItem = items[event.index];
            if (selectedItem && selectedItem.to) {
                window.location.href = selectedItem.to;
            } else if (selectedItem.label === 'Bolsa de trabajo') {
                window.open('https://ledsa-industrial.pandape.computrabajo.com/', '_blank');
            }
        };
        return { items, onTabChange };
    },
    data() {
        return {
            logoUrl: '/storage/imgEstaticas/logoLedsa.jpg',
            mobileMenuActive: false
        }
    },
    methods: {
        toggleMobileMenu() {
            if (window.innerWidth > 468) {
                return;
            }
            this.mobileMenuActive = !this.mobileMenuActive;
        },
        handleResize() {
            if (window.innerWidth > 468 && this.mobileMenuActive) {
                this.mobileMenuActive = false;
            }
        },
    },
    mounted() {
        window.addEventListener('resize', this.handleResize);
    },
    beforeUnmount() {
        window.removeEventListener('resize', this.handleResize);
    }
}
</script>

<template>
    <div class="card">
        <div class="container">
            <div class="content">
                <img :src="logoUrl" alt="LEDSA" class="logo" />
                <!-- Menu para pantallas grandes -->
                <TabMenu :model="items" class="estilos-tabmenu desktop-menu" @tab-change="onTabChange" />
                <!-- Menu para pantallas pequeñas -->
                <button class="mobile-menu-button" @click="toggleMobileMenu">
                    <i class="pi pi-bars icon-large"></i>
                </button>
            </div>
        </div>
        <div v-if="mobileMenuActive" class="full-screen-menu">
            <button class="close-button" @click="toggleMobileMenu">
                <i class="pi pi-times icon-large"></i>
            </button>
            <ul class="menu-items">
                <li v-for="(item, index) in items" :key="index" @click="() => onTabChange({ index })">
                    <i :class="item.icon"></i>
                    {{ item.label }}
                </li>
            </ul>
        </div>
    </div>
</template>

<style>
.card {
    margin: auto;
    padding: 1rem;
    max-height: 130px;
    width: 100%;
}

.container {
    margin: 0 auto;
    padding: 1rem;
    max-width: 1000px;
}

.content {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Estilos para pantallas grandes */
.desktop-menu {
    display: block;
}

.estilos-tabmenu .p-tabmenu-nav li {
    margin-right: 50px;
}

.estilos-tabmenu .p-tabmenu-nav li a:hover {
    color: #f07c34;
}

.logo {
    width: 70px;
    height: auto;
    margin-right: 100px;
}

/* Estilos para pantallas pequeñas */
.icon-large {
    font-size: 20px;
}

.mobile-menu-button {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
}

.full-screen-menu {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1001;
}

.full-screen-menu .close-button {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    font-size: 30px;
    color: white;
    cursor: pointer;
}

.full-screen-menu .menu-items {
    list-style: none;
    padding: 0;
    text-align: center;
}

.full-screen-menu .menu-items li {
    padding: 15px;
    font-size: 24px;
    color: white;
    cursor: pointer;
    transition: color 0.3s;
}

.full-screen-menu .menu-items li:hover {
    color: #f07c34;
}

.full-screen-menu .menu-items i {
    margin-right: 10px;
}


/* Estilos responsivos */
@media (max-width: 468px) {
    .desktop-menu {
        display: none;
    }

    .mobile-menu-button {
        display: block;
        order: 1;
    }

    .logo {
        width: 50px;
        height: auto;
        order: -1;
    }
}
</style>