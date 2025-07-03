<template>
    <my-layout>
        <header-title>
            <p class="strong">Важни документи</p>
        </header-title>
        <div class="importatnt-documents-block  mx-auto max-w-screen-xl" >
            <div class="document my-5" v-for="document in documents" :key="document.id">
                <h4><a class="hover:text-red-800 transition flex items-center gap-2" :href="document.href"><PhFile :size="22" /> {{document.name}} </a></h4>
            </div>
        </div>
    </my-layout>
</template>
<script setup lang="ts">

import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {onMounted, reactive} from 'vue';
import {initFlowbite} from "flowbite";
import {PhFile} from "@phosphor-icons/vue";
onMounted(()=>{
    initFlowbite();
})

const documents = reactive([
    {
        "id":1,
        "name":"Статут 4.12.2023",
        "href":"/assets/files/Statut.pdf"
    },
    {
        "id":2,
        "name":"Дозвола за рад 31.05.2016.",
        "href":"/assets/files/Дозвола-за-рад-31.05.2016..pdf"
    },
    {
        "id":3,
        "name":"Политика обезбеђења квалитета 09.02.2017.",
        "href":"/assets/files/Политика-обезбеђења-квалитета-09.02.2017..pdf"
    },
    {
        "id":4,
        "name":"Уверење о акредитацији 9.02.2018.",
        "href":"/assets/files/Уверење-о-акредитацији-9.02.2018..pdf"
    },
    {
        "id":5,
        "name":"Правилник о самовредновању и обезбеђењу квалитета 3.2.2020.",
        "href":"/assets/files/"
    },
    {
        "id": 6,
        "name": "Правилник о раду комисије за обезбеђивање квалитета 3.2.2020.",
        "href":"/assets/files/Правилник-о-раду-комисије-за-обезбеђивање-квалитета-3.2.2020.pdf"
    },
    {
        "id":7,
        "name":"План научноистраживачког рада 27.10.2022.",
        "href":"/assets/files/План-научноитраживачког-рада-27.10.2022.pdf"
    },
    {
        "id":8,
        "name":"Финансијски план 29.11.2023.",
        "href":"/assets/files/Финансијски-план-29.11.2023..pdf"
    }
])

</script>
