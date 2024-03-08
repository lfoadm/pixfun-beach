<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="
            bg-amber-500
            hover:bg-amber-600
            text-white
            font-bold
            text-[23px]
            p-2.5
            rounded-lg
        "
    >
        <slot />
    </button>
</template>