<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'; // Uvezi usePage hook
const page = usePage(); // Koristi usePage za pristup podacima stranice
import { initFlowbite } from 'flowbite'
import {onMounted} from "vue";
import SidebarProvider from "@/components/ui/sidebar/SidebarProvider.vue";
import AppSidebar from "@/components/AppSidebar.vue";

onMounted(()=>{
    initFlowbite();
})
</script>

<template>
    <div class="flex h-screen overflow-hidden">
        <SidebarProvider>
            <AppSidebar />
            <div class="flex flex-1 flex-col overflow-auto">
                <main class="flex-1 p-6">
                    <slot :key="page.url"></slot>
                </main>
            </div>
        </SidebarProvider>
    </div>

</template>
<style>
a{
    transition: all 300ms;
}
a:hover{
    color: oklch(79.5% 0.184 86.047) !important;
}
.page-enter-active, .page-leave-active {
    transition: opacity 0.5s;
}
.page-enter-from, .page-leave-to {
    opacity: 0;
}
.page-enter-to, .page-leave-from {
    opacity: 1;
}

@layer base {
    body{
        background-color: #fff !important;
    }
}
</style>
