<template>
    <header>
        <div class="bg-red-800">
            <div class="py-1 content mx-auto max-w-screen-xl">
                <ul class="flex gap-4">
                    <li>
                        <a class="text-sm text-gray-50 flex gap-2 items-center" href="mailto:office@vsdositej.edu.rs"><PhEnvelope :size="20" />office@vsdositej.edu.rs</a>
                    </li>
                    <li>
                        <a class="text-sm text-gray-50 flex gap-2 items-center" href="tel:+381 113235500"><PhPhoneCall :size="20" />+381 113235500</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/kuca.znanja/" target="_blank" class="text-sm text-gray-50 flex gap-2 items-center"><PhInstagramLogo :size="20" weight="light" /> kuca.znanja</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav :class="[ isSticky ? 'fixed top-0 left-0 shadow-md translate-y-0 !py-0 slide-down w-full z-50' : 'shadow-xl relative translate-y-0 z-50']" class="bg-white border-gray-200 px-4 lg:px-6 py-4.5 dark:bg-gray-50 text-md ">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl overflow-hidden">
                <Link href="/" class="flex items-center">
                    <img src="/assets/img/logobordo.png" :class="[isSticky ? 'hide-logo left-[-42px]' : '']" class="relative mr-3 h-14" alt="Dositej Akademija"/>
                </Link>
                <div class="flex items-center lg:order-2 lg:hidden">
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <Link :class="[isActive('/') ? 'text-red-800' : 'text-gray-900']" href="/" class="font-bold block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0 lg:p-0">Почетна</Link>
                        </li>
                        <li>
                            <Link href="#" data-dropdown-trigger="hover" data-dropdown-toggle="dropdown" class="group font-bold py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0  lg:p-0 flex items-center">О нама <PhArrowDown class="transition-transform duration-400 group-hover:rotate-180 ml-1" :size="12" /></Link>
                            <div id="dropdown" class="z-1000 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <Link :class="[isActive('/o-nama') ? 'text-red-800' : 'text-gray-900']"  href="/o-nama" class="font-bold font-boldtext-gray-900 block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">О школи</Link>
                                    </li>
                                    <li class="relative group">
                                        <a href="#" data-dropdown-trigger="hover"  data-dropdown-placement="right-end" data-dropdown-toggle="dropdownRightEnd" class="relative group font-bold flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Особље <PhArrowRight :size="12" /></a>
                                        <div id="dropdownRightEnd" data-dropdown-placement="right-start" class="absolute top-0 left-full ml-2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                                <li>
                                                    <Link :class="[isActive('/osoblje/nastavno') ? 'text-red-800' : 'text-gray-900']" href="/osoblje/nastavno" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Наставно</Link>
                                                </li>
                                                <li>
                                                    <Link :class="[isActive('/osoblje/nenastavno') ? 'text-red-800' : 'text-gray-900']" href="/osoblje/nenastavno" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ненаставно</Link>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/važni-dokumenti') ? 'text-red-800' : 'text-gray-900']" href="/važni-dokumenti" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Важни документи</Link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" data-dropdown-trigger="hover" data-dropdown-toggle="dropdownHover" class="group font-bold flex py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0 lg:p-0 items-center">Студијски програми <PhArrowDown :size="12" class="transition-transform duration-400 group-hover:rotate-180 ml-1"/>
                            </a>
                            <div id="dropdownHover" class="z-100 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-65 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                    <li>
                                        <Link :class="[isActive('/informatika') ? 'text-red-800' : 'text-gray-900']" href="/informatika" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Информатика</Link>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/ekonomija') ? 'text-red-800' : 'text-gray-900']" href="/ekonomija" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Економија</Link>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/informatika-master') ? 'text-red-800' : 'text-gray-900']" href="/informatika-master" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Информатика (Мастер студије)</Link>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/ekonomija-master') ? 'text-red-800' : 'text-gray-900']" href="/ekonomija-master" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Економија (Мастер студије)</Link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <Link href="#" data-dropdown-trigger="hover" data-dropdown-toggle="dropdownHover2" class="group font-bold flex py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0  lg:p-0 items-center">Школа <PhArrowDown class="transition-transform duration-400 group-hover:rotate-180 ml-1" :size="12" /></Link>
                            <div id="dropdownHover2" class="z-100 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                    <li>
                                        <Link :class="[isActive('/raspored/ispita') ? 'text-red-800' : 'text-gray-900']" href="/raspored/ispita" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Распоред испита</Link>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/raspored/nastave') ? 'text-red-800' : 'text-gray-900']" href="/raspored/nastave" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Распоред наставе</Link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <Link href="#" data-dropdown-trigger="hover" data-dropdown-toggle="dropdownHover3" class="group font-bold py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0 lg:p-0 flex items-center">Упис <PhArrowDown :size="12" class="transition-transform duration-400 group-hover:rotate-180 ml-1"/></Link>
                            <div id="dropdownHover3" class="z-100 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                    <li>
                                        <Link :class="[isActive('/cenovnik') ? 'text-red-800' : 'text-gray-900']"   href="/cenovnik" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ценовник</Link>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/prijava') ? 'text-red-800' : 'text-gray-900']" href="/prijava" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Пријава</Link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <Link :class="[isActive('/kontakt') ? 'text-red-800' : 'text-gray-900']" href="/kontakt" class="font-bold block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0 lg:p-0">Контакт</Link>
                        </li>
                        <li>
                            <Link href="#" data-dropdown-trigger="hover" data-dropdown-toggle="dropdownHover4" class="font-bold group flex items-center py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 hover:text-amber-500 lg:hover:bg-transparent lg:border-0 lg:p-0">Студентски инфо сервис <PhArrowDown :size="12" class="transition-transform duration-400 group-hover:rotate-180 ml-1"/></Link>
                            <div id="dropdownHover4" class="z-100 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
