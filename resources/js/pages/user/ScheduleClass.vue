<template>
    <my-layout>
        <header-title>
            <p class="strong">Распоред активности</p>
        </header-title>
        <div class="raspored-casova-block mx-auto max-w-screen-xl">
            <p class="text-gray-500 my-10">У наставку можете преузети документацију која садржи распореде и календаре активности.</p>
            <Accordian :active-item-key="1" :always-open :items="sections">
                <template #default="{ item }">
                    <template v-if="item.payload">
                                <template v-if="item.component && item.payload.datas">
                                            <component
                                                v-if="item.component"
                                                :is="item.component"
                                                v-bind="item.payload"
                                            />
                                </template>
                                <template v-else-if="item.payload.length">
                                    <div class="px-3 hover:text-red-800">
                                        <ScheduleComponent v-for="raspored in item.payload" :key="raspored.id" :raspored="raspored"></ScheduleComponent>
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
                                <template v-else>
                                    <p class="text-gray-500 m-3">Тренутно нема активности</p>
                                </template>
                        </template>

                </template>
            </Accordian>
        </div>
    </my-layout>
</template>
<script setup lang="ts">
import {onMounted,reactive,ref} from 'vue';
const rasporedCasova = ref([]);
const loader = ref(false);
const getSchedule = async ()=>{
    loader.value = true;
    const casovi = await axios.get('/raspored/casovi',{
        params : {allData : "true",type : 'aktivnosti'},
    });
    rasporedCasova.value = casovi.data.raspored;
    loader.value = false;
}
const rasporediIstipa = [
    { ispitniRok: 'Januarsko-februarski ispitni rok', terminPrijaveIspita: 'Od 9. do 22. decembra 2024.',terminIspitnogRoka: 'Od 27. januara do 14. februara 2025.' },
    { ispitniRok: 'Januarsko-februarski ispitni rok', terminPrijaveIspita: 'Od 9. do 22. decembra 2024.',terminIspitnogRoka: 'Od 27. januara do 14. februara 2025.' },
    { ispitniRok: 'Januarsko-februarski ispitni rok', terminPrijaveIspita: 'Od 9. do 22. decembra 2024.',terminIspitnogRoka: 'Od 27. januara do 14. februara 2025.' },
    { ispitniRok: 'Januarsko-februarski ispitni rok', terminPrijaveIspita: 'Od 9. do 22. decembra 2024.',terminIspitnogRoka: 'Od 27. januara do 14. februara 2025.' },
    { ispitniRok: 'Januarsko-februarski ispitni rok', terminPrijaveIspita: 'Od 9. do 22. decembra 2024.',terminIspitnogRoka: 'Od 27. januara do 14. februara 2025.' },
]
const sections = reactive([
    {
        key: 1,
        title: "Распоред активности",
        payload : rasporedCasova
    },
    {
        key: 2,
        title: "Термини испитних рокова",
        payload : {
            datas : rasporediIstipa,
            headers : [
                {
                    "id":1,
                    "title":"Испитни рок",
                    "name":'ispitniRok'
                },
                {
                    "id":2,
                    "title":"Термин пријаве испита",
                    "name":'terminPrijaveIspita'
                },
                {
                    "id":3,
                    "title":"Термин испитног рока",
                    "name":'terminIspitnogRoka'
                }
            ],
        },
        component : Table
    },
]);
onMounted(async ()=>{
    initFlowbite();
    await getSchedule();
})



import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import axios from "axios";
import {initFlowbite} from "flowbite";
import Accordian from "@/components/myComponents/ui/Accordian.vue";
import Table from "@/components/myComponents/ui/Table.vue";
import ScheduleComponent from "@/components/myComponents/ui/ScheduleComponent.vue";
</script>
