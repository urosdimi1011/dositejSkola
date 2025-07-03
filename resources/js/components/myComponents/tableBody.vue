<template>
    <tbody>
    <template v-if="bodyProps.data == null">
        <tr>
            <td :colspan="bodyProps.numberOfColumn" class="text-center py-4">
                <div class="w-10 h-10 border-4 border-blue-500 border-t-transparent rounded-full animate-spin mx-auto"></div>
            </td>
        </tr>
    </template>
<!--    Ovo se vrti i ovo treba da sada obradjujem-->
    <template v-else-if="bodyProps.data && bodyProps.data.length > 0">
        <tr v-for="(row, rowIndex) in bodyProps.data" :key="row.id" class="bg-white dark:bg-gray-800">
            <td v-for="header in bodyProps.headers" :key="header.name" class="px-6 py-4">
                <template v-if="header.type === 'toggle'">
                    <label class="inline-flex items-center cursor-pointer">
                        <!-- dvosmerno vezivanje i peer klase za stil -->
                        <input
                            type="checkbox"
                            class="sr-only peer"
                            @click="header.actions({id:row.id,checked:!row[header.name]})"
                            :name="header.name"
                            :checked="row[header.name]"
                        />

                        <!-- ovo menja boju i položaj „dugmeta” kad se checked -->
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full
                                 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800
                                 dark:bg-gray-700
                                 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600
                                 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                                 after:content-[''] after:absolute after:top-[2px] after:start-[2px]
                                 after:bg-white after:border-gray-300 after:border after:rounded-full
                                 after:h-5 after:w-5 after:transition-all dark:border-gray-600
                          "
                        ></div>
                    </label>
                </template>

                <template v-else-if="header.actions">
                    <button :class="header.class" @click="header.actions(row)">{{header.label}}</button>
                </template>
                <template v-else-if="header.type==='img'">
                    <img class="w-20" :src="getImageUrl(row[header.name])" :alt="row[header.name]"/>
                </template>
                <template v-else-if="header.type==='html'">
                    <div v-html="truncateHtml(row[header.name],100)"></div>
                </template>
                <template v-else>
                    {{row[header.name]}}
                </template>
            </td>
        </tr>
    </template>
    <template v-else-if="bodyProps.data && bodyProps.data.length == 0">
        <tr class="text-center">
            <td :colspan="bodyProps.numberOfColumn">
                Trenutno nema podataka za prikaz
            </td>
        </tr>
    </template>
    </tbody>
</template>
<script setup lang="ts">
import {TableBodyProps} from "@/types";
import axios from "axios";

const bodyProps = defineProps<TableBodyProps>();

const getImageUrl = (path) => {
    return `/storage/${path}`;
}


function truncateHtml(html: string, limit: number) {
    const div = document.createElement('div');
    div.innerHTML = html;         // Pretvori u pravi HTML
    const text = div.textContent || div.innerText || ""; // Izvuci samo tekst bez tagova
    return text.substring(0, limit) + (text.length > limit ? '...' : ''); // Skrati tekst
}
</script>