<!--                                    <li>-->
<!--                                        <Link :class="[isActive('/upustvo-za-studente') ? 'text-red-800' : 'text-gray-900']" href="/upustvo-za-studente" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Упуство</Link>-->
<!--                                    </li>-->
                                    <li>
                                        <Link :class="[isActive('/prijava-ispita') ? 'text-red-800' : 'text-gray-900']"  href="/prijava-ispita" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Пријава испита</Link>
                                    </li>
                                    <li class="relative group">
                                        <Link :class="[isActive('/upustvo-za-studente') ? 'text-red-800' : 'text-gray-900']" data-dropdown-placement="right-end" href="/upustvo-za-studente" data-dropdown-trigger="hover"  data-dropdown-toggle="doubleDropdown3"  class="font-bold flex px-4 py-2 hover:bg-gray-100 items-center">Обрасци <PhArrowRight :size="12" class="transition-transform duration-400 group-hover:rotate-180 ml-1"/></Link>
                                        <div id="doubleDropdown3"  class="absolute top-0 right-0  z-10 hidden w-44 bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                                <li>
                                                    <a href="/assets/files/Obrazac-za-prijavu-zavrsnog-rada-I-stepena.doc" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Пријава завршног рада</a>
                                                </li>
                                                <li>
                                                    <a href="/assets/files/Obrazac-za-prijavu-zavrsnog-rada-na-master-studijama.doc" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Пријава мастер рада</a>
                                                </li>
                                                <li>
                                                    <a href="/assets/files/Упутство-за-израду-завршног-рада.doc" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Упуство за израду дипломског рада</a>
                                                </li>
                                                <li>
                                                    <a href="/assets/files/UPUTSTVO-ZA-IZRADU-ZAVRSNOG-RADA-NA-MASTER-STUDIJAMA.doc" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Упуство за израду мастер рада</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/raspored-aktivnosti') ? 'text-red-800' : 'text-gray-900']" href="/raspored-aktivnosti" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Активности и календари</Link>
                                    </li>
                                    <li>
                                        <Link :class="[isActive('/biblioteka') ? 'text-red-800' : 'text-gray-900']" href="/biblioteka" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Библиотека</Link>
                                    </li>
                                    <li>
                                        <a href="https://moodle.vsdositej.edu.rs/login/index.php" target="_blank" class="font-bold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Moodle платформа</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
<script setup>
import {PhArrowDown, PhArrowRight, PhEnvelope, PhInstagramLogo, PhPhoneCall} from '@phosphor-icons/vue';
import {Link} from "@inertiajs/vue3";
import {ref,onMounted,onUnmounted,computed} from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const currentUrl = computed(() => page.url);


const isActive = (href) => currentUrl.value === href;
const isSticky = ref(false);
const handleScroll = () => {
    isSticky.value = window.scrollY > 200;
};

onMounted(()=>{
    window.addEventListener('scroll', handleScroll);
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>
<style scoped>

    @keyframes moja-animacija {
        0% {
            transform:translateY(-100%);
        }
        100% {
            transform:translateY(0%);
        }
    }

    @keyframes moja-animacija-2 {
        0% {
            left:0;
        }
        100% {
            left: -42px;
        }
    }

    .slide-down{
        animation: moja-animacija;
        animation-duration: 1200ms;
    }
    .hide-logo{
        animation: moja-animacija-2;
        animation-duration: 1300ms;
        animation-iteration-count: 1;
    }
    header{
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
</style>
