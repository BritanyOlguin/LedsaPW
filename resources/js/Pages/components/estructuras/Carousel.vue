<template>
    <div class="carousel" ref="rootRef" @touchstart="handleTouchStart" @touchmove="handleTouchMove"
        @touchend="handleTouchEnd">
        <slot :currentSlide="currentSlide" />
        <!-- Pagination -->
        <div v-if="paginationEnabled && getSlideCount > 1" class="pagination">
            <span @click="goToSlide(index)" v-for="(slide, index) in getSlideCount" :key="index"
                :class="{ active: index + 1 === currentSlide }">
            </span>
        </div>

    </div>
</template>

<script>
import { ref, onMounted, nextTick, watch } from 'vue';

export default {
    props: {
        startAutoPlay: Boolean,
        timeout: {
            type: Number,
            default: 5000,
        },
        pagination: Boolean,
        slides: {
            type: Array,
            required: true,
        },
    },

    mounted() {
        axios.get('/api/configuraciones')
            .then(response => {
                const { pagination, startAutoPlay, timeout } = response.data;
                this.pagination = pagination;
                this.startAutoPlay = startAutoPlay;
                this.timeout = timeout;
                this.autoPlay(); // Reiniciar el carrusel con las nuevas configuraciones
            })
            .catch(error => console.error("Error al cargar configuraciones:", error));
    },

    setup(props) {

        let startX = 0;
        let endX = 0;

        const handleTouchStart = (event) => {
            startX = event.touches[0].clientX;
            setupAutoPlay();
        };

        const handleTouchMove = (event) => {
            endX = event.touches[0].clientX;
            setupAutoPlay();
        };

        const handleTouchEnd = () => {
            if (startX - endX > 50) {
                nextSlide(); // Deslizar hacia la izquierda, mostrar siguiente
            } else if (startX - endX < -50) {
                prevSlide(); // Deslizar hacia la derecha, mostrar anterior
            }
        };

        const intervalId = ref(null);

        const currentSlide = ref(1);
        const getSlideCount = ref(props.slides.length);
        const autoPlayEnabled = ref(props.startAutoPlay);
        const timeoutDuration = ref(props.timeout);
        const paginationEnabled = ref(props.pagination);
        const nextSlide = () => {
            updateSlideCount();
            if (currentSlide.value === getSlideCount.value) {
                currentSlide.value = 1;
                return;
            }
            currentSlide.value += 1;
        };

        // prev slide
        const prevSlide = () => {
            updateSlideCount();
            if (currentSlide.value === 1) {
                currentSlide.value = getSlideCount.value;
                return;
            }
            currentSlide.value -= 1;
        }


        const goToSlide = (index) => {
            currentSlide.value = index + 1;
            setupAutoPlay();  // Reiniciar el temporizador de reproducción automática
        };

        // auto play
        const autoPlay = () => {
            clearInterval(intervalId.value);
            intervalId.value = setInterval(() => {
                nextSlide();
            }, props.timeout);
        };

        const pauseAutoPlay = () => {
            clearInterval(intervalId.value);
        };

        const setupAutoPlay = () => {
            if (props.startAutoPlay) {
                autoPlay();
            } else {
                pauseAutoPlay();
            }
        };

        // Watch for changes on startAutoPlay prop to enable/disable autoplay
        watch(() => props.startAutoPlay, (newValue) => {
            setupAutoPlay();
        });

        const updateSlideCount = () => {
            getSlideCount.value = props.slides.length; // Usamos la longitud del prop slides 
        };

        // Escuchar cambios en la visibilidad de la página
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                pauseAutoPlay();  // Pausar cuando la pestaña está inactiva
            } else {
                setupAutoPlay();       // Reanudar cuando la pestaña está activa
            }
        });

        onMounted(() => {
            nextTick(() => {
                updateSlideCount();
                setupAutoPlay();
            });
        });

        return { currentSlide, nextSlide, prevSlide, getSlideCount, goToSlide, paginationEnabled, handleTouchStart, handleTouchMove, handleTouchEnd };
    }
}
</script>

<style lang="scss">
.pagination {
    position: absolute;
    bottom: 10px;
    width: 100%;
    display: flex;
    gap: 16px;
    justify-content: center;
    align-items: center;

    span {
        cursor: pointer;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .active {
        background-color: #f07c34;
    }

    /* Ocultar la paginación en pantallas menores a 468px */
    @media (max-width: 468px) {
        display: none;
    }

    // Para pantallas pequeñas
    @media (max-width: 399px) {
        span {
            width: 5px;
            height: 5px;
        }
    }

    @media (min-width: 400px) and (max-width: 499px) {
        span {
            width: 7px;
            height: 7px;
        }
    }

    @media (min-width: 500px) and (max-width: 599px) {
        span {
            width: 9px;
            height: 9px;
        }
    }

    @media (min-width: 600px) and (max-width: 699px) {
        span {
            width: 11px;
            height: 11px;
        }
    }

    @media (min-width: 700px) and (max-width: 799px) {
        span {
            width: 13px;
            height: 13px;
        }
    }

    @media (min-width: 800px) and (max-width: 899px) {
        span {
            width: 15px;
            height: 15px;
        }
    }

    @media (min-width: 900px) {
        span {
            width: 20px;
            height: 20px;
        }
    }
}
</style>