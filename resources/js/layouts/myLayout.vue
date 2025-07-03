<template>
    <div class="layout dark:bg-gray-50 dark:text-gray-950">
        <header-user></header-user>
        <main class="content">
            <slot></slot>
        </main>
        <footer-user></footer-user>
    </div>
</template>
<script setup>
import {reactive,onMounted} from "vue";
import HeaderUser from "@/layouts/app/HeaderUser.vue";
import FooterUser from "@/layouts/app/FooterUser.vue";

const items = reactive([
    {
        'href':"/",
        "title":"Početna"
    },
    {
        'href':"/onama",
        "title":"O nama"
    },
    {
        'href':"/studijskiprogrami",
        "title":"Studijski Programi"
    }
])

onMounted(() => {
    // makar i timeout, da bismo sačekali da
    // ga DevExtreme ubaci u DOM
    setTimeout(() => {
        document
            .querySelectorAll('dx-license')
            .forEach(el => {
                el.style.display = "none !important";
                console.log();
            });
    }, 0);
});
</script>
<style scoped>
    *{
        font-family: "Poppins", sans-serif;
    }
    .layout {
        display: flex;
        flex-direction: column;
        min-height: 100vh;        /* cele vidljive visine ekrana */
    }
    .content {
        flex: 1;                  /* raste i skuplja se da popuni prostor */
        /* opciono: min-height: 0;  -> ponekad potrebno da bi overflow radio u flex-itemu */
    }

</style>
