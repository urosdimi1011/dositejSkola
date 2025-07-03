<template>
    <div class="notice my-10">
        <div class="notice-top">
            <div class="date-format-block flex items-center gap-3">
                <p class="flex flex-col"><span class="text-3xl font-bold text-red-800">{{ day }}</span>{{ month }}</p>
                <div class="title-block">
                    <h3 class="font-bold" v-html="highlightedTitle"></h3>
                </div>
            </div>
            <p class="text-xs flex gap-4 my-2">
                <span><span class="uppercase text-shadow-xs text-gray-400 color-for-text">Kategorija:</span> {{notice.category}}</span>
            </p>
        </div>
        <div class="notice-bottom">
            <p v-html="highlightedContent"></p>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps, withDefaults, computed } from 'vue'
import { useSerbianDate } from '@/composables/useSerbianDate'

interface Notice {
    id: number
    title: string
    content: string
    category: string
    created_at: string
}

// 1) defineProps + withDefaults da search uvek postoji (string)
const props = withDefaults(defineProps<{
    notice: Notice
    search?: string
}>(), {
    search: '',
})

const { day, month } = useSerbianDate(
    new Date(props.notice.created_at)
)

function escapeRegExp(str: string) {
    return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')
}

function highlight(text: string, term: string): string {
    if (!term) return text
    const pattern = escapeRegExp(term)
    return text.replace(
        new RegExp(pattern, 'gi'),
        match => `<mark class="bg-yellow-200">${match}</mark>`
    )
}

const highlightedTitle = computed(() =>
    highlight(props.notice.title, props.search)
)
const highlightedContent = computed(() =>
    highlight(props.notice.content, props.search)
)
</script>
