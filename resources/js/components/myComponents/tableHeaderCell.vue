<template>
    <th scope="col" class="px-6 py-3">
        {{ props.label }}
    </th>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';
import { HeaderCell } from '@/types';

const props = defineProps<HeaderCell>();
</script>
