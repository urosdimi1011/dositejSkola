<template>
<!--    <NavigationMenu class="w-full max-w-none bg-cyan-50">-->
<!--        <NavigationMenuList class="w-full text-gray-950 justify-between">-->
<!--            &lt;!&ndash; Default slot za stavke menija &ndash;&gt;-->
<!--            <slot name="items">-->
<!--                <li class="w-50">-->
<!--                    <img src="/assets/img/logobordo.png" alt="logoDositeja"/>-->
<!--                </li>-->
<!--                <NavigationMenuItem-->
<!--                    v-for="item in items"-->
<!--                    :key="item.id"-->
<!--                    :as="item.as"-->
<!--                    :href="item.href"-->
<!--                    :disabled="item.disabled"-->
<!--                >-->
<!--                    {{ item.title }}-->
<!--                </NavigationMenuItem>-->
<!--            </slot>-->
<!--        </NavigationMenuList>-->
<!--        <slot name="extra"></slot>-->
<!--    </NavigationMenu>-->
    <header-user></header-user>
    <main class="bg-gray-50 ">
        <slot></slot>
    </main>
    <footer-user></footer-user>
</template>
<script setup>
import {reactive} from "vue";
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
</script>
<style scoped>
    *{
        font-family: "Poppins", sans-serif;
    }
</style>
