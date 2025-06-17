<template>
    <div class="max-w-6xl mx-auto px-4 py-6">
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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        v-for="notice in group"
                        :key="notice.id"
                        class="bg-white p-4 rounded-xl shadow relative"
                    >
        <span
            class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold rounded-full"
            :class="tagClass(notice.type)"
        >
          {{ notice.type }}
        </span>

                        <h3 class="text-lg text-gray-900 font-semibold">{{ notice.title }}</h3>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-3">{{ notice.content }}</p>
                        <div class="text-xs text-gray-500 mt-2">
                            {{ formatDate(notice.created_at) }}
                        </div>
                        <Link
                            :href="`/obavestenja/${notice.id}`"
                            class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition"
                        >
                            Pročitaj više →
                        </Link>
                    </div>
                </div>
            </SwiperSlide>
        </Swiper>

        <template v-if="groupedNotices.length === 0">
            <div class="text-center text-gray-500 py-10">Trenutno nema obaveštenja.</div>
        </template>
    </div>
</template>

<script setup>
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
        required: true
    }
})

// Grupisanje po 3
const groupedNotices = []
for (let i = 0; i < props.notices.length; i += 3) {
    groupedNotices.push(props.notices.slice(i, i + 3))
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
            return 'bg-green-100 text-green-800'
        case 'dogadjaj':
            return 'bg-yellow-100 text-yellow-800'
        case 'zanimljivost':
            return 'bg-purple-100 text-purple-800'
        default:
            return 'bg-gray-100 text-gray-800'
    }
}
</script>
