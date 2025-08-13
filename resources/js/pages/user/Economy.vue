<template>
    <my-layout>
        <header-title>
            <p class="strong">Економија</p>
        </header-title>
        <div class="ekonomija-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="!text-lg sm:!text-2xl text-gray-950 font-medium">
                    Основне академске студије
                    <span class="underline w-1/12 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
            </div>

            <div class="content my-10 !px-2 sm:!px-0">
                <div class="grid grid-cols-1 sm:grid-cols-2 items-center gap-3">
                    <div class="content">
                        <h3 class="!text-md sm:!text-xl text-gray-500 ">СТРУКТУРА СТУДИЈСКОГ ПРОГРАМА – ОСНОВНИХ АКАДЕМСКИХ СТУДИЈА</h3>
                        <p class="my-5"> Сврха студијског програма је образовање студената из области економије на нивоу основних академских студија које обезбеђују стицање одговарајућих компетенција у области економске анализе и политике, монетарне политике и анализе, јавних финансија, банкарства, финансијских институција, пореза и царина, електронског пословања и информационих технологија итд.</p>
                        <p class="my-5">Кроз практичну наставу и стручну праксу, семинаре, практични рад и курсеве, студентима се омогућује да савладају и примене најновија теоријска и методолошка знања у реалним пословним ситуацијама и конкретној професионалној активности.</p>
                        <p class="my-5">Савремено конципиран студијски програм пружа могућност будућем економском стручњаку да на компетентан начин учествује у моделирању и анализи комплексних елемената привредног система и његових саставних делова – креирање економске политике, како на нивоу националне економије, тако и на нивоу појединачних привредних грана, аналитичко-плански послови у предузећима, банкама, осигуравајућим друштвима, у јавним службама, у области међународних економских односа и сл.</p>
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

                                    <template #cell(name)="{ value, item }">
                                        <a v-if="item.href" :href="item.href" class="transition hover:!text-red-800" target="_blank">
                                            {{ value }}
                                        </a>
                                        <span v-else>{{ value }}</span>
                                    </template>
                                </Table>
                            </template>
                        </Accordian>
                    </div>
                    <div class="content">
                        <h3>Методе извођења наставе зависе од типа наставе:</h3>
                        <ul class="list-decimal pl-5 text-red-800">
                            <li class="my-3">Активна настава</li>
                            <li class="my-3">Самостални рад студента</li>
                            <li class="my-3">Колоквијуми</li>
                            <li class="my-3">Испити</li>
                            <li class="my-3">студијски истраживачки рад</li>
                            <li class="my-3">израда завршног рада итд</li>
                        </ul>
                        <p class="my-5">Активна настава се остварује кроз предавања, вежбе, консултације, менторски рад. Ова настава се остварује кроз стални контакт студената са наставницима и сарадницима.</p>
                    </div>
                </div>
                <div data-aos="fade-left" class="content">
                    <h3 class="!text-lg sm:!text-xl text-gray-500 uppercase">О студијама</h3>
                    <p class="my-10">Студијски програм чине обавезни и изборни предмети.</p>
                    <p class="my-5">Завршетком основних академских студија студијског програма Општа економија студент стиче назив <strong class="text-red-800">Дипломирани економиста (240 ЕСПБ)</strong>, али и услов да настави студије на мастер академским студијама, у земљи и иностранству, и да стекне назив мастер економиста.</p>
                    <p class="my-5">На првој и другој години студија изучава се по девет обавезних наставних предмета. На трећој години изучава се девет предмета од којих је пет обавезних а четири су изборна од осам понуђених. На четвртој години изучава се осам наставних предмета од којих је пет обавезних а три су изборна и бирају се од шест понуђених предмета. Након полагања свих испита студент приступа изради Завршног рада.</p>
                    <p class="my-5">Студент може да пређе на овај студијски програм у другим студијским програмима исте или сродних области, ако има положен испит који одговара овом студијском програму и ако је остварио потребан број ЕСПБ бодова за упис на одговарајућу годину.</p>
                    <p class="my-5">Студијски програм се реализује кроз предавања (п), вежбе (в) и друге облике активне наставе (дон).</p>
                </div>
                <a class="text-red-800 transiton" target="_blank" href="/assets/files/Структура-предмета-економија.pdf">Распоред предмета по семестрима и годинама студија за студијски програм Општа економија</a>
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
    title: 'Економија – Основне академске студије | Висока школа „Доситеј“',
    meta: [
        {
            name: 'description',
            content: 'Сазнајте све о студијском програму Општа економија – основне академске студије на Високој школи „Доситеј“: структура програма, методе наставе, услови уписа и завршетка студија.'
        },
        {
            property: 'og:title',
            content: 'Економија – Основне академске студије | Висока школа „Доситеј“'
        },
        {
            property: 'og:description',
            content: 'Информације о студијама економије: предмети, начин наставе, стручне праксе, услови за дипломирање и наставак мастер студија.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: `https://vsdositej.edu.rs/ekonomija`
        },
        {
            property: 'og:image',
            content: 'https://tvoj-domen.rs/assets/images/ekonomija-preview.jpg' // prilagodi put ako imas preview sliku
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: `https://vsdositej.edu.rs/ekonomija`
        }
    ]
});

