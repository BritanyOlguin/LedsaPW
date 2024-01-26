<script setup>
import { useLayout } from '@/layout/composables/layout';
import { computed } from 'vue';

const { layoutConfig } = useLayout();

const logoUrl = computed(() => {
    return `/storage/imgEstaticas/ledsaLogo.svg`;
});
</script>

<template>
    <div class="layout-footer">
        <img :src="logoUrl" alt="Logo" />
    </div>
</template>
<style lang="scss" scoped>
.layout-footer {
    align-items: center;
    justify-content: center;
    img {
        height: 120px;
    }
}
</style>
