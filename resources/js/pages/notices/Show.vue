<script setup>
import { useHead } from '@vueuse/head'

const props = defineProps({
    notice: Object
})

useHead({
    title: props.notice.title + ' | Obaveštenje'
})
</script>

<template>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ notice.title }}</h1>

        <div class="text-gray-500 text-sm mb-2">
            {{ new Date(notice.created_at).toLocaleDateString('sr-RS') }}
        </div>

        <div v-if="notice.type" class="inline-block px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded mb-4">
            {{ notice.type }}
        </div>

        <div class="prose prose-sm max-w-none" v-html="notice.content"></div>
    </div>
</template>
