<template>
    <my-layout>
        <header-title>
            <p class="strong">Економија</p>
        </header-title>
        <div class="ekonomija-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="text-2xl text-gray-950 font-medium">
                    Мастер академске студије
                    <span class="underline w-1/12 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
            </div>

            <div class="content my-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 items-center gap-3">
                    <div class="content">
                        <p class="my-5">Студијски програм <strong class="text-red-800">мастер академских студија „Општа економија”</strong> омогућава нову надградњу стечених знања на основним академским студијама, којом се остварује иновативност и креативност, аналитичност и истраживачки приступ савраеменим практичним достигнућима у економији, финансијама, предузетништву и менаџменту.</p>
                        <p class="my-5">Мастер академске студије за стицање стручног звања <strong class="text-red-800">мастер економиста</strong>, омогућују студентима да стекну и искажу знања и разумевање теоријско-практичне материје у области менаџмента и маркетинга, електронског пословања и информационих технологија и финансијског, банкарског и берзанског менаџмента.</p>
                        <p class="my-5">Наставни планови и програми мастер студија на Високој школи “Доситеј” конципирани су тако да се студенти уче да пословно мисле, да се тестирају и охрабрују да благовремено препознају шансе и претње у пословном амбијенту, водећи рачуна при томе о пословној етици и друштвеној одговорности савремених корпорација.</p>
                        <p class="my-5">Наша идеја јесте да кроз квалитетно осмишљене наставне планове и  програме, уз помоћ угледних професора, те модерних наставних метода, лабораторија, опреме, што пре постанемо препознатљиви лидер у образовању компетентних кадрова за савремену динамичку привреду и друштво.</p>
                    </div>
                    <div class="img-block">
                        <img class="max-w-full rounded boder border-red-800/40 border-[2px] shadow-md" src="/assets/img/ekonomija.jpg" alt="ekonomija"/>
                    </div>
                </div>
                <div  data-aos="fade-left" class="grid grid-cols-1 sm:grid-cols-2 gap-10 my-10">
                    <div class="content">
                        <h3 class="text-xl my-5 text-gray-500 uppercase">Предмети</h3>
                        <Accordian :items="selection" :active-item-key="1">
                            <template #default="{item}">
                                <Table :datas="item.payload.datas" :headers="tableHeder">

                                </Table>
                            </template>
                        </Accordian>
                    </div>
                    <div class="content">
                        <p class="my-5">Поред тога, студијски програм оспособљавају студенте за бављење научно-истраживачким и иновативним радом што им обезбеђује наставак студирања на специјалистичким и докторским студијама.</p>
                        <p class="my-5">Студијски програм је тако савремено конципиран да образује мастер економисте – стручњаке за моделирање и анализу комплексних привредних система, првенствено аналитичаре и планере предузећа, финансијске стручњаке, планере и стручњаке за економску политику на нивоу поједине привредне гране и целокупне привреде, стручњаке за међународну трговину, међународне финансије, економисте за јавне службе.</p>
                        <p class="my-5">Завршетком мастер академских студија Високе школе „Доситеј“ студенти се оспособљавају:</p>
                        <ul class="list-decimal pl-5 text-red-800">
                            <li class="my-3">за изграђивање академске каријере на некој од научно-наставних или научних институција, односно обављање високо специјализованих послова управљања у приватном и јавном сектору;</li>
                            <li class="my-3">за продубљену критичку анализу, евалуацију и синтезу садржаја из економске науке</li>
                            <li class="my-3">за примену техника и методологија и прилагођавање процеса истраживања у подручју економске науке</li>
                            <li class="my-3">за самостално осмишљавање и спровођење истраживања у области економске науке;</li>
                            <li class="my-3">за промовисање изврсности на академском и професионалном нивоу у области економске науке у контексту одрживог развоја привреде и друштва.</li>
                            <li class="my-3">за евалуацију постигнутих резултата истраживања у пољу економске науке</li>
                        </ul>
                    </div>
                </div>
                <div data-aos="fade-left" class="content">
                    <p class="my-5"><strong class="text-red-800">Структуру студијског програма</strong> на мастер академским студијама „Општа економија” чине обавезни и изборни научно-стручни и стручно-апликативни предмети и завршни рад.</p>
                    <p class="my-5">Завршни мастер рад кандидати раде у току другог семестра мастер академских студија уз менторски мониторинг професора. Усменом одбраном завршног – мастер рада студент стиче звање Мастер економисте (60 ЕСПБ).</p>
                </div>
                <a class="text-red-800 transiton" target="_blank" href="/assets/files/Master.pdf">Распоред предмета по семестрима и годинама студија за студијски програм другог нивоа студија.</a>
            </div>
        </div>
    </my-layout>
</template>
<script setup lang="ts">
import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {onMounted, ref} from "vue";
import {initFlowbite} from "flowbite";
import {useHead} from "@vueuse/head";
import Accordian from "@/components/myComponents/ui/Accordian.vue";
import Table from "@/components/myComponents/ui/Table.vue";


useHead({
    title: 'Економија – Мастер академске студије | Висока школа „Доситеј“',
    meta: [
        {
            name: 'description',
            content:
                'Сазнајте све о мастер академским студијама „Општа економија“ на Високој школи „Доситеј“: структура програма, наставни план, предмети, исходи учења и услови дипломирања.'
        },
        {
            property: 'og:title',
            content: 'Економија – Мастер академске студије | Висока школа „Доситеј“'
        },
        {
            property: 'og:description',
            content:
                'Информације о мастер студијама економије: предмети, ЕСПБ бодови, аналитичке и истраживачке компетенције, могућности наставка студија и запошљавања.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: 'https://vsdositej.edu.rs/ekonomija-master'
        },
        {
            property: 'og:image',
            content: 'https://vsdositej.edu.rs/favicon.ico' // prilagodi ako koristiš drugu sliku
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: 'https://vsdositej.edu.rs/ekonomija-master'
        }
    ]
});

onMounted(()=>{
    initFlowbite();
})


const masterCourses = [
    { name: "Методологија НИР-а",                       semester: 1, status: "Обавезни", espb: 5 },
    { name: "Теорија и политика цена",                 semester: 1, status: "Обавезни", espb: 5 },
    { name: "Савремене економске теорије",             semester: 1, status: "Обавезни", espb: 5 },
    { name: "Савремена тржишта и конкуренција",        semester: 1, status: "Изборни",   espb: 5 },
    { name: "Економетрија",                            semester: 1, status: "Изборни",   espb: 5 },
    { name: "Економија раста и развоја",               semester: 1, status: "Обавезни", espb: 5 },
    { name: "Макроекономија отворене привреде",        semester: 2, status: "Изборни",   espb: 5 },
    { name: "Привредних ресурса",                      semester: 2, status: "Изборни",   espb: 5 },
    { name: "Економија одрживог развоја",              semester: 2, status: "Обавезни", espb: 5 },
    { name: "Институционална економија",               semester: 2, status: "Обавезни", espb: 5 },
    { name: "Студијски истраживачки рад",              semester: 2, status: "Обавезни", espb: 10 },
    { name: "Мастер рад",                              semester: 2, status: "Обавезни", espb: 10 }
];



const selection = ref([
    {
        "key":1,
        "title": "Прва година",
        payload: {
            datas: masterCourses
        },
    }
]);

const tableHeder= ref([
    {
        id:1,
        name:"name",
        title:"Назив"
    },
    {
        id:2,
        name:"status",
        title:"Статус"
    },
    {
        id:3,
        name:"semester",
        title:"Семестар"
    },
    {
        id:4,
        name:"espb",
        title:"ЕСПБ"
    }
]);

</script>
