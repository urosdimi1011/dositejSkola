<template>
    <my-layout>
        <div class="application-block">
            <header-title>
                <strong class="font-bold">Пријава</strong>
            </header-title>
            <div class="form-block  mx-auto max-w-screen-xl">
                <Form @submit="submit" class=" mx-auto !w-full sm:!w-full !px-5 sm:!px-0" :validation-schema="schema">
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="ime" id="ime" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="ime" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Име (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="ime" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="prezime" id="prezime" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="prezime" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Презиме (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="prezime" />

                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="roditelj" id="roditelj" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="roditelj" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Име једног родитеља (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="roditelj" />

                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="jmbg" id="jmbg" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="jmbg" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ЈМБГ (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="jmbg" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="date" name="datumRodjenja" id="datumRodjenja" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="datumRodjenja" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Датум рођења (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="datumRodjenja" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="mestoRodjenja" id="mestoRodjenja" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="mestoRodjenja" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Место рођења (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="mestoRodjenja" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="mestoStalnogRodjenja" id="mestoStalnogRodjenja" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="mestoRodjenje" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Место сталног становања (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="mestoStalnogRodjenja" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="mestoZaVremeStudiranja" id="mestoZaVremeStudiranja" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="mestoZaVremeStudiranja" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Место становања за време студирања (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="mestoZaVremeStudiranja" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="drzavljanstvo" id="drzavljanstvo" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="drzavljanstvo" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Државњанство (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="drzavljanstvo" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="nacionalnost" id="nacionalnost" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="nacionalnost" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Националност</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="nacionalnost" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="zavrsenaSrednjaSkola" id="zavrsenaSrednjaSkola" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="zavrsenaSrednjaSkola" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Завршена средња школа (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="zavrsenaSrednjaSkola" />
                    </div>
                    <div class="flex z-0 flex-wrap gap-3 mb-5 group">
                        <Label>Изаберите студијски програм:</Label>
                        <div class="flex w-full gap-3">
                            <Label for="ekonomija">Економија:</Label>
                            <Field id="ekonomija" name="st_program" type="radio" value="ekonomija" />
                        </div>
                        <div class="flex w-full gap-3">
                            <Label for="informatika">Информатика:</Label>
                            <Field id="informatika" name="st_program" type="radio" value="informatika" />
                        </div>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="category" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="mobilniTelefon" id="mobilniTelefon" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="mobilniTelefon" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Мобилни телефон (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="mobilniTelefon" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <Field type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-sm !text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Електронска пошта (обавезно)</label>
                        <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="email" />
                    </div>
                    <button type="submit" class="cursor-pointer mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition">Пријави се</button>
                </Form>
                <template v-if="messagesError != null">
                    <div class="error-block">
                        <ul>
                            <li class="text-red-800" v-for="message in messagesError.st_program">{{message}}</li>
                        </ul>
                    </div>
                </template>
            </div>
        </div>
    </my-layout>
</template>
<script setup>
import MyLayout from "@/layouts/myLayout.vue";
import {onMounted,ref} from "vue";
import {initFlowbite} from "flowbite";
import * as yup from "yup";
import {Form,Field,ErrorMessage} from 'vee-validate';
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import axios from "axios";
import { useHead } from '@vueuse/head';

useHead({
    title: 'Пријава за студије | Висока школа „Доситеј“',
    meta: [
        {
            name: 'description',
            content:
                'Попуните формулар за пријаву на Високу школу „Доситеј“. Потребне су основне информације: име, презиме, ЈМБГ, контакт и избор студијског програма.'
        },
        {
            property: 'og:title',
            content: 'Пријава за студије | Висока школа „Доситеј“'
        },
        {
            property: 'og:description',
            content:
                'Онлајн пријава за упис на Високу школу „Доситеј“ – економија или информатика. Унесите своје податке и започните процес пријаве.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: 'https://vsdositej.edu.rs/prijava'
        },
        {
            property: 'og:image',
            content: 'https://vsdositej.edu.rs/favicon.ico' // ako postoji slika
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: 'https://vsdositej.edu.rs/prijava'
        }
    ]
});
onMounted(()=>{
    initFlowbite();
})

const messagesError = ref(null);


const schema = yup.object({
    ime: yup
        .string()
        .required('Молимо унесите име.'),

    prezime: yup
        .string()
        .required('Молимо унесите презиме.'),

    roditelj: yup
        .string()
        .required('Молимо унесите име једног родитеља.'),

    jmbg: yup
        .string()
        .required('Молимо унесите ЈМБГ.')
        .matches(/^\d{13}$/, 'ЈМБГ мора да садржи тачно 13 цифара.'),

    datumRodjenja: yup
        .date()
        .required('Молимо унесите датум рођења.'),

    mestoRodjenja: yup
        .string()
        .required('Молимо унесите место рођења.'),

    mestoStalnogRodjenja: yup
        .string()
        .required('Молимо унесите место сталног становања.'),

    mestoZaVremeStudiranja: yup
        .string()
        .required('Молимо унесите место становања за време студирања.'),

    drzavljanstvo: yup
        .string()
        .required('Молимо унесите држављанство.'),

    nacionalnost: yup
        .string()
        .required('Молимо унесите националност.'),

    st_program : yup.string().required('Morate odabrati jedan studijski program'),


    zavrsenaSrednjaSkola: yup
        .string()
        .required('Молимо унесите информацију о завршеној средњој школи.'),

    mobilniTelefon: yup
        .string()
        .required('Молимо унесите мобилни телефон.'),

    email: yup
        .string()
        .required('Молимо унесите електронску пошту.')
        .email('Унесите валидан email адрес.'),
});

const submit = async (values)=>{
    try{
        const response = await axios.post('/prijaviStudenta',values);
    }
    catch (ex){
        messagesError.value  = ex.response.data.errors;
    }
}
</script>
