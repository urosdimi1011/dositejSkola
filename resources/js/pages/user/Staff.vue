<template>
    <my-layout>
        <header-title>
            <p class="strong first-letter:uppercase">Особље {{latinToCyrillic(props.tipOsoblja)}}</p>
        </header-title>
        <div class="staff-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="text-3xl text-gray-950 font-medium first-letter:uppercase">{{latinToCyrillic(props.tipOsoblja)}}
                    <span class="underline w-1/18 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
                <p class="text-xl text-gray-500 mt-7 mb-3">У радном односу са пуним радним временом</p>
            </div>
            <template v-for="osobe in staffs">
                <div v-if="osobe.tip === props.tipOsoblja && props.tipOsoblja === 'nastavno'" class="osoblje-block">
                    <h3 class="text-xl text-gray-500 mt-7 mb-3">Редовни профероси</h3>
                    <div class="osoblje grid grid-cols-2 justify-between">
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'full'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>

                    <h3 class="text-xl text-gray-500 mt-7 mb-3">Вандредни профероси</h3>
                    <div class="osoblje grid grid-cols-2">
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'vandredni'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>


                    <h3 class="text-xl text-gray-500 mt-7 mb-3">Асистенти са докторатом</h3>
                    <div class="osoblje grid grid-cols-2">
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'asistenti'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>

                    <h3 class="text-xl text-gray-500 mt-7 mb-3">Доценти</h3>
                    <div class="osoblje grid grid-cols-2">
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'docent'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>

                    <h3 class="text-xl text-gray-500 mt-7 mb-3">У допунском раду</h3>
                    <div class="osoblje grid grid-cols-2">
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'dopunskiRad'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>
                </div>
                <div v-if="osobe.tip === props.tipOsoblja && props.tipOsoblja === 'nenastavno'">
                    <div class="content">
                        <h3 class="text-xl text-gray-500 mt-7 mb-3">Секретар</h3>
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'sekretar'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>
                    <div class="content">
                        <h3 class="text-xl text-gray-500 mt-7 mb-3">Референт студентске службе</h3>
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'referent'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>
                    <div class="content">
                        <h3 class="text-xl text-gray-500 mt-7 mb-3">Библиотекар</h3>
                        <template v-for="osoba in osobe.osobe">
                            <Staff v-if="osoba.prijava === 'bibliotekar'" :key="osoba.id" :id="osoba.id" :name="osoba.name" :email="osoba.email"></Staff>
                        </template>
                    </div>
                </div>
            </template>

        </div>
    </my-layout>
</template>
<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import Staff from '@/components/myComponents/ui/Staff.vue';
import {onMounted, reactive} from "vue";
import {initFlowbite} from "flowbite";

const { props } = usePage();

onMounted(()=>{
    initFlowbite();
})

