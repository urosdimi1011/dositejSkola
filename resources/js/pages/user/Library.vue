<template>
    <my-layout>
        <header-title>
            <p class="strong">Библотека</p>
        </header-title>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2  mx-auto max-w-screen-xl">
            <div class="content-of-library">
                <p class="mb-5">Библиотека Високе школе академских студија „Доситеј“ располаже великим бројем домаће и стране литературе из области економије, менаџмента, предузетништва, финансија, маркетинга, банкарства, монетарне политике…</p>
                <p class="my-5">Опремљена по највишим светским стандардима и са завидним библиотечким фондом, библиотека Високе школе „Доситеј“ у потпуности може да одговори потребама наших студената како у смислу разумевања студијских програма на основним и мастер студијама, тако и за стицање ширих знања и праћење савремених економских и бизнис трендова.</p>
                <p class="my-5">Библиотека располаже и великим фондом зборника радова са научно-стручних скупова у земљи и иностранству  из области економије, менаџмента, маркетинга и сл. бројним научним монографијама, као и великим бројем популарних стручних публикација.</p>
                <p class="my-5">Један од наших приоритета свакако је и стално прикупљање и повећање броја стручне литературе домаћих и страних аутора, чему увелико доприносе наша сарадња са свим важним економским институцијама у земљи, поклони наших професора, сарадника и гостујућих економских експерата, размене и претплате на домаће и стране часописе.</p>
            </div>
            <div class="coreui-scope">
                <Accordian :items="sections" :activeItemKey="1">
                    <template #default="{ item }">
                        <component
                            v-if="item.component"
                            :is="item.component"
                            v-bind="item.payload"
                        />
                        <div v-else>
                            {{ item.payload }}
                        </div>
                    </template>
                </Accordian>
            </div>
        </div>
    </my-layout>
</template>
<script setup lang="ts">

import { useHead } from '@vueuse/head';

useHead({
    title: 'Библиотека - Висока школа академских студија „Доситеј“',
    meta: [
        {
            name: 'description',
            content: 'Библиотека Високе школе „Доситеј“ поседује богат фонд домаће и стране литературе из области економије, менаџмента, маркетинга, финансија и других сродних области, прилагођен потребама студената основних и мастер студија.'
        },
        {
            name: 'keywords',
            content: 'библиотека, доситеј, висока школа, економија, менаџмент, литература, студенти, академске студије, радно време библиотеке, научне публикације, маркетинг, предузетништво, финансије'
        },
        {
            name: 'author',
            content: 'Висока школа Доситеј'
        },
        {
            property: 'og:title',
            content: 'Библиотека - Висока школа академских студија „Доситеј“'
        },
        {
            property: 'og:description',
            content: 'Информације о раду библиотеке, доступној литератури и фондовима за студенте студијских програма из економских и бизнис области.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: 'https://vsdositej.edu.rs/biblioteka'
        },
        {
            property: 'og:image',
            content: 'https://vsdositej.edu.rs/assets/images/biblioteka-cover.jpg'
        },
        {
            name: 'twitter:card',
            content: 'summary_large_image'
        },
        {
            name: 'twitter:title',
            content: 'Библиотека - Висока школа Доситеј'
        },
        {
            name: 'twitter:description',
            content: 'Богата литература, радно време и ресурси за студенте – сазнајте више о библиотеци Високе школе „Доситеј“.'
        },
        {
            name: 'robots',
            content: 'index, follow'
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: 'https://vsdositej.edu.rs/biblioteka'
        }
    ]
});


import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {onMounted,ref} from 'vue';
import {initFlowbite} from "flowbite";
import Accordian from "@/components/myComponents/ui/Accordian.vue";
import Table from "@/components/myComponents/ui/Table.vue";
const weekdays = ref([
    { name: 'Понедељак', hours: '08:00 – 17:00' },
    { name: 'Уторак',hours: '08:00 – 17:00' },
    { name: 'Среда',hours: '08:00 – 17:00' },
    { name: 'Четвртак',hours: '08:00 – 17:00' },
    { name: 'Петак',hours: '08:00 – 17:00' }
])

const weekend = ref([
    { name: 'Субота', hours: '10:00 – 12:00' },
    { name: 'Недеља', hours: 'затворено' },
])

const sections = ref([
    {
        key: 1,
        title: "Радни дан",
        payload: {
            datas : weekdays.value,
            headers : [
                {
                "id":1,
                "title":"Дан",
                "name":'name'
                },
                {
                    "id":2,
                    "title":"Време",
                    "name":'hours'
                }
            ]
        },
        component : Table
    },
    {
        key: 2,
        title: "Викенд",
        payload:{
            datas : weekend.value,
            headers : [
                {
                    "id":1,
                    "title":"Дан",
                    "name":'name'
                },
                {
                    "id":2,
                    "title":"Време",
                    "name":'hours'
                }
            ]
        },
        component : Table
        },
])

onMounted(()=>{
    initFlowbite();
})
</script>
<style scoped>


</style>
