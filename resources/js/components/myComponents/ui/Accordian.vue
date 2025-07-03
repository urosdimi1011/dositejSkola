<template>
    <div class="coreui-scope">
        <CAccordion class="accordion-body" :active-item-key="activeItemKey" :always-open="alwaysOpen">
            <CAccordionItem
                v-for="(item, idx) in items"
                :key="item.key ?? idx"
                :item-key="item.key ?? idx"
            >
                <CAccordionHeader>{{ item.title }}</CAccordionHeader>
                <CAccordionBody>
                    <!-- default scoped slot -->
                    <slot :items="items" :item="item" :index="idx"/>
                </CAccordionBody>
            </CAccordionItem>
        </CAccordion>
    </div>
</template>
<script setup lang="ts">
import '@coreui/coreui/dist/css/coreui.min.css';
import {CAccordion, CAccordionBody, CAccordionHeader, CAccordionItem} from "@coreui/vue/dist/esm/components/accordion";
import {defineProps} from 'vue';

defineProps<{
    items: Array<{ key?: string|number; title: string; payload?: any }>
    activeItemKey?: string|number
    alwaysOpen?: boolean
}>()


</script>
<style>
    .collapse{
        visibility:visible !important;
    }
    .accordion-body{
        padding:0px !important;
    }
    .accordion-body a{
        text-decoration : none !important;
        color:black !important;
    }
</style>
