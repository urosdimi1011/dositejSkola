<template>
    <my-layout>
            <div>
                <header-title>
                    <strong class="font-bold">Контакт</strong>
                </header-title>
<!--                <div class="header-bigger-block text-gray-950 text-center my-10">-->
<!--                    <h1 class="text-3xl font-medium"><strong class="font-bold">Kontakt</strong> </h1>-->
<!--                    <span class="underline mx-auto w-1/9 bg-red-800 h-1 block rounded-sm"></span>-->
<!--                </div>-->
                <div class="flex gap-2 justify-between mx-auto max-w-screen-xl">
                    <div class="contact-info-block w-1/2">
                        <ul>
                            <li class="flex items-center gap-2 my-6">
                                <PhMapPinSimpleArea :size="32" /> Нушићева бр.12а
                            </li>
                            <li class="flex items-center gap-2 my-6">
                                <PhMapPinSimpleArea :size="32" /> Булевар војводе Путника бр.7
                            </li>
                            <li class="flex items-center gap-2 my-6">
                                <PhPhone :size="32" />
                                <ul>
                                    <li>
                                        <strong>Телефон школе:</strong> +381 113235500
                                    </li>
                                    <li>
                                        <strong>Студентска служба:</strong> +381 641907792; +381 604442896
                                    </li>
                                    <li>
                                        <strong>Упис:</strong> +381 113235500
                                    </li>
                                </ul>
                            </li>
                            <li class="flex items-center gap-2 my-6">
                                <PhEnvelope :size="32" />
                                <ul>
                                    <li>
                                        <strong>vsdositej@yahoo.com</strong>
                                    </li>
                                </ul>
                            </li>
                            <li class="flex items-center gap-2 my-6">
                                PIB: <strong>109692674</strong>
                            </li>
                            <li class="flex items-center gap-2 my-6">
                                <PhBank :size="32" />
                                <ul>
                                    <li>
                                        Текући рачун – Eкономија: <strong>265-3300310004276 – 83</strong>
                                    </li>
                                    <li>
                                        Текући рачун – Информатика: <strong>265-3300310004422 – 33</strong>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <Form @submit="submit" class="max-w-md mx-auto w-1/2" :validation-schema="schema">
                        <div class="relative z-0 w-full mb-5 group">
                            <Field type="email" name="firstName" id="firstName" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="firstName" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ваше име</label>
                            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="firstName" />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <Field type="text" name="lastName" id="lastName" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="lastName" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ваше презиме</label>
                            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="lastName" />

                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <Field type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="email" />

                        </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <Field type="text" name="topic" id="topic" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="topic" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Тема</label>
                                <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="topic" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <textarea name="message" id="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                                <label for="message" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ваша порука</label>
                                <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="message" />

                            </div>
                        <button type="submit" class="cursor-pointer mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition">Пошаљи поруку</button>
                    </Form>
                </div>
                <div  class="about-maps">
                    <div  class="header-bigger-block text-gray-950 text-center my-10">
                        <h2 class="text-3xl font-medium"><strong class="font-bold">Мапа</strong>  </h2>
                        <span class="underline mx-auto w-1/30 bg-red-800 h-1 block rounded-sm"></span>
                    </div>
                    <div class="maps w-full">
                        <iframe class="w-full h-120" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Nu%C5%A1i%C4%87eva%2012a%20Beograd+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        <a href="https://www.acadoo.de/leistungen/ghostwriter-doktorarbeit/"></a>
                    </div>
                </div>
        </div>
    </my-layout>
</template>
<script setup>
import MyLayout from "@/layouts/myLayout.vue";
import {Form,Field,ErrorMessage} from 'vee-validate';
import {PhBank, PhEnvelope, PhMapPinSimpleArea, PhPhone} from "@phosphor-icons/vue";
import * as yup from 'yup';
import {onMounted} from "vue";
import {initFlowbite} from "flowbite";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import { useHead } from "@vueuse/head";

const schema = yup.object({
    firstName: yup
        .string()
        .trim()
        .min(2, 'Vaše ime mora sadržati najmanje 2 karaktera.')
        .max(50, 'Vaše ime može sadržati najviše 50 karaktera.')
        .matches(/^[A-Za-zŠĐČĆŽšđčćž\s]+$/, 'Vaše ime može sadržati samo slova i razmake.')
        .required('Molimo unesite Vaše ime.'),

    lastName: yup
        .string()
        .trim()
        .min(2, 'Vaše prezime mora sadržati najmanje 2 karaktera.')
        .max(50, 'Vaše prezime može sadržati najviše 50 karaktera.')
        .matches(/^[A-Za-zŠĐČĆŽšđčćž\s]+$/, 'Vaše prezime može sadržati samo slova i razmake.')
        .required('Molimo unesite Vaše prezime.'),

    email: yup
        .string()
        .trim()
        .email('Molimo unesite ispravnu email adresu.')
        .required('Email je obavezan.'),

    topic: yup
        .string()
        .trim()
        .min(5, 'Tema mora sadržavati najmanje 5 karaktera.')
        .max(100, 'Tema može sadržavati najviše 100 karaktera.')
        .required('Molimo unesite temu.'),

    message: yup
        .string()
        .trim()
        .min(10, 'Poruka mora sadržavati najmanje 10 karaktera.')
        .max(500, 'Poruka može sadržavati najviše 500 karaktera.')
        .required('Molimo unesite Vašu poruku.'),
});


useHead({
    title: 'Контакт | Висока школа „Доситеј“',
    meta: [
        {
            name: 'description',
            content:
                'Контактирајте Високу школу „Доситеј“ – адресе, телефони, емаил и онлајн форма за слање упита. Погледајте локацију на мапи и сазнајте како да нас пронађете.'
        },
        {
            property: 'og:title',
            content: 'Контакт | Висока школа „Доситеј“'
        },
        {
            property: 'og:description',
            content:
                'Све потребне информације за контакт са Високом школом „Доситеј“ – Нушићева 12а и Булевар војводе Путника 7, телефони, емаил, и локација на мапи.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: 'https://vsdositej.edu.rs/kontakt'
        },
        {
            property: 'og:image',
            content: 'https://vsdositej.edu.rs/assets/images/kontakt-preview.jpg' // prilagodi ako imaš preview sliku
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: 'https://vsdositej.edu.rs/kontakt'
        }
    ]
});
const submit = (values)=>{
    console.log(values);
}


defineProps({
    breadcrumbs : Array
})

onMounted(()=>{
    initFlowbite();
})

</script>
