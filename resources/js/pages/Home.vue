<script setup lang="ts">
import MyLayout from "@/layouts/myLayout.vue";
import Button from "@/components/ui/button/Button.vue";
import NoticesCarousel from "@/components/ui/myComponents/NoticesCarousel.vue";
import {ref} from "vue";
import { useHead } from '@vueuse/head';

useHead({
    title:"Visoka škola akademskih studija Dositej - Početna strana",
    meta: [
        { name: 'description', content: 'Opis stranice' },
        { name: 'keywords', content: 'dream palace, apartmans' },
    ],
    link: [
        {
            rel: 'icon',
            type: 'image/png',
            href: '/assets/img/logobordo.png'
        }
    ]
})

const notices = ref([
    {
        "id":1,
        "title":"Neko obavestenje",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"zanimljivosti"
    },
    {
        "id":2,
        "title":"Neko obavestenje 2",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahdNesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"nastava"

    },
    {
        "id":3,
        "title":"Neko obavestenje 3",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"dogadjaj"
    },
    {
        "id":4,
        "title":"Neko obavestenje 4",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"nastava"
    },
    {
        "id":5,
        "title":"Neko obavestenje 5",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"nastava"
    },
    {
        "id":6,
        "title":"Neko obavestenje 12",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"nastava"
    },
    {
        "id":7,
        "title":"Neko obavestenje 13",
        "content":"Nesirahdoiashdioah dhaioshdah dbauisdh oaihdioahs oidhaoih doiahd",
        "created_at":"2025-06-06 12:22:22",
        "type":"nastava"
    }
])

</script>

<template>
    <my-layout>
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Slide 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img
                        src="/assets/img/slikaSlajder1.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slika 1"
                    />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-white text-center p-6 rounded bg-black/70 opacity-0 transition-opacity duration-700 ease-in-out"
                             data-carousel-item-visible="true">
                            <h2 class="text-2xl md:text-4xl font-bold">Dobrodošli u našu školu</h2>
                            <p class="mt-2 text-sm md:text-lg">Gde znanje postaje uspeh</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img
                        src="/assets/img/slikaSlajder2.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slika 2"
                    />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-white text-center p-6 rounded bg-black/70 opacity-0 transition-opacity duration-700 ease-in-out"
                             data-carousel-item-visible="true">
                            <h2 class="text-2xl md:text-4xl font-bold">Dobrodošli nazad!</h2>
                            <p class="mt-2 text-sm md:text-lg">Vaš put ka znanju počinje ovde.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="notification-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="text-2xl text-gray-950 font-medium">Obaveštenja
                    <span class="underline w-1/12 bg-red-800 h-1 block"></span>
                </h2>
            </div>
                <NoticesCarousel :notices="notices" />
        </div>
        <div class="smerovi mx-auto max-w-screen-xl">
            <div class="header-bigger-block text-gray-950 text-center my-10">
                <h2 class="text-3xl font-medium"><strong class="font-bold">Osnovne</strong> akademske studije </h2>
                <span class="underline mx-auto w-1/9 bg-red-800 h-1 block"></span>
            </div>

            <div class="grid grid-cols-2 place-items-center gap-10 smerovi-dva justify-center text-gray-900 ">
                <div class="smer w-[60%] shadow-lg grid grid-flow-row hover:scale-105 transition rounded-lg">
                    <div class="img-block text-center">
                        <img src="/assets/img/slika-smera.jpg" class="w-full object-cover rounded-t-lg" alt="ekonomski-smer"/>
                    </div>
                    <div class="content-block p-5 flex justify-between items-center">
                        <h3 class="text-xl">Ekonomija</h3>
                        <button class="border rounded py-1 border-red-800 px-2 cursor-pointer">Saznaj više</button>
                    </div>
                </div>
                <div class="smer w-[60%] shadow-lg grid grid-flow-row hover:scale-105 transition rounded-lg">
                    <div class="img-block">
                        <img src="/assets/img/slika-smera.jpg" class="w-full object-cover rounded-t-lg" alt="it-smer"/>
                    </div>
                    <div class="content-block p-5 flex justify-between items-center">
                        <h3 class="text-xl">IT smer</h3>
                        <button class="border rounded py-1 border-red-800 px-2 cursor-pointer hover:bg-orange-400 hover:text-red-800 transition">Saznaj više</button>
                    </div>
                </div>
            </div>
        </div>
    </my-layout>
</template>

<style>
/* Dodajemo CSS za anmaciju prikazivanja tekstualnog bloka */
[data-carousel-item-visible="true"] {
    opacity: 1;
}
</style>
