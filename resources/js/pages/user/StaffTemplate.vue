<template>
    <my-layout>
        <header-title>
            <p class="strong">{{ osoba.name }}</p>
        </header-title>
        <div class="staff-block mx-auto max-w-screen-xl grid grid-cols-1 md:!grid-cols-[20%_70%] justify-center gap-10">
            <div class="left-content !text-center sm:!text-left">
                <div class="img-block">
                    <div class="img text-center">
                        <img v-if="osoba.photo_path" :src="'/storage/'+osoba.photo_path" class=" w-75 h-auto rounded-lg boder border-red-800/60 border-[3px] shadow-md"  :alt="osoba.name"/>
                        <img v-else src="/assets/img/userIcon.jpg" class="w-75 h-auto rounded-lg boder border-red-800/60 border-[3px] shadow-md" alt="userIcon"/>
                    </div>
                    <div class="block">
                        <h3 class="font-bold">{{osoba.name}}</h3>
                    </div>
                </div>
                <div class="mt-10 p-1 documents-block border border-gray-500/20">
                    <h3>Dokumenti</h3>
                    <template v-if="osoba.documents.length">
                        <ul class="px-2 py-5" v-for="dokument in osoba.documents">
                            <li class="flex items-center hover:text-red-800 transition">
                                <PhMicrosoftWordLogo v-if="dokument.type === 'doc' || dokument.type === 'docx'"></PhMicrosoftWordLogo>
                                <a :href="'/storage/'+dokument.file_path"> {{dokument.title}}</a>
                            </li>
                        </ul>
                    </template>
                    <template v-else>
                        <p class="text-sm text-gray-500">Тренутно нема документата</p>
                    </template>
                </div>
            </div>
            <div class=" content-block">

                <p v-html="osoba.bio"></p>


            </div>

        </div>

    </my-layout>
</template>
<script setup>
import {defineProps, onMounted} from 'vue';
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import MyLayout from "@/layouts/myLayout.vue";
import {PhMicrosoftWordLogo} from "@phosphor-icons/vue";
    defineProps({
        osoba : Object
    })
onMounted(()=>{
    initFlowbite();
})
</script>