const staffs = reactive([
    {
        "tip":"nastavno",
        "osobe":[
            {
                id: 1,
                name: "Проф. др Mирјана Стевановић",
                email: "mirjana.stevanovic@vsdositej.edu.rs",
                prijava: "full",
                tip: "nastavno"
            },
            {
                id: 2,
                name: "Проф. др Јованка Поповић",
                email: "jovanka.popovic@vsdositej.edu.rs",
                prijava: "full",
                tip: "nastavno"
            },
            {
                id: 3,
                name: "Проф. др Драган Милошевић",
                email: "dragan.milosevic@vsdositej.edu.rs",
                prijava: "full",
                tip: "nastavno"
            },
            {
                id: 4,
                name: "Проф. др Јелена Авакумовић",
                email: "jelena.avakumovic@vsdositej.edu.rs",
                prijava: "full",
                tip: "nastavno"
            },
            {
                id: 5,
                name: "Проф. др Јелена Авакумовић",
                email: "jelena.avakumovic@vsdositej.edu.rs",
                prijava: "full",
                tip: "nastavno"
            },
            {
                id: 6,
                name: "Проф. др Слободан Аџић",
                email: "slobodan adzic@vsdositej.edu.rs",
                prijava: "full",
                tip: "nastavno"
            },
            {
                id: 7,
                name: "Проф. др Иван Шћепановић",
                email: "ivan.scepanovic@vsdositej.edu.rs",
                prijava: "vandredni",
                tip: "nastavno"
            },
            {
                id: 8,
                name: "Проф. др Вук Милетић",
                email: "vuk.miletic@vsdositej.edu.rs",
                prijava: "vandredni",
                tip: "nastavno"
            },
            {
                id: 9,
                name: "др Александра Станковић",
                email: "aleksandra.stankovic@vsdositej.edu.rs",
                prijava: "asistenti",
                tip: "nastavno"
            },
            {
                id: 10,
                name: "др Војкан Бижић",
                email: "vojkan.bizic@vsdositej.edu.rs",
                prijava: "asistenti",
                tip: "nastavno"
            },
            {
                id: 11,
                name: "Проф. др Вук Милетић",
                email: "vuk.miletic@vsdositej.edu.rs",
                prijava: "asistenti",
                tip: "nastavno"
            },
            {
                id: 12,
                name: "Доц. др Славиша Вучуревић",
                email: "slavisa.vucurevic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 13,
                name: "Доц. др Ирена Тасић",
                email: "irena.tasic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 14,
                name: "Доц. др Весна Шћепановић",
                email: "vesna.scepanovic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 15,
                name: "Доц. др Дијана Јовановић",
                email: "dijana.jovanovic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 16,
                name: "Доц. др Дејан Јовановић",
                email: "dejan.jovanovic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 17,
                name: "Доц. др Борко Сомборац",
                email: "borko.somborac@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 18,
                name: "Доц. др Миле Рајковић",
                email: "mile.rajkovic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 19,
                name: "Доц. др Иван Раонић",
                email: "ivan.raonic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 20,
                name: "Доц. др Сања Станков",
                email: "sanja.stankov@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 21,
                name: "Доц. др Саша Салапура",
                email: "sasa.salapura@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 22,
                name: "Доц. др Татјана Давидов",
                email: "tatjana.davidov@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 23,
                name: "Драгана Јеленић, професор енглеског језика",
                email: "dragana.jelenic@vsdositej.edu.rs",
                prijava: "docent",
                tip: "nastavno"
            },
            {
                id: 24,
                name: "Проф. др Милан Савић",
                email: "milan.savic@vsdositej.edu.rs",
                prijava: "dopunskiRad",
                tip: "nastavno"
            },
            {
                id: 25,
                name: "Проф. др Звездан Арсић",
                email: "zvezdan.arsic@vsdositej.edu.rs",
                prijava: "dopunskiRad",
                tip: "nastavno"
            },
            {
                id: 26,
                name: "Проф. др Саша Перишић",
                email: "sasa.perisic@vsdositej.edu.rs",
                prijava: "dopunskiRad",
                tip: "nastavno"
            },
            {
                id: 27,
                name: "Доц. др Данијел Ђошић",
                email: "danijel.djosic@vsdositej.edu.rs",
                prijava: "dopunskiRad",
                tip: "nastavno"
            },
            {
                id: 28,
                name: "Доц. др Марко Смилић",
                email: "marko.smilic@vsdositej.edu.rs",
                prijava: "dopunskiRad",
                tip: "nastavno"
            },
            {
                id: 29,
                name: "Афердита Црнишанин, професор енглеског језика",
                email: "aferdita.crnisanin@vsdositej.edu.rs",
                prijava: "dopunskiRad",
                tip: "nastavno"
            }
        ]
    },
    {
        "tip":"nenastavno",
        "osobe":[
            {
                id: 30,
                name: "дипл. правник Наташа Јовановић",
                email: "natasa.jovanovic@akademijadositej.edu.rs",
                prijava: "sekretar",
                tip: "nenastavno"
            },
            {
                id: 32,
                name: "Марија Рацић – струковни економиста",
                email: "vsdositej.informatika@gmail.com, vsdositej@yahoo.com",
                prijava: "referent",
                tip: "nenastavno"
            },
            {
                id: 33,
                name: "Јелена Нешић – струковни економиста",
                email: "vsdositej.informatika@gmail.com, vsdositej@yahoo.com",
                prijava: "referent",
                tip: "nenastavno"
            },
            {
                id: 34,
                name: "Бојана Тасковић",
                email: "bojana.taskovic@vsdositej.edu.rs",
                prijava: "bibliotekar",
                tip: "nenastavno"
            }
        ]
    }
]);


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
</script>
