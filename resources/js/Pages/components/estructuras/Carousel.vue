
<template>
    <div class="carousel" ref="rootRef">
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
import { ref, onMounted, onUnmounted, watch } from 'vue';
import 'primeicons/primeicons.css';


export default {
    props: {
        startAutoPlay: { type: Boolean, default: true },
        timeout: { type: Number, default: 5000 },
        pagination: { type: Boolean, default: true },
        slides: { type: Array, required: true }
    },

    setup(props) {
        const currentSlide = ref(1);
        const getSlideCount = () => props.slides.length;
        let intervalId = null;
        let rafId = null;
        let lastTime = Date.now();

        const nextSlide = () => {
            currentSlide.value = (currentSlide.value % getSlideCount()) + 1;
        };

        const autoPlay = () => {
            const now = Date.now();
            const elapsed = now - lastTime;

            if (elapsed > props.timeout) {
                nextSlide();
                lastTime = now;
            }

            rafId = requestAnimationFrame(autoPlay);
        };

        const startAutoPlay = () => {
            if (props.startAutoPlay) {
                if (typeof document.hidden !== "undefined" && !document.hidden) {
                    rafId = requestAnimationFrame(autoPlay);
                } else {
                    intervalId = setInterval(nextSlide, props.timeout);
                }
            }
        };

        const stopAutoPlay = () => {
            if (rafId) {
                cancelAnimationFrame(rafId);
                rafId = null;
            }
            if (intervalId) {
                clearInterval(intervalId);
                intervalId = null;
            }
        };

        const handleVisibilityChange = () => {
            stopAutoPlay();
            startAutoPlay();
        };

        onMounted(() => {
            document.addEventListener('visibilitychange', handleVisibilityChange);
            startAutoPlay();
        });

        onUnmounted(() => {
            document.removeEventListener('visibilitychange', handleVisibilityChange);
            stopAutoPlay();
        });

        watch(() => props.startAutoPlay, (newVal) => {
            if (newVal) {
                startAutoPlay();
            } else {
                stopAutoPlay();
            }
        });

        return { currentSlide, getSlideCount };
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