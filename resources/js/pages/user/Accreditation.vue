<template>
    <my-layout>
        <header-title>
            <p class="strong">Акредитација</p>
        </header-title>
        <div class="documents-block mx-auto max-w-screen-xl grid grid-cols-2">
            <div class="document my-5" v-for="document in documents" :key="document.id">
                <h4><a class="hover:text-red-800 transition flex items-center gap-2" :href="'/assets/files/'+document.href"><PhFile :size="22" /> {{document.name}} </a></h4>
            </div>
        </div>
    </my-layout>
</template>
<script setup lang="ts">

import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {PhFile} from "@phosphor-icons/vue";
import {ref, onMounted} from "vue";
import {initFlowbite} from "flowbite";

onMounted(()=>{
    initFlowbite();
})

const documents = ref([
    {
        "id":1,
        "name":"АКРЕДИТАЦИЈА СТУДИЈСКОГ ПРОГРАМА",
        "href":'akreditacija.pdf'
    },
    {
        "id":2,
        "name":"ЕКОНОМИЈА",
        "href":'akreditacija-ekonomija.pdf'
    },
    {
        "id":3,
        "name":"АКРЕДИТАЦИЈА СТУДИЈСКОГ ПРОГРАМА",
        "href":'akreditacija-stud-program.pdf'
    },
    {
        "id":4,
        "name":"ИНФОРМАТИКА",
        "href":'akreditacija-informatika.pdf'
    }
])

</script>
<style scoped>

</style>
