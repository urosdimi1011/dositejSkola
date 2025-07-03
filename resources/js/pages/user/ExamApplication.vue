<template>
    <my-layout>
        <header-title>
            <p class="strong">Пријава испита</p>
        </header-title>
        <div class="exam-application-block  mx-auto max-w-screen-xl">
            <p class=" my-5">Пријава испита за одређени испитни рок на Високој школи академских студија „Доситеј“ врши се у студентској служби школе где се преузимају формулари за пријаву испита.</p>
            <p class="strong my-5">Пријава испита се не плаћа, а неопходно ју је извршити у време предвиђено за пријаву испита у одређеном испитном року.</p>
            <p class="font-bold my-5"><a href="/assets/files/nalog-za-uplatu.jpg" class="hover:text-red-800 transition" target="_blank"> Налог за уплату (кликни да погледаш) </a></p>
        </div>
    </my-layout>
</template>
<script setup lang="ts">

import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";

import {initFlowbite} from "flowbite";
import {onMounted} from "vue";
import { useHead } from '@vueuse/head';

useHead({
    title: 'Пријава испита | Висока школа „Доситеј“',
    meta: [
        {
            name: 'description',
            content: 'Информације о пријави испита на Високој школи академских студија „Доситеј“. '
        },
        {
            property: 'og:title',
            content: 'Пријава испита | Висока школа „Доситеј“'
        },
        {
            property: 'og:description',
            content: 'Сазнајте све о пријави испита за испитне рокове на Високој школи „Доситеј“. Формулари се преузимају у студентској служби.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: 'https://vsdositej.edu.rs/prijava-ispita'
        },
        {
            property: 'og:image',
            content: 'https://vsdositej.edu.rs/favicon.ico'
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: 'https://vsdositej.edu.rs/prijava-ispita'
        }
    ]
});
onMounted(()=>{
    initFlowbite();
})

</script>
