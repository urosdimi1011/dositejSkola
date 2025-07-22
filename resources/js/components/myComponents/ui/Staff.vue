<template>
    <div class="staff my-4">
        <Link :href="`/osoba/${slug}`" class="staff-name flex items-center gap-2 hover:text-red-800 transition"><PhUser :size="22" /> {{name}}</Link>
        <a :href="'mailto:'+email" class="staff-email hover:text-red-800 transition flex items-center gap-2"><PhEnvelope :size="22" /> {{email}}</a>
    </div>
</template>
<script setup lang="ts">
    import {defineProps,computed} from 'vue';
    import {Link} from "@inertiajs/vue3";
    import {PhEnvelope, PhUser} from "@phosphor-icons/vue";
    const props = defineProps({
        id:Number,
        name: String,
        email : String,
    })

    const slug = computed(() => {
        return props.name?.toString()
            // 1) ukloni sve tačke
            .replace(/\./g, '')
            // 2) u lowercase (radi i za ćirilicu)
            .toLowerCase()
            // 3) zameni sve whitespace u jednu crtu
            .replace(/\s+/g, '-')
            // 4) izbriši znakove koji nisu slova (bilo koje pismo!), brojevi ili crta
            .replace(/[^-\p{L}\p{N}]+/gu, '')
            // 5) izbriši eventualne vodeće/krajne crte
            .replace(/(^-+|-+$)/g, '')
    })
</script>
