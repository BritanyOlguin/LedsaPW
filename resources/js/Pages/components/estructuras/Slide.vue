<template>
    <div class="slide">
        <Transition name="slide" @after-enter="onEnter" @after-leave="onLeave">
            <slot />
        </Transition>
    </div>
</template>

<script>
export default {
    methods: {
        onEnter() {
            this.$emit('transitionEnd', true);  // Emitir un evento al finalizar la transición
        },
        onLeave() {
            this.$emit('transitionEnd', false);  // Emitir un evento al iniciar la transición
        }
    }
}
</script>

<style lang="scss">
.slide-enter-active,
.slide-leave-active {
    transition: opacity 0.7s ease-in-out;
}

.slide-enter-from,
.slide-leave-to {
    opacity: 0;
}

.slide-enter-to,
.slide-leave-from {
    opacity: 1;
}
</style>
