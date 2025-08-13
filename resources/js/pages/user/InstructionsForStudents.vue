<template>
    <my-layout>
        <header-title>
            <p class="strong">Обрасци</p>
        </header-title>
        <div class="instructions-for-students-block  mx-auto max-w-screen-xl" >
            <div class="obrasci my-10">
                <h3 class="text-xl text-gray-500">Обрасци</h3>
                <div class="document">
                    <h4 class="my-3"><a class="hover:text-red-800 transition flex items-center gap-2" href="/assets/files/Obrazac-za-prijavu-zavrsnog-rada-I-stepena.doc"><PhMicrosoftWordLogo :size="22" /> Образац за пријаву завршног рада </a></h4>
                    <h4 class="my-3"><a class="hover:text-red-800 transition flex items-center gap-2" href="/assets/files/Obrazac-za-prijavu-zavrsnog-rada-na-master-studijama.doc"><PhMicrosoftWordLogo :size="22" /> Образац за пријаву завршног мастер рада </a></h4>
                </div>
            </div>
            <div class="upustva my-10">
                <h3 class="text-xl text-gray-500">Упуства</h3>
                <div class="document ">
                    <h4 class="my-3"><a class="hover:text-red-800 transition flex items-center gap-2" href="/assets/files/Uputstvo-za-izradu-zavrsnog-rada.doc"><PhMicrosoftWordLogo :size="22" /> Упуство за израду завршног рада </a></h4>
                    <h4 class="my-3"><a class="hover:text-red-800 transition flex items-center gap-2" href="/assets/files/UPUTSTVO-ZA-PRIJAVU-MASTER-RADA.doc"><PhMicrosoftWordLogo :size="22" />Упуство за <span class="font-bold">пријаву</span> завршног мастер рада </a></h4>
                    <h4 class="my-3"><a class="hover:text-red-800 transition flex items-center gap-2" href="/assets/files/UPUTSTVO-ZA-IZRADU-ZAVRSNOG-RADA-NA-MASTER-STUDIJAMA.doc"><PhMicrosoftWordLogo :size="22" />Упуство за <span class="font-bold">израду</span> завршног мастер рада </a></h4>
                </div>
            </div>

        </div>
    </my-layout>
</template>
<script setup lang="ts">

import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {onMounted} from "vue";
import {initFlowbite} from "flowbite";
import {PhMicrosoftWordLogo} from "@phosphor-icons/vue";
import {useHead} from "@vueuse/head";
import {useRoute} from "ziggy-js";

const route = useRoute();
useHead({
    title: 'Обрасци и упутства – Висока школа „Доситеј“',
    meta: [
        {
            name: 'description',
            content:
                'Преузмите обрасце и упутства за пријаву и израду завршног рада и мастер рада на Високој школи академских студија „Доситеј“.'
        },
        {
            name: 'keywords',
            content:
                'обрасци, упутства, пријава завршног рада, мастер рад, документи за студенте, Доситеј, студије'
        },
        {
            name: 'robots',
            content: 'index, follow'
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: `https://vsdositej.edu.rs/biblioteka`
        }
    ]
});
onMounted(()=>{
    initFlowbite();
})



</script>
