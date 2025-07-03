<template>
    <my-layout>
            <header-title>
                <strong class="font-bold">{{notice.title}}</strong>
            </header-title>
        <div class="max-w-screen-xl mx-auto">
            <div class="grid grid-cols-[70%_30%]">
                <div class="notice">
                    <p class="my-10" v-html="notice.content"></p>
                    <div class="info grid grid-cols-2">
                        <p><span class="uppercase text-shadow-xs color-for-text">kategorija</span><br/>{{notice.category}}</p>
                        <p><span class="uppercase text-shadow-xs color-for-text">datum objave</span><br/>{{formatDate(notice.created_at)}}</p>
                    </div>
                </div>
                <div class="details-block">
                    <div class="search-block mb-5">
                        <Form @submit="submit" class="max-w-md mx-auto" :validation-schema="simpleSchema">
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pretaži</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <Field type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pretraži objave..." required />
                                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pretraži</button>
                            </div>
                            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="search" />
                        </Form>
                    </div>
                    <div class="another-notice p-2">
                        <div class="header-block">
                            <h3 class="text-l text-gray-950 font-medium">Pogledajte ostale objave</h3>
                        </div>
                        <div class="another-notices-block">
                            <ul v-if="hasNotices" class="text-base">
                                <template v-if="notices.length">
                                    <li v-for="notice in notices" :key="notice.id" class="text-base my-3">
                                        <Link
                                            :href="`/obavestenja/${notice.slug}`"
                                            class="hover:text-gray-400 transition"
                                        >
                                            {{notice.title}}
                                            <p class="text-sm flex gap-4">
                                                <span><span class="uppercase text-shadow-xs color-for-text">Datum:</span> {{formatDate(notice.created_at)}}</span>
                                                <span><span class="uppercase text-shadow-xs color-for-text">Kategorija:</span> {{notice.category}}</span>
                                            </p>
                                        </Link>
                                    </li>
                                </template>
                                <template>
                                    <p>Trenutno nema dostupnih objava</p>
                                </template>

                            </ul>
                            <div
                                v-else
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </my-layout>
</template>
<script setup lang="ts">
import {onMounted, defineProps, ref, computed} from 'vue';
import {Form,Field,ErrorMessage} from 'vee-validate';
import * as yup from 'yup';
import {Inertia} from '@inertiajs/inertia'
const simpleSchema = yup.object({
    search: yup.string().required('Morate uneti tekst za pretragu').min(3,"Morate uneti minimum 3 karaktera").max(15,"Ne možete više uneti karaktera"),
})

interface Notice {
    id: number
    title: string
    content: string
    category: string,
    created_at: string
}
import MyLayout from "@/layouts/myLayout.vue";
import axios from "axios";
import {Link} from "@inertiajs/vue3";
import {initFlowbite} from "flowbite";
import {useHead} from "@vueuse/head";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
const props = defineProps<{ notice: Notice }>();
const notices = ref(null);
useHead({
    title: `${props.notice.title} | Обавештења`,
    meta: [
        {
            name: 'description',
            content: props.notice.content.replace(/<[^>]+>/g, '').slice(0, 150) + '...',
        },
    ],
})
const getAllNotices = async ()=>{

    const dataForSend = {
        'category':props.notice.category
    };

    const response = await axios.get('/obavestenjaApp',{
        params: dataForSend
    });

    const noticesAll = response.data.obavestenja;

    notices.value = noticesAll;
}

const submit = async (values)=>{
    Inertia.get('/sva-obavestenja',values,{ preserveState: true, preserveScroll: true });
}

onMounted(async ()=>{
    await getAllNotices();
    initFlowbite();
})

const hasNotices = computed(()=> notices.value != null);
const formatDate = (dateStr) => {
    const date = new Date(dateStr)
    return `${date.getDate().toString().padStart(2, '0')}.${(date.getMonth() + 1)
        .toString()
        .padStart(2, '0')}.${date.getFullYear()}`
}
</script>
<style scoped>
    .color-for-text{
        color:#ccc;
    }
    .another-notice{
        border-left: 1px solid rgba(0,0,0,0.2);
        position: relative;
    }
    .another-notice::before{
        content:"";
        position: absolute;
        top: 0;
        left: -1px;
        width: 2px;
        height: 2.5rem;
        background-color: oklch(.444 .177 26.899);
    }
</style>
