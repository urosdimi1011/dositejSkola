<template>
    <div class="staff my-4">
        <p class="staff-name flex items-center gap-2"><PhUser :size="22" /> {{name}}</p>
        <a :href="'mailto:'+email" class="staff-email hover:text-red-800 transition flex items-center gap-2"><PhEnvelope :size="22" /> {{email}}</a>
    </div>
</template>
<script setup lang="ts">
    import {defineProps} from 'vue';
    import {PhEnvelope, PhUser} from "@phosphor-icons/vue";
    defineProps({
        id:Number,
        name: String,
        email : String,
    })
</script>
