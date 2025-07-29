<template>
    <footer class="bg-white mt-20">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 ">
            <div class="md:flex md:justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <Link href="/" class="flex items-center !justify-center sm:!justify-start">
                        <img src="/assets/img/logobordo.png" class="!h-17 sm:!h-20 me-3" alt="Dositej Akademija" />
                    </Link>
                </div>
                <div class="grid grid-cols-1 gap-2 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-header-color uppercase text-shadow-xs">Контакт</h2>
                        <ul class="text-gray-500 font-medium ">
                            <li class="mb-4">
                                <a href="mailto:office@vsdositej.edu.rs" class="hover:underline flex gap-1 items-center text-header-color"><PhEnvelope :size="20" /> office@vsdositej.edu.rs</a>
                            </li>
                            <li class="mb-4">
                                <a href="tel:+38160444896" class="hover:underline flex gap-1 items-center text-header-color"><PhPhone :size="20" />+381 60444896</a>
                            </li>
                            <li class="mb-4">
                                <a href="tel:011 3235500" class="hover:underline flex gap-1 items-center text-header-color"><PhPhone :size="20" />011 3235500</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-header-color text-shadow-xs">Локација</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="https://maps.app.goo.gl/EjCgZhyMbhPBLG2V9" target="_blank" class="hover:underline flex gap-1 items-center text-header-color"><PhMapPinSimpleArea :size="20" /> Nušićeva 12a, <br/>Bulevar Vojvode putnika 7</a>
                            </li>
                            <li class="mb-4">
                                <a href="mailto:office@vsdositej.edu.rs" target="_blank" class="hover:underline flex gap-1 items-center text-header-color"><PhEnvelope :size="20" /> office@vsdositej.edu.rs</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-header-color uppercase text-shadow-xs">Корисни линкови</h2>
                        <ul class="text-gray-500 font-medium">
                            <li class="mb-4">
                                <Link href="/prijava" class="hover:underline text-header-color">Упис</Link>
                            </li>
                            <li class="mb-4">
                                <Link href="/cenovnik" class="hover:underline text-header-color">Цена</Link>
                            </li>
                            <li>
                                <Link href="/o-nama" class="hover:underline text-header-color">О студијама</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm sm:text-center text-header-color">© 2025 <a href="/" class="hover:underline">Доситеј Академија</a>. Сва права резервисана.
                </span>
                <ul>
                    <li>
                        <a href="https://www.instagram.com/kuca.znanja/" target="_blank" class="text-header-color flex gap-2 items-center hover:text-red-800 transition"><PhInstagramLogo :size="22" weight="light" /> kuca.znanja</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import {PhEnvelope, PhInstagramLogo, PhMapPinSimpleArea, PhPhone} from "@phosphor-icons/vue";
</script>
<style scoped>
    footer{
        border-top: 1px solid rgba(0,0,0,0.1);
        background-color: #F5F1E8;
    }
    .text-header-color{
        color:#693D1CFF;
    }
</style>
<!-- #AB662Dff teager eay -->
