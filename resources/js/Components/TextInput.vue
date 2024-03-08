<script setup>
import { onMounted, ref } from 'vue';

defineProps(['placeholder']);

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="border-gray-300 focus:border-orange-300 focus:ring-orange-300 rounded-md shadow-sm p-4 text-lg font-semibold"
        v-model="model"
        ref="input"
        :placeholder="placeholder"
    />
</template>
