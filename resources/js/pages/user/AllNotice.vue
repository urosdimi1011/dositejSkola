<template>
    <WhenVisible data="notices" :buffer="500">
    <my-layout>
        <template #fallback>
            <div>Loading...</div>
        </template>
        <header-title><strong class="font-bold">Обавештења</strong></header-title>
        <div class="all-notice mx-auto max-w-screen-xl">
            <div v-if="search" class="search-input-user-block my-10">
                <div class="search-input-block">
                    <h3 class="text-2xl">Pretrazeno: <strong>{{search}}</strong></h3>
                </div>
            </div>

                <div v-if="hasNotices" class="notices">
                    <Link class="hover:text-gray-400 transition" v-for="notice in notices" :key="notice.id" :href="`/obavestenja/${notice.slug}`">
                        <Notice  :search="search" :notice="notice"></Notice>
                    </Link>
                </div>
                <div v-else>
                    <p class="text-xl">Nema rezlutata za pretragu</p>
                </div>
<!--            <nav class="mx-auto w-max my-5" aria-label="Page navigation example">-->
<!--                <ul class="inline-flex -space-x-px text-sm">-->
<!--                    <li>-->
<!--                        <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </nav>-->
        </div>
    </my-layout>
    </WhenVisible>

</template>
<script setup lang="ts">

import {computed, defineProps,onMounted} from 'vue';
import MyLayout from "@/layouts/myLayout.vue";
import Notice from "@/components/myComponents/ui/Notice.vue";
import {Link,WhenVisible} from "@inertiajs/vue3";
import {initFlowbite} from "flowbite";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";


onMounted(()=>{
    initFlowbite()
})

interface Notice {
    id: number
    title: string
    content: string
    category: string,
    created_at: string
}
const props = defineProps<{
    notices : Array<Notice>,
    search : {
        type: string,
        required : false,
        default : ''
    }
}>();

const hasNotices = computed(()=>props.notices.length > 0);

</script>
