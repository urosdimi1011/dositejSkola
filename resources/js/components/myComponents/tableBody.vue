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
                <template v-if="header.actions">
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
