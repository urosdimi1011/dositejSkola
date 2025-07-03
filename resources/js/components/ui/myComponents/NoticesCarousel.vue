<template>
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div
            v-if="spinner"
            class="min-h-[200px] flex items-center justify-center"
        >
            <svg
                class="w-12 h-12 text-red-600 animate-spin"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"
                />
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8v4l5-5-5-5v4a8 8 0 100 16z"
                />
            </svg>
        </div>
        <template v-else>
            <template v-if="groupedNotices.length > 0">
                <Swiper
                    :modules="[Pagination, Autoplay]"
                    :slides-per-view="1"
                    :space-between="30"
                    :loop="true"
                    :autoplay="{ delay: 5000, disableOnInteraction: false }"
                    :pagination="{ clickable: true }"
                    class="w-full"
                >
                    <SwiperSlide v-for="(group, i) in groupedNotices" :key="i">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-10">
                            <div
                                v-for="notice in group"
                                :key="notice.id"
                                class="bg-white p-4 rounded-xl shadow relative"
                            >
                        <span
                            class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold rounded-full"
                            :class="tagClass(notice.category)"
                        >
                          {{ latinToCyrillic(notice.category) }}
                        </span>

                                <h3 class="text-lg text-gray-900 font-semibold">{{ notice.title }}</h3>
                                <p class="text-sm text-gray-600 mt-2 line-clamp-3">
                                    {{ plainText(notice.content) }}

                                </p>
                                <div class="text-xs text-gray-500 mt-2">
                                    {{ formatDate(notice.created_at) }}
                                </div>
                                <Link
                                    :href="`/obavestenja/${notice.slug}`"
                                    class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition"
                                >
                                    Прочитај више →
                                </Link>
                            </div>
                        </div>
                    </SwiperSlide>
                </Swiper>
            </template>
            <template v-if="groupedNotices.length === 0">
                <div class="text-center text-gray-500 py-10">Trenutno nema obaveštenja.</div>
            </template>
        </template>
    </div>
</template>

<script setup lang="ts">
import {defineProps, ref,computed} from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Pagination, Autoplay } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/pagination'
import 'swiper/css/autoplay'

import { Link } from '@inertiajs/vue3'

// Props
const props = defineProps({
    notices: {
        type: Array,
        required: true,
        default : null
    },
    spinner : Boolean
})
const hasNotices = computed(() => props.notices.length > 1);

function plainText(html: string): string {
    const tmp = document.createElement('div');
    tmp.innerHTML = html;
    const text = tmp.textContent || tmp.innerText || '';
    return text.trim().slice(0, 100) + (text.length > 100 ? '…' : '');
}

const groupedNotices = computed(() => {
    const sorted = [...props.notices].sort((a,b) =>
        new Date(b.created_at) - new Date(a.created_at)
    )
    const groups = []
    for (let i = 0; i < sorted.length; i += 3) {
        groups.push(sorted.slice(i, i + 3))
    }
    return groups
})
function latinToCyrillic(text) {
    const map = {
        'dj': 'ђ', 'nj': 'њ', 'lj': 'љ',
        'a': 'а', 'b': 'б', 'v': 'в', 'g': 'г', 'd': 'д', 'đ': 'ђ',
        'e': 'е', 'ž': 'ж', 'z': 'з', 'i': 'и', 'j': 'ј', 'k': 'к',
        'l': 'л', 'm': 'м', 'n': 'н', 'o': 'о', 'p': 'п', 'r': 'р',
        's': 'с', 't': 'т', 'ć': 'ћ', 'u': 'у', 'f': 'ф', 'h': 'х',
        'c': 'ц', 'č': 'ч', 'š': 'ш',
        'Dž': 'Џ', 'Nj': 'Њ', 'Lj': 'Љ'
    };
    return text.replace(/nj|lj|dž|[a-zćčđšž]/gi, match => {
        const lower = match.toLowerCase();
        const isUpper = match[0] === match[0].toUpperCase();
        const converted = map[lower] || match;
        return isUpper ? converted.toUpperCase() : converted;
    });
}
// Formatiranje datuma
const formatDate = (dateStr) => {
    const date = new Date(dateStr)
    return `${date.getDate().toString().padStart(2, '0')}.${(date.getMonth() + 1)
        .toString()
        .padStart(2, '0')}.${date.getFullYear()}`
}

// Klasa za tag tipa
const tagClass = (type) => {
    switch (type?.toLowerCase()) {
        case 'nastava':
            return 'border uppercase text-shadow-md text-red-800'
        case 'dogadjaj':
            return 'border uppercase text-shadow-md text-red-800'
        case 'zanimljivost':
            return 'border uppercase text-shadow-md text-red-800'
        default:
            return 'uppercase bg-gray-100 text-red-800'
    }
}
</script>
