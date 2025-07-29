<template>
    <div class="schedule my-5">
        <h4><a target="_blank" class="transition hover:text-gray-400 flex items-center" :href="'/storage/'+raspored.file_path">
            <template v-if="typeOfFile==='doc' || typeOfFile==='docx'">
                <PhMicrosoftWordLogo :size="22" />
            </template>
            <template v-else-if="typeOfFile === 'pdf'">
                <PhFilePdf :size="22" />
            </template>
            <template v-else-if="typeOfFile === 'xls' || typeOfFile === 'xlsx'">
                <PhMicrosoftExcelLogo  :size="22" />
            </template>
            {{raspored.title}} </a></h4>
    </div>
</template>
<script setup lang="ts">

import {ScheduleI} from "@/types";
import {computed, defineProps} from 'vue';
import {PhFilePdf, PhMicrosoftExcelLogo, PhMicrosoftWordLogo} from "@phosphor-icons/vue";

const props = defineProps<{
    raspored : ScheduleI,
}>();

const typeOfFile = computed(()=>{
    return props.raspored.file_path.split('.')[props.raspored.file_path.split('.').length-1];
})


</script>
<style scoped>
a{
    color:black;
    text-decoration: none;
}
</style>
