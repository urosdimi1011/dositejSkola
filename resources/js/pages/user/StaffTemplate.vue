<template>
    <my-layout>
        <header-title>
            <p class="strong">{{ osoba.name }}</p>
        </header-title>
        <div class="staff-block mx-auto max-w-screen-xl grid grid-cols-1 md:!grid-cols-[25%_70%] justify-center gap-3">
            <div class="left-content !text-center sm:!text-left">
                <div class="img-block">
                    <div class="img text-center sm:!text-left">
                        <img v-if="osoba.photo_path" :src="'/storage/'+osoba.photo_path" class="inline-block w-75 h-auto rounded-lg boder border-red-800/60 border-[3px] shadow-md"  :alt="osoba.name"/>
                        <img v-else src="/assets/img/userIcon.jpg" class="w-75 h-auto rounded-lg boder border-red-800/60 border-[3px] shadow-md" alt="userIcon"/>
                    </div>
                    <div class="block text-sm">
                        <h3 class="font-bold">{{osoba.name}}</h3>
                        <a :href="'mailto:'+osoba.email" class="font-bold flex items-center hover:text-red-800 transition"><PhEnvelope size="20"/> {{osoba.email}} </a>
                    </div>
                </div>
                <div class="mt-10 p-1 documents-block border border-gray-500/20">
                    <h3 class="flex items-center gap-1"><PhFile :size="18" /> Dokumenti</h3>
                    <template v-if="osoba.documents.length">
                        <ul class="px-2 py-5" v-for="dokument in osoba.documents">
                            <li class="flex items-center hover:text-red-800 transition">
                                <PhMicrosoftWordLogo v-if="dokument.type === 'doc' || dokument.type === 'docx'"></PhMicrosoftWordLogo>
                                <a :href="'/storage/'+dokument.file_path"> {{dokument.title}}</a>
                            </li>
                        </ul>
                    </template>
                    <template v-else>
                        <p class="text-sm text-gray-500">Тренутно нема докумената</p>
                    </template>
                </div>
            </div>
            <div class="!p-2 sm:!p-0 content-block">
                <template v-if="osoba.bio !== ''">
                    <p class="break-words w-full" v-html="osoba.bio"></p>
                </template>
                <template v-else>
                    <p class="text-lg my-10 text-gray-500">Тренутно нема биографије о {{osoba.name}}</p>
                </template>
            </div>

        </div>

    </my-layout>
</template>
<script setup>
import {defineProps, onMounted, computed} from 'vue';
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import MyLayout from "@/layouts/myLayout.vue";
import {PhEnvelope, PhFile, PhMicrosoftWordLogo} from "@phosphor-icons/vue";
import {useHead} from "@vueuse/head";
    const props = defineProps({
        osoba : Object
    })
onMounted(()=>{
    initFlowbite();
})

const description = computed(() => {
    const raw = props.osoba.bio ?? ''
    const text = raw.replace(/<[^>]+>/g, '').trim()
    return text.length > 160 ? text.slice(0, 157) + '...' : text
})
useHead({
    title: `${props.osoba.name} | Visoka škola „Доситеј“`,
    meta: [
        { name: 'description', content: description.value },
        { property: 'og:title', content: `${props.osoba.name} | Visoka škola „Доситеј“` },
        { property: 'og:description', content: description.value },
        { property: 'og:type', content: 'profile' },
    ],
    link: [
        { rel: 'canonical', href: `https://vsdositej.edu.rs/osoblje/${props.osoba.name}` }
    ]
})
</script>
