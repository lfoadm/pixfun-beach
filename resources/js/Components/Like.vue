<script setup>
import { computed, ref } from 'vue';
import { router } from '@inertiajs/vue3';

import ThumbUp from 'vue-material-design-icons/ThumbUp.vue'

const props = defineProps({
    content: Object,
});


const { content } = ref(props)
// console.log(props.content.id)
const liked = ref(props.content.liked)
const count = ref(props.content.like_count)

console.log(liked.value);

const likeIt = () => {
    liked.value ? decr() : incr()
    liked.value = !liked.value
}

const fillColor = computed(() => liked.value ? '#1d72e2' : '#808080');

function incr() {
    router.post(`/like/${props.content.id}`)
}

function decr() {
    router.delete(`/like/${props.content.id}`)
}

</script>

<template>
    <div class="flex items-center justify-between" @click="likeIt">
        <ThumbUp :fillColor="fillColor" :size="16" class="mr-2" />{{ count }}
    </div>
</template>
