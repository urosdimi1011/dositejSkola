<template>
    <my-layout>
        <div class="price-block ">
            <header-title>
                <strong class="font-bold">Ценовник</strong>
            </header-title>

            <div data-aos="fade-down" class="prices grid grid-cols-1 sm:grid-cols-2 gap-20 my-15 mx-auto max-w-screen-xl">
                <div class="ekonomija-block ">
                    <div class="header-block my-10">
                        <h2 class="text-xl text-gray-950 font-medium">Економија
                            <span class="underline w-1/20 bg-red-800 h-1 block rounded-sm"></span>
                        </h2>
                    </div>
                    <ul class="cene-po-godinama flex flex-col gap-4">
                        <li class="flex items-center gap-2">
                            <strong>Прва година: </strong>
                            1500€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Друга година: </strong>
                            1500€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Трећа година: </strong>
                            1500€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Четврта година: </strong>
                            1500€ + 300€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Мастер студије: </strong>
                            1800€ +300€
                        </li>
                    </ul>
                </div>
                <div class="informatika-block">
                    <div class="header-block my-10">
                        <h2 class="text-xl text-gray-950 font-medium">Информатика
                            <span class="underline w-1/20 bg-red-800 h-1 block rounded-sm"></span>
                        </h2>
                    </div>
                    <ul class="cene-po-godinama flex flex-col gap-4">
                        <li class="flex items-center gap-2">
                            <strong>Прва година: </strong>
                            1700€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Друга година: </strong>
                            1700€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Трећа година: </strong>
                            1700€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Четврта година: </strong>
                            1700€ + 300€
                        </li>
                        <li class="flex items-center gap-2">
                            <strong>Мастер студије: </strong>
                            1900€ +200€
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content-block  mx-auto max-w-screen-xl">
                <p class="my-3">У цену школарине укључена је литература неопходна за полагање испита, сви трошкови пријављивања испита, овере семестара, курсеви и семинари који се организују у оквиру Школе “Доситеј”, коришћење библиотеке и сви остали административни трошкови (издавање уверења о положеним испитима, о признатим испитима, уверења о дипломирању и сл).</p>
                <p class="my-3">Најбоље ученике средњих школа који одлуче да своје академско образовање наставе на Високој школи академских студија “Доситеј” награђујемо тако што ће се прву годину студија бесплатно школовати код нас. Уколико са истим, изванредним успехом наставе своје школовање и на Високој школи “Доситеј” биће ослобођени плаћања школарине за сваку наредну годину студија.</p>
                <p class="my-3">Наведени новчани износи уплаћују се на жиро рачун Високе школе “Доситеј” број 330 – 0000004016766 – 04 у динарској противвредности, по средњем курсу Народне банке Србије на дан уплате.</p>
            </div>
        </div>
    </my-layout>
</template>
<script setup>
import MyLayout from "@/layouts/myLayout.vue";
import {onMounted} from "vue";
import {initFlowbite} from "flowbite";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {useHead} from "@vueuse/head";

onMounted(()=>{
    initFlowbite();
})

useHead({
    title: 'Ценовник | Висока школа академских студија „Доситеј“',
    meta: [
        {
            name: 'description',
            content: 'Погледајте детаљан ценовник школарина за студијске програме из економије и информатике на Високој школи „Доситеј“ у Београду.'
        },
        {
            property: 'og:title',
            content: 'Ценовник | Висока школа академских студија „Доситеј“'
        },
        {
            property: 'og:description',
            content: 'Информације о ценама по годинама студија и мастер програмима, укључујући све трошкове и бенефиције.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: `https://vsdositej.edu.rs/cenovnik`
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: `https://vsdositej.edu.rs/cenovnik`
        }
    ]
});

</script>
