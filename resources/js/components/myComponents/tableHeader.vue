<template>
    <thead>
    <tr>
        <TableHeaderCell
            v-for="header in headers"
            :key="header.name"
            :name="header.name"
            :label="header.label"
            :class="header.class"
        />
    </tr>
    </thead>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';
import TableHeaderCell from '@/components/myComponents/tableHeaderCell.vue';
import { HeaderCell } from '@/types'; // Tip za jedan header

const props = defineProps<{
    headers: HeaderCell[];
}>();
</script>
