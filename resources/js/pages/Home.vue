<script setup lang="ts">
import MyLayout from "@/layouts/myLayout.vue";
import Button from "@/components/ui/button/Button.vue";
import NoticesCarousel from "@/components/ui/myComponents/NoticesCarousel.vue";
import {onMounted, ref} from "vue";
import { useHead } from '@vueuse/head';
import axios from "axios";
import { initFlowbite } from 'flowbite';
import {Link} from "@inertiajs/vue3";
import {PhEnvelope, PhPhone, PhPhoneCall} from "@phosphor-icons/vue";

useHead({
    title: "Висока школа академских студија Доситеј - Почетна",
    meta: [
        { name: 'description', content: 'Званична почетна страна Високе школе академских студија Доситеј. Информације о студијским програмима, обавештењима и пријавама.' },
        { name: 'keywords', content: 'Доситеј, академија, висока школа, студије, економија, информатика, пријава, обавештења' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1.0' }
    ],
    link: [
        { rel: 'icon', type: 'image/png', href: '/assets/img/logobordo.png' },
        { rel: 'shortcut icon', type: 'image/png', href: '/assets/img/logobordo.png' }
    ]
})

const notices = ref([]);
const spinner = ref(false);
const getAllNotices = async ()=>{
    spinner.value = true;
    const response = await axios.get('/obavestenjaApp');

    const noticesAll = response.data.obavestenja;

    notices.value = noticesAll;
    spinner.value = false;
}

onMounted(async ()=>{
    initFlowbite();
    await getAllNotices();

})



</script>

<template>
    <my-layout>
        <div id="default-carousel" class="relative  w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative z-20 h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Slide 1 -->
                <div class="hidden duration-700 ease-in-out z-20" data-carousel-item>
                    <img
                        src="/assets/img/slikaSlajder1.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slika 1"
                    />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="flex flex-col text-white text-center p-6 rounded bg-black/40 opacity-0 transition-opacity duration-700 ease-in-out"
                             data-carousel-item-visible="true">
                            <Link href="/akreditacija" class="hover:text-red-800 transition text-2xl md:text-4xl font-bold">Акредитовано</Link>
                            <Link href="/prijava"><button type="submit" class="cursor-pointer mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition">Пријави се</button></Link>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="hidden duration-700 ease-in-out z-20" data-carousel-item>
                    <img
                        src="/assets/img/slikaSlajder2.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slika 2"
                    />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-white text-center p-6 rounded bg-black/40 opacity-0 transition-opacity duration-700 ease-in-out"
                             data-carousel-item-visible="true">
                            <h2 class="text-2xl md:text-4xl font-bold">Будите корак испред - Доситеј академија,<br/> место где знање и технологија обликују будућност!</h2>
                            <Link href="/prijava"><button type="submit" class="cursor-pointer mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition">Пријави се</button></Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="notification-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="!text-2xl sm:!text-3xl text-gray-950 font-medium">Обавештења
                    <span class="underline w-1/12 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
                <div class="all-notices">
                    <Link class="mt-3 inline-block text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition cursor-pointer" href="/sva-obavestenja?all=1" >Погледај сва обавештења</Link>
                </div>
            </div>
                <NoticesCarousel :spinner="spinner" :notices="notices" />
        </div>
        <div data-aos="fade-left" class="contact-info-block mx-auto max-w-screen-xl my-15">
            <div class="header-block my-10">
                <h2 class="!text-2xl sm:!text-3xl text-gray-950 font-medium">Стојимо вам на располагању
                    <span class="underline w-1/12 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
                <h3 class="!text-xl sm:!text-2xl mt-5 text-gray-500">Можете нас контактирати путем телефона, имејла, контакт форме или нас лично посетити у <a class="font-bold hover:text-red-800 transition" href="https://www.google.com/maps/place/%D0%9D%D1%83%D1%88%D0%B8%D1%9B%D0%B5%D0%B2%D0%B0+12a,+%D0%91%D0%B5%D0%BE%D0%B3%D1%80%D0%B0%D0%B4+11000/@44.8138225,20.4608052,17.23z/data=!4m6!3m5!1s0x475a7ab1e1862623:0x4a8b8e9bd64f6dd5!8m2!3d44.8140885!4d20.4624288!16s%2Fg%2F11q2nf2_9y?entry=ttu&g_ep=EgoyMDI1MDYyMy4yIKXMDSoASAFQAw%3D%3D">Нушићева 12a, Булевар Војводе путника 7</a> </h3>
            </div>
            <div  class="content-block grid grid-cols-1 sm:grid-cols-2 grid-rows-2 gap-10">
                <div class="info flex items-center gap-3 justify-start sm:justify-center">
                    <div class="img-block">
                        <PhPhoneCall :size="42" weight="light" />
                    </div>
                    <div class="content !text-lg sm:!text-xl">
                        <h4 class="font-bold text-red-800 my-2">Студентска служба - Упис</h4>
                        <p class="text-gray-500 mb-4">Радним данима од 09 до 16 часова</p>
                        <p class="text-gray-500 mb-4 flex items-center gap-2"> +381 113235500</p>
                    </div>
                </div>
                <div class="info flex items-center gap-3 justify-start sm:justify-center">
                    <div class="img-block">
                        <PhEnvelope :size="42" weight="light"/>
                    </div>
                    <div class="content !text-lg sm:!text-xl">
                        <h4 class="font-bold text-red-800 my-2">Електронска пошта</h4>
                        <p class="text-gray-500 mb-4">Радним данима од 09 до 16 часова</p>
                        <p class="text-gray-500 mb-4 flex items-center gap-2"> office@vsdositej.edu.rs</p>
                    </div>
                </div>
                <div class="info flex items-center gap-3 justify-start sm:justify-center">
                    <div class="img-block">
                        <PhPhoneCall :size="42" weight="light" />
                    </div>
                    <div class="content !text-lg sm:!text-xl">
                        <h4 class="font-bold text-red-800 my-2">За сваки тип питања</h4>
                        <p class="text-gray-500 mb-4">Радним данима од 09 до 16 часова</p>
                        <p class="text-gray-500 mb-4 flex items-center">+381 113235500</p>
                    </div>
                </div>
                <div class="info flex items-center gap-3 justify-start sm:justify-center">
                    <div class="img-block">
                        <PhPhoneCall :size="42" weight="light" />
                    </div>
                    <div class="content !text-lg sm:!text-xl">
                        <h4 class="font-bold text-red-800 my-2">Декант</h4>
                        <p class="text-gray-500 mb-4">Радним данима од 10 до 14 часова</p>
                        <p class="text-gray-500 mb-4 flex items-center">+381 113235500</p>
                    </div>
                </div>
            </div>
        </div>
        <div data-aos="fade-up" class="smerovi mx-auto max-w-screen-xl">
            <div  class="header-bigger-block text-gray-950 text-center my-10">
                <h2 class="!text-2xl sm:!text-3xl font-medium"><strong class="font-bold">Основне</strong> академске студије </h2>
                <span class="underline mx-auto w-1/9 bg-red-800 h-1 block rounded-sm"></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 place-items-center gap-10 smerovi-dva justify-center text-gray-900 ">
                <div class="smer relative overflow-hidden !w-[85%] sm:!w-[60%] shadow-lg grid grid-flow-row group hover:scale-105 transition-transform rounded-lg border-2 border-red-800/40">
                    <span class="absolute top-0 left-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200"></span>
                    <span class="absolute top-0 right-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-100"></span>
                    <span class="absolute bottom-0 right-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200 delay-200"></span>
                    <span class="absolute bottom-0 left-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-300"></span>
                    <div class="img-block text-center h-100">
                        <img src="/assets/img/ekonomija.jpg"
                             class="w-full h-full object-cover rounded-t-lg"
                             alt="ekonomski-smer"/>
                    </div>
                    <div class="content-block p-5 flex justify-between items-center">
                        <h3 class="text-xl">Економски смер</h3>
                        <Link href="/ekonomija"
                              class="border rounded py-1 px-2 border-red-800 cursor-pointer hover:bg-orange-50 transition">
                            Сазнај више
                        </Link>
                    </div>
                </div>
                <div class="smer relative overflow-hidden !w-[85%] sm:!w-[60%] shadow-lg grid grid-flow-row group hover:scale-105 transition-transform rounded-lg border-2 border-red-800/40">
                    <span class="absolute top-0 left-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200"></span>
                    <span class="absolute top-0 right-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-100"></span>
                    <span class="absolute bottom-0 right-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200 delay-200"></span>
                    <span class="absolute bottom-0 left-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-300"></span>
                    <div class="img-block h-100">
                        <img src="/assets/img/info.jpg" class="h-full w-full object-cover rounded-t-lg" alt="it-smer"/>
                    </div>
                    <div class="content-block p-5 flex justify-between items-center">
                        <h3 class="text-xl">Информациони смер</h3>
                        <Link href="/informatika" class="border rounded py-1 border-red-800 px-2 cursor-pointer hover:bg-orange-50 transition">Сазнај више</Link>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative banner
         bg-[url('/assets/img/slikaSlajder2.jpg')]
         bg-center bg-fixed bg-cover
         h-24 my-10 text-center py-7"
        >
            <div class="absolute inset-0 bg-red-800 opacity-40 pointer-events-none"></div>
            <Link
                class="relative text-gray-50 font-bold text-2xl uppercase hover:text-red-800 text-shadow-lg transition"
                href="/prijava"
            >
                Акредитовано, упиши се
            </Link>
        </div>
        <div data-aos="fade-up" class="smerovi mx-auto max-w-screen-xl">
            <div  class="header-bigger-block text-gray-950 text-center my-10">
                <h2 class="text-3xl font-medium"><strong class="font-bold">Мастер</strong> академске студије </h2>
                <span class="underline mx-auto w-1/9 bg-red-800 h-1 block rounded-sm"></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 place-items-center gap-10 smerovi-dva justify-center text-gray-900 ">
                <div class="smer relative overflow-hidden !w-[85%] sm:!w-[60%] shadow-lg grid grid-flow-row group hover:scale-105 transition-transform rounded-lg border-2 border-red-800/40">
                    <span class="absolute top-0 left-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200"></span>
                    <span class="absolute top-0 right-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-100"></span>
                    <span class="absolute bottom-0 right-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200 delay-200"></span>
                    <span class="absolute bottom-0 left-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-300"></span>
                    <div class="img-block text-center h-100">
                        <img src="/assets/img/ekonomija.jpg" class="w-full h-full object-cover rounded-t-lg" alt="ekonomski-smer"/>
                    </div>
                    <div class="content-block p-5 flex justify-between items-center">
                        <h3 class="text-xl">Економски смер</h3>
                        <Link href="/ekonomija-master" class="border rounded py-1 border-red-800 px-2 cursor-pointer hover:bg-orange-50 transition">Сазнај више</Link>
                    </div>
                </div>
                <div class="smer relative overflow-hidden !w-[85%] sm:!w-[60%] shadow-lg grid grid-flow-row group hover:scale-105 transition rounded-lg border-2 border-red-800/40">
                    <span class="absolute top-0 left-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200"></span>
                    <span class="absolute top-0 right-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-100"></span>
                    <span class="absolute bottom-0 right-0 h-[2px] bg-red-800 w-0 group-hover:w-full transition-all duration-200 delay-200"></span>
                    <span class="absolute bottom-0 left-0 w-[2px] bg-red-800 h-0 group-hover:h-full transition-all duration-200 delay-300"></span>
                    <div class="img-block h-100">
                        <img src="/assets/img/info.jpg" class="w-full h-full object-cover rounded-t-lg" alt="it-smer"/>
                    </div>
                    <div class="content-block p-5 flex justify-between items-center">
                        <h3 class="text-xl">Информациони смер</h3>
                        <Link href="/informatika-master" class="border rounded py-1 border-red-800 px-2 cursor-pointer hover:bg-orange-50 transition">Сазнај више</Link>
                    </div>
                </div>
            </div>
        </div>
    </my-layout>
</template>

<style>
/* Dodajemo CSS za anmaciju prikazivanja tekstualnog bloka */
[data-carousel-item-visible="true"] {
    opacity: 1;
}
</style>
