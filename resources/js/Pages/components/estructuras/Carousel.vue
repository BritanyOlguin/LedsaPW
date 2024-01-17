
<template>
    <div class="carousel" ref="rootRef">
        <slot :currentSlide="currentSlide" />

        <!-- Navegation -->
        <div v-if="navEnabled" class="navigate">
            <div class="toogle-page left">
                <i @click="prevSlide" class="pi pi-arrow-left"></i>
            </div>
            <div class="toogle-page right">
                <i @click="nextSlide" class="pi pi-arrow-right"></i>
            </div>
        </div>

        <!-- Pagination -->
        <div v-if="paginationEnabled && getSlideCount > 1" class="pagination">
            <span @click="goToSlide(index)" v-for="(slide, index) in getSlideCount" :key="index" :class="{ active: index + 1 === currentSlide }">
            </span>
        </div>

    </div>
</template>

<script>
import { ref, onMounted, nextTick } from 'vue';  // Import nextTick
import 'primeicons/primeicons.css';

export default {
    props: {
        startAutoPlay: {
            type: Boolean,
            default: true
        },
        timeout: {
            type: Number,
            default: 5000
        },
        navigation: {
            type: Boolean,
            default: true
        },
        pagination: {
            type: Boolean,
            default: true
        },
        slides: {
            type: Array,
            required: true
        }
    },

    setup(props) {
        const currentSlide = ref(1);
        const getSlideCount = ref(props.slides.length);
        const autoPlayEnabled = ref(props.startAutoPlay);
        const timeoutDuration = ref(props.timeout);
        const paginationEnabled = ref(props.pagination);
        const navEnabled = ref(props.navigation);
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
        }

        // auto play
        const autoPlay = () => {
            setInterval(() => {
                nextSlide();
            }, timeoutDuration.value);
        }

        if (autoPlayEnabled.value) {
            autoPlay();
        }

        const updateSlideCount = () => {
            getSlideCount.value = props.slides.length; // Usamos la longitud del prop slides 
        };

        onMounted(() => {
            nextTick(() => {
                updateSlideCount();
            });
        });

        return { currentSlide, nextSlide, prevSlide, getSlideCount, goToSlide, paginationEnabled, navEnabled };
    }
}
</script>

<style lang="scss">
.navigate {
    padding: 0 16px;
    height: 100%;
    width: 100%;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;

    .toogle-page {
        display: flex;
        flex: 1;
    }

    .right {
        justify-content: flex-end;
    }

    i {
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        background-color: black;
        color: white;
    }
}

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
        background-color: #23356A;
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