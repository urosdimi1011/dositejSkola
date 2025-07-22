<template>
    <my-layout>
        <header-title>
            <p class="strong first-letter:uppercase">Особље {{latinToCyrillic(props.tipOsoblja)}}</p>
        </header-title>
        <div class="staff-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="!text-2xl sm:!text-3xl text-gray-950 font-medium first-letter:uppercase">{{latinToCyrillic(props.tipOsoblja)}}
                    <span class="underline w-1/18 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
                <p class="text-xl text-gray-500 mt-7 mb-3">У радном односу са пуним радним временом</p>
            </div>
            <template v-if="staffs.length > 0">
                <div v-for="staff in staffs" :key="staff.id" class="osoblje-block">
                    <template v-if="staff.tip === props.tipOsoblja && staff.staff_members.length">
                        <h3 class="text-xl text-gray-500 mt-7 mb-3">{{staff.label}}</h3>
                        <div class="osoblje grid grid-cols-1 sm:grid-cols-2 justify-between">
                            <template v-for="osoba in staff.staff_members" :key="osoba.id">
                                <Staff :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                            </template>
                        </div>
                    </template>
                </div>
            </template>
            <template v-else-if="loader">
                <div
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
            </template>
<!--                <div v-if="osobe.tip === props.tipOsoblja && props.tipOsoblja === 'nenastavno'">-->
<!--                    <div class="content">-->
<!--                        <h3 class="text-xl text-gray-500 mt-7 mb-3">Секретар</h3>-->
<!--                        <template v-for="osoba in osobe.osobe">-->
<!--                            <Staff v-if="osoba.prijava === 'sekretar'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>-->
<!--                        </template>-->
<!--                    </div>-->
<!--                    <div class="content">-->
<!--                        <h3 class="text-xl text-gray-500 mt-7 mb-3">Референт студентске службе</h3>-->
<!--                        <template v-for="osoba in osobe.osobe">-->
<!--                            <Staff v-if="osoba.prijava === 'referent'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>-->
<!--                        </template>-->
<!--                    </div>-->
<!--                    <div class="content">-->
<!--                        <h3 class="text-xl text-gray-500 mt-7 mb-3">Библиотекар</h3>-->
<!--                        <template v-for="osoba in osobe.osobe">-->
<!--                            <Staff v-if="osoba.prijava === 'bibliotekar'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>-->
<!--                        </template>-->
<!--                    </div>-->
<!--                </div>-->

        </div>
    </my-layout>
</template>
<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import Staff from '@/components/myComponents/ui/Staff.vue';
import {onMounted, ref} from "vue";
import { useHead } from "@vueuse/head";
import {initFlowbite} from "flowbite";
import axios from "axios";

const { props } = usePage();
const loader = ref(false);
onMounted(async ()=>{
    initFlowbite();
    await getAllStaffs();
})

const getAllStaffs = async ()=>{
    loader.value = true;
    const response = await axios.get('/osobljeSvoSaPozicijama');

    staffs.value = response.data.osoblje;
    loader.value = false;
}

const staffs = ref([]);


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

useHead({
    title: `Особље ${latinToCyrillic(props.tipOsoblja)} | Висока школа „Доситеј“`,

    meta: [
        {
            name: 'description',
            content: `Све информације о особљу категорије ${latinToCyrillic(props.tipOsoblja)} на Високој школи „Доситеј“ – контакт подаци и локације.`
        },
        {
            property: 'og:title',
            content: `Особље ${latinToCyrillic(props.tipOsoblja)} | Висока школа „Доситеј“`
        },
        {
            property: 'og:description',
            content: `Преглед особља категорије ${latinToCyrillic(props.tipOsoblja)} – улоге, контакт и надлежности.`
        },
        { property: 'og:type', content: 'website' },
        {
            property: 'og:url',
            content: `https://vsdositej.edu.rs/osoblje/${props.tipOsoblja}`
        },
        {
            property: 'og:image',
            content: `https://vsdositej.edu.rs/assets/images/osoblje-${props.tipOsoblja}-preview.jpg`
        }
    ],

    link: [
        {
            rel: 'canonical',
            href: `https://vsdositej.edu.rs/osoblje/${props.tipOsoblja}`
        }
    ]
})

</script>
