<template>
    <my-layout>
        <header-title>
            <p class="strong">Студијски програми</p>
        </header-title>
        <div class="mx-auto max-w-screen-xl flex flex-col">
            <div class="study-block border border-gray-500 rounded shadow-lg p-2 flex my-10 flex-col sm:flex-row">
                <div class="img-block !w-90 sm:!w-100 !mx-auto sm:!mx-0">
                    <img src="/assets/img/ekonomija.jpg" class="w-full rounded" alt="ekonomija"/>
                </div>
                <div class="header-block">
                    <h2 class="ml-10 !text-lg sm:!text-xl md:!text-2xl text-shadow">Економија</h2>
                </div>
                <div class="button-block self-end ml-auto">
                    <Link class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 !text-xs sm:!text-lg rounded hover:bg-orange-50 transition" href="/studijski-programi/ekonomija">Прочитај више</Link>
                </div>
            </div>
            <div class="study-block border border-gray-500 rounded shadow-lg p-2 flex my-10 flex-col sm:flex-row">
                <div class="img-block !w-90 sm:!w-100 !mx-auto sm:!mx-0">
                    <img src="/assets/img/info.jpg" class="w-full rounded" alt="ekonomija"/>
                </div>
                <div class="header-block">
                    <h2 class="ml-10 !text-lg sm:!text-xl md:!text-2xl text-shadow">Информатика</h2>
                </div>
                <div class="button-block self-end ml-auto">
                    <Link class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 !text-xs sm:!text-lg rounded hover:bg-orange-50 transition" href="/studijski-programi/ekonomija">Прочитај више</Link>
                </div>
            </div>
            <div class="study-block border border-gray-500 rounded shadow-lg p-2 flex my-10 flex-col sm:flex-row">
                <div class="img-block !w-90 sm:!w-100 !mx-auto sm:!mx-0">
                    <img src="/assets/img/ekonomija.jpg" class="w-full rounded" alt="ekonomija"/>
                </div>
                <div class="header-block">
                    <h2 class="ml-10 !text-lg sm:!text-xl md:!text-2xl text-shadow">Економија (Мастер)</h2>
                </div>
                <div class="button-block self-end ml-auto">
                    <Link class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 !text-xs sm:!text-lg rounded hover:bg-orange-50 transition" href="/studijski-programi/ekonomija-master">Прочитај више</Link>
                </div>
            </div>
            <div class="study-block border border-gray-500 rounded shadow-lg p-2 flex my-10 flex-col sm:flex-row">
                <div class="img-block !w-90 sm:!w-100 !mx-auto sm:!mx-0">
                    <img src="/assets/img/informatika-2.jpg" class="w-full rounded" alt="ekonomija"/>
                </div>
                <div class="header-block">
                    <h2 class="ml-10 !text-lg sm:!text-xl md:!text-2xl text-shadow">Информатика (Мастер)</h2>
                </div>
                <div class="button-block self-end ml-auto">
                    <Link class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 !text-xs sm:!text-lg rounded hover:bg-orange-50 transition" href="/studijski-programi/informatika-master">Прочитај више</Link>
                </div>
            </div>


        </div>
    </my-layout>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {useHead} from "@vueuse/head";
import {onMounted} from "vue";
import { initFlowbite } from 'flowbite';
onMounted(()=>{
    initFlowbite();
})


useHead({
    title: 'Студијски програми | Виша школа академских студија Доситеј',
    meta: [
        // Primary meta tags
        {
            name: 'description',
            content: 'Студијски програми Више школе академских студија Доситеј: Економија, Информатика и мастер студије. Пријавите се за нову школску годину.'
        },
        {
            name: 'keywords',
            content: 'студијски програми, економија, информатика, мастер студије, висока школа, Доситеј'
        },

        // Open Graph / Facebook
        {property: 'og:type', content: 'website'},
        {property: 'og:title', content: 'Студијски програми | Виша школа академских студија Доситеј'},
        {
            property: 'og:description',
            content: 'Упишите се на студијске програме економије и информатике на Вишој школи академских студија Доситеј'
        },
        {property: 'og:url', content: 'https://www.vsdositej.edu.rs/studijski-programi'},
        {property: 'og:image', content: 'https://www.vsdositej.edu.rs/assets/img/og-image.jpg'},

        // Twitter
        {name: 'twitter:card', content: 'summary_large_image'},
        {name: 'twitter:title', content: 'Студијски програми | Виша школа академских студија Доситеј'},
        {name: 'twitter:description', content: 'Студијски програми Више школе академских студија Доситеј'},
        {name: 'twitter:image', content: 'https://www.vsdositej.edu.rs/assets/img/twitter-image.jpg'},

        // Additional tags
        {name: 'author', content: 'Виша школа академских студија Доситеј'},
        {name: 'robots', content: 'index, follow'},
        {name: 'revisit-after', content: '7 days'},

        // Canonical URL
        {rel: 'canonical', href: 'https://www.vsdositej.edu.rs/studijski-programi'}
    ],
    link: [
        {rel: 'canonical', href: 'https://www.vsdositej.edu.rs/studijski-programi'}
    ]
});

</script>
