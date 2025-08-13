<template>
    <table class="w-full text-sm border-collapse">
        <thead>
            <tr>
                <th v-for="header in headers" :key="header.id" class="border px-2 py-1 text-left">{{ header.title }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(d, i) in datas" :key="i">
                <td v-for="(name,key) in headers" :key="name.id" class="border px-2 py-1">
                    <slot
                        :name="`cell(${name.name})`"
                        :value="d[name.name]"
                        :item="d"
                        :header="name"
                    >
                        {{ d[name.name] }}
                    </slot>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script setup lang="ts">
import {defineProps} from 'vue';

interface ITableHeder{
    id : string,
    name: string,
    label: string
}
interface ITableBody{
    id : string,
    name: string,
    label: string
}

defineProps({
    datas: Array<ITableBody>,
    headers : Array<ITableHeder>
})


</script>
<style scoped>
</style>