onMounted(()=>{
    initFlowbite();
})


const godina1 = [
    { name: "Микроекономија", semester: 1, status: "Обавезни", espb: 8, href: "/assets/files/predmeti/E11 - Mikroekonomija.pdf" },
    { name: "Математика за економисте", semester: 1, status: "Обавезни", espb: 9, href: "/assets/files/predmeti/E12 - Matematika za ekonomiste.pdf" },
    { name: "Информационе технологије", semester: 1, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E13 - Informacione tehnologije.pdf" },
    { name: "Основи менаџмента", semester: 1, status: "Обавезни", espb: 5, href: "/assets/files/predmeti/E14 - Osnovi menadžmentа.pdf" },
    { name: "Основи маркетинга", semester: 2, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E21- Osnovi marketinga.pdf" },
    { name: "Статистика за економисте", semester: 2, status: "Обавезни", espb: 6, href: "/assets/files/predmeti/E22- Statistika za ekonomiste.pdf" },
    { name: "Предузетништво", semester: 2, status: "Обавезни", espb: 8, href: "/assets/files/predmeti/E23 - Preduzetnistvo.pdf" },
    { name: "Увод у финансије", semester: 2, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E24 - Uvod u finansije.pdf" },
    { name: "Енглески пословни језик 1", semester: 2, status: "Обавезни", espb: 3, href: "/assets/files/predmeti/E25 - Engleski poslovni jezik 1.pdf" }
];

const godina2 = [
    { name: "Макроекономија", semester: 3, status: "Обавезни", espb: 8, href: "/assets/files/predmeti/E31 - Makroekonomija.pdf" },
    { name: "Менаџмент људских ресурса", semester: 3, status: "Обавезни", espb: 6, href: "/assets/files/predmeti/E32 - Menadžment ljudskih resursa.pdf" },
    { name: "Банкарско пословање", semester: 3, status: "Обавезни", espb: 9, href: "/assets/files/predmeti/E33 - Bankarsko poslovanje.pdf" },
    { name: "Рачуноводство", semester: 3, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E34 - Racunovodstvo.pdf" },
    { name: "Пословни информациони системи", semester: 4, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E41 - Poslovni informacioni sistemi.pdf" },
    { name: "Квантитативне методе у економији", semester: 4, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E42 - Kvantitativne metode u ekonomiji.pdf" },
    { name: "Финансијски менаџмент", semester: 4, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E43 - Finansijski menadzment.pdf" },
    { name: "Пословно право", semester: 4, status: "Обавезни", espb: 6, href: "/assets/files/predmeti/E44 - Poslovno pravo.pdf" },
    { name: "Енглески пословни језик 2", semester: 4, status: "Обавезни", espb: 3, href: "/assets/files/predmeti/E45 - Еngleski poslovni jezik 2.pdf" } // Nema fajla
];

const godina3 = [
    { name: "Монетарна економија", semester: 5, status: "Обавезни", espb: 6, href: "/assets/files/predmeti/E51 - Monetarna ekonomija.pdf" }, // Nema fajla
    { name: "Финансијска и актуарска математика", semester: 5, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E52 - Finansijska i aktuarska matematika.pdf" },
    { name: "Истраживање маркетинга", semester: 5, status: "Обавезни", espb: 6, href: "/assets/files/predmeti/E53- Istrazivanje marketinga.pdf" },
    { name: "Пословна комуникација", semester: 5, status: "Изборни", espb: 6, href: "/assets/files/predmeti/E541 - Poslovna komunikacija.pdf" },
    { name: "Пословна етика", semester: 5, status: "Изборни", espb: 6, href: "/assets/files/predmeti/E542 - Poslovna etika.pdf" },
    { name: "Међународне финансије", semester: 5, status: "Изборни", espb: 8, href: "/assets/files/predmeti/E551 - Medjunarodne finansije.pdf" },
    { name: "Понашање потрошача", semester: 5, status: "Изборни", espb: 8, href: "/assets/files/predmeti/E552 - Ponasanje potrosaca.pdf" },
    { name: "Финансијска тржишта и институције", semester: 6, status: "Обавезни", espb: 9, href: "/assets/files/predmeti/E61 - Finansijska trizista i institucije.pdf" },
    { name: "Енглески пословни језик 3", semester: 6, status: "Обавезни", espb: 4, href: "/assets/files/predmeti/E62 - Engleski poslovni jezik 3.pdf" },
    { name: "Управљање променама", semester: 6, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E631- Upravljanje promenama.pdf" },
    { name: "Пословна логистика", semester: 6, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E632 - Poslovna logistika.pdf" },
    { name: "Јавне финансије", semester: 6, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E641 - Javne finansije.pdf" },
    { name: "Привредни развој", semester: 6, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E642 - Privredni razvoj.pdf" }
];

const godina4 = [
    { name: "Стратегијски менаџмент", semester: 7, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E71 - Strategijski menadzment.pdf" },
    { name: "Анализа биланса и финансијско извештавање", semester: 7, status: "Обавезни", espb: 8, href: "/assets/files/predmeti/E72 - Anal.bil. i finan. izves.pdf" },
    { name: "Електронско пословање", semester: 7, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E731 - Elektronsko poslovanje.pdf" },
    { name: "Менаџмент у трговини", semester: 7, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E732- Menadzment u trgovini.pdf" },
    { name: "Економика ЕУ", semester: 7, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E741 - Ekonomika EU.pdf" },
    { name: "Управљање иновацијама", semester: 7, status: "Изборни", espb: 7, href: "/assets/files/predmeti/E742 - Upravljanje inovacijama.pdf" },
    { name: "Управљање пројектима", semester: 8, status: "Обавезни", espb: 7, href: "/assets/files/predmeti/E81- Upravljanje projektima.pdf" },
    { name: "Управљање инвестицијама", semester: 8, status: "Обавезни", espb: 6, href: "/assets/files/predmeti/E82- Upravljanje investicijamа.pdf" },
    { name: "Енглески пословни језик 4", semester: 8, status: "Обавезни", espb: 4, href: "/assets/files/predmeti/E83- Engleski poslovni jezik 4.pdf" },
    { name: "Управљање квалитетом", semester: 8, status: "Изборни", espb: 6, href: "/assets/files/predmeti/E841- Upravljanje kvalitetom.pdf" },
    { name: "Контрола и ревизија", semester: 8, status: "Изборни", espb: 6, href: "/assets/files/predmeti/E842- Kontrola i revizija.pdf" }
];

const selection = ref([
    {
        "key":1,
        "title": "Прва година",
        payload: {
            datas: godina1
        },
    },
    {
        "key":2,
        "title": "Друга година",
        payload: {
            datas: godina2
        },
    },
    {
        "key":3,
        "title": "Трећа година",
        payload: {
            datas: godina3
        },
    },
    {
        "key":4,
        "title": "Четврта година",
        payload: {
            datas: godina4
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
