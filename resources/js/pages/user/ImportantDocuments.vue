<template>
    <my-layout>
        <header-title>
            <p class="strong">Важни документи</p>
        </header-title>
        <div class="importatnt-documents-block  mx-auto max-w-screen-xl" >
            <div class="document my-5" v-for="document in documents" :key="document.id">
                <h4 class="!text-sm sm:text-md"><a class="hover:text-red-800 transition flex items-center gap-2 justify-start" :href="document.href"><PhFile class="w-8 sm:w-10 !text-left" :size="22" /> {{document.name}} </a></h4>
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
        "href":"/assets/files/Dovola-za-rad-31.05.2016..pdf"
    },
    {
        "id":3,
        "name":"Политика обезбеђења квалитета 09.02.2017.",
        "href":"/assets/files/Politika-obezbeđenja-kvaliteta-09.02.2017..pdf"
    },
    {
        "id":4,
        "name":"Уверење о акредитацији 9.02.2018.",
        "href":"/assets/files/Uverenje-o-akreditacija-9.02.2018..pdf"
    },
    {
        "id":5,
        "name":"Правилник о самовредновању и обезбеђењу квалитета 3.2.2020.",
        "href":"/assets/files/Pravilnik-o-samovrednovanju-i-obezbedjenju-kvaliteta.pdf"
    },
    {
        "id": 6,
        "name": "Правилник о раду комисије за обезбеђивање квалитета 3.2.2020.",
        "href":"/assets/files/Pravilnik-o-radu-komisije-za-obezbeđivanje-kvaliteta-3.2.2020..pdf"
    },
    {
        "id":7,
        "name":"План научноистраживачког рада 27.10.2022.",
        "href":"/assets/files/Plan-naučnoistraživačkog-rada-27.10.2022..pdf"
    },
    {
        "id":8,
        "name":"Финансијски план 29.11.2023.",
        "href":"/assets/files/Finansijski-plan-29.11.2023..pdf"
    }
])

</script>
