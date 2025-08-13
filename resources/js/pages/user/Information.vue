<template>
    <my-layout>
        <header-title>
            <p class="strong">Информатика</p>
        </header-title>
        <div class="informatika-block mx-auto max-w-screen-xl">
            <div class="header-block my-10">
                <h2 class="!text-lg sm:!text-2xl text-gray-950 font-medium">
                    Основне академске студије
                    <span class="underline w-1/12 bg-red-800 h-1 block rounded-sm"></span>
                </h2>
            </div>
            <div class="content my-10 !px-2 sm:!px-0">
                <div class="grid !grid-cols-1 sm:!grid-cols-2 items-center">
                    <div class="content">
                        <h3 class="!text-md sm:!text-xl text-gray-500">СТРУКТУРА СТУДИЈСКОГ ПРОГРАМА – ОСНОВНИХ АКАДЕМСКИХ СТУДИЈА</h3>
                        <p class="my-5">Студијски програм Информатика је креиран у циљу формирања компетентног педагошког и информатичког кадра. Савладавањем студијског програма студент је способан да професионално обавља послове у области просвете, индустрије, здравства, државној управи, услужних делатности, и сличним областима где су применљива знања из области информатике, као и за наставак студија. Наставни програм је базиран на интеграцији знања из различитих дисциплина, које обезбеђују пројектоване информатичке компетенције којима студенти треба да овладају. Програмски сегменти обезбеђују постизање следећих карактеристика:</p>
                        <ul class="list-disc pl-5 text-red-800">
                            <li class="my-3">Отвореност архитектуре програма (студијски програм није строго хијерархијски обликован и могуће је његово унапређење на принципима конкурентног информатичког тржишта)</li>
                            <li class="my-3">Флексибиност (могућност за лако додавање модерних знања и парадигми из диманичког информационо-рачунарског домена)
                                Преносивост (потпуно поштовање концепта ЕСПБ вредновања наставних предмета)</li>
                            <li class="my-3">Препознатљивост и усклађеност (по називу и садржају наставних предмета са студијским програмима у образовном простору Републике Србије и ЕУ)</li>
                            <li class="my-3">Изборност (могућност да студент према сопственим афинитетима одабере ужу област за постизање информатичке изврсности)</li>
                        </ul>
                    </div>
                    <div class="content">
                        <img src="/assets/img/info.jpg" class="max-w-full rounded boder border-red-800/40 border-[2px] shadow-md" alt="informatika"/>
                    </div>
                </div>



                <div data-aos="fade-left" class="content my-10">
                    <h3 class="!text-lg sm:!text-xl text-gray-500 uppercase my-2">Предмети</h3>
                    <div class="content grid gap-3 !grid-cols-1 md:!grid-cols-2">
                        <div class="predmeti">
                            <Accordian :items="selection" :active-item-key="1">
                                <template #default="{item}">
                                    <Table :datas="item.payload.datas" :headers="tableHeder">
                                        <template #cell(name)="{ value, item }">
<!--                                            {{item}}-->
                                            <a v-if="item.href" :href="'/assets/files'+item.href" class="transition hover:!text-red-800" target="_blank">
                                                {{ value }}
                                            </a>
                                            <span v-else>{{ value }}</span>
                                        </template>
                                    </Table>
                                </template>
                            </Accordian>
                        </div>
                        <div class="cont">
                            <h4 class="mb-5">У складу са претходним, наставни програми су контекстно лоцирани у неколико целина:</h4>
                            <ul class="list-disc pl-5 text-red-800">
                                <li class="my-3">Предмети који обезбеђују језичке компетенције:<strong> Енглески језик 1, 2, 3 и 4.</strong></li>
                                <li class="my-3">Предмети методичко-дидактичког карактера као што су <strong>Информационе технологије у образовању, Педагогија, Психологија, Мултимедијални системи у настави информатике.</strong></li>
                                <li class="my-3">Предмети који обезбеђују фундаментална математичка знања: <strong>Линеарна алгебра, Аналитичка геометрија, Дискретне структуре, Математичка анализа, Нумеричка анализа, Вероватноћа и статистика.</strong></li>
                                <li class="my-3">Предмети који су намењени за овладавање Веб технологијама:<strong> Веб технологије, Развој Веб апликација, Веб програмирање.</strong></li>
                                <li class="my-3">Предмети за стицање компентенције у домену базе података: <strong> Дизајнирање корисничког интерфејса, Базе података…</strong></li>
                                <li class="my-3">Предмети за стицање копентенције у домену економије и права: <strong>Основи менаџмента, Предузетништво, Дигитални маркетинг, Електронско пословање.</strong></li>
                                <li class="my-3">Предмети везани за знања и вештине из домена рачунарског хардвера: <strong>Архитектура и организација дигиталних рачунара, Рачунарске мреже…</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" class="content">
                    <h3 class="!text-lg sm:!text-xl text-gray-500 uppercase">О студијама</h3>
                    <p class="my-10">Студијски програм Информатика има <strong>34 обавезних предмета и 10 изборних предмета</strong>, стучну праксу и завршни рад.
                        Школска година се дели на <strong>два семестра</strong>, од којих сваки траје<strong> 15 недеља</strong>.
                        Настава се изводи по наставним плановима и наставним програмима.</p>
                    <p class="my-5">Настава се изводи континуирано током <strong>8 семестра</strong> према утврђеном наставном плану и програму и завршеном студију стиче се <strong>240 ЕСПБ бодова.</strong></p>
                    <p class="my-5">Студент који није успешно савладао обавезни предмет до почетка средње школске године, у наредној школској години уписује (слуша и полаже) исти предмет. Студент који није успешно савладао изборни предмет, може поново да упише исти или да се определи за други изборни предмет.</p>
                    <p class="my-5">Студент може да пређе на овај студијски програм у другим студијским програмима исте или сродних области, ако има положен испит који одговара овом студијском програму и ако је остварио потребан број ЕСПБ бодова за упис на одговарајућу годину.</p>
                    <p class="my-5">Студијски програм се реализује кроз предавања (п), вежбе (в) и друге облике активне наставе (дон).</p>

                </div>
            </div>
        </div>
    </my-layout>
</template>
<script setup lang="ts">
import MyLayout from "@/layouts/myLayout.vue";
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
import {onMounted,ref} from "vue";
import {initFlowbite} from "flowbite";
import Accordian from "@/components/myComponents/ui/Accordian.vue";
import Table from "@/components/myComponents/ui/Table.vue";
import {useHead} from "@vueuse/head";

useHead({
    title: 'Информатика - Основне академске студије | Висока школа Доситеј',
    meta: [
        {
            name: 'description',
            content: 'Основне академске студије информатике на Високој школи академских студија „Доситеј” припремају студенте за рад у образовању, индустрији, управи и другим секторима, са нагласком на ИТ и педагошке компетенције.'
        },
        {
            name: 'keywords',
            content: 'информатика, високо образовање, основне академске студије, доситеј, информационе технологије, наставни предмети, ИТ у образовању, педагошки ИТ, Веб технологије, базе података, еспб, ИТ студије Србија'
        },
        {
            name: 'author',
            content: 'Висока школа Доситеј'
        },
        {
            property: 'og:title',
            content: 'Информатика - Основне академске студије | Висока школа Доситеј'
        },
        {
            property: 'og:description',
            content: 'Званични наставни план и програм за студије Информатике – прва до четврта година. Детаљни подаци о предметима, ЕСПБ бодовима, и структури програма.'
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: 'https://vsdositej.edu.rs/informatika'
        },
        {
            property: 'og:image',
            content: 'https://vsdositej.edu.rs/favicon.ico'
        },
        {
            name: 'twitter:card',
            content: 'summary_large_image'
        },
        {
            name: 'twitter:title',
            content: 'Информатика - Основне академске студије'
        },
        {
            name: 'twitter:description',
            content: 'Преглед наставних предмета и структуре програма основних студија Информатике на Високој школи Доситеј.'
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: 'https://vsdositej.edu.rs/informatika'
        }
    ]
});

onMounted(()=>{
    initFlowbite();
})
const prvaGodinaPredmeti = [
    {
        name: "Informacione tehnologije",
        status: "Obavezni",
        semestar: "I",
        espb: 7,
        href: "/informatika/informacione-tehnologije.pdf"
    },
    {
        name: "Linearna algebra",
        status: "Obavezni",
        semestar: "I",
        espb: 7,
        href: "/informatika/linearna-algerba.pdf"
    },
    {
        name: "Osnovi menadžmenta",
        status: "Obavezni",
        semestar: "I",
        espb: 6,
        href: "/informatika/osnovi-menadzmenta.pdf"
    },
    {
        name: "Engleski jezik 1",
        status: "Obavezni",
        semestar: "I",
        espb: 4,
        href: "/informatika/engleski1.pdf"
    },
    {
        name: "Analitička geometrija",
        status: "Obavezni",
        semestar: "I",
        espb: 6,
        href: "/informatika/analiticka-geometrija.pdf"
    },
    {
        name: "Engleski jezik 2",
        status: "Obavezni",
        semestar: "II",
        espb: 4,
        href: "/informatika/engleski2.pdf"
    },
    {
        name: "Matematička analiza",
        status: "Obavezni",
        semestar: "II",
        espb: 6,
        href: "/informatika/matematicka-analiza.pdf"
    },
    {
        name: "Struktura podataka i algoritmi",
        status: "Obavezni",
        semestar: "II",
        espb: 7,
        href: "/informatika/strukture-podataka-i-algoritmi.pdf"
    },
    {
        name: "Preduzetništvo",
        status: "Obavezni",
        semestar: "II",
        espb: 6,
        href: "/informatika/preduzetnistvo.pdf"
    },
    {
        name: "Arhitektura i organizacija digitalnih računara",
        status: "Obavezni",
        semestar: "II",
        espb: 7,
        href: "/informatika/arhitektura-i-organizaija-digitalnih-racuna.pdf"
    }
];

const drugaGodinaPredmeti = [
    {
        name: "Verovatnoća i statistika",
        status: "Obavezni",
        semestar: "III",
        espb: 7,
        href: "/informatika/verovatnoca-i-statistika.pdf"
    },
    {
        name: "Objektno orijentisano programiranje",
        status: "Obavezni",
        semestar: "III",
        espb: 7,
        href: "/informatika/objektno-orijentisano-programiranje.pdf"
    },
    {
        name: "Engleski jezik 3",
        status: "Obavezni",
        semestar: "III",
        espb: 4,
        href: "/informatika/engleski3.pdf"
    },
    {
        name: "Diskretne strukture",
        status: "Obavezni",
        semestar: "III",
        espb: 7,
        href: "/informatika/diskretne-strukture.pdf"
    },
    {
        name: "WEB tehnologije",
        status: "Izborni",
        semestar: "III",
        espb: 8,
        href: "/informatika/web-tehnologije.pdf"
    },
    {
        name: "Razvoj WEB aplikacija",
        status: "Izborni",
        semestar: "III",
        espb: 8,
        href: "/informatika/razvoj-web-aplikacija.pdf"
    },
    {
        name: "Internet inteligentnih uređaja",
        status: "Obavezni",
        semestar: "IV",
        espb: 6,
        href: "/informatika/internet-inteligentnih-uredjaja.pdf"
    },
    {
        name: "Kodovanje i teorija informacija",
        status: "Izborni",
        semestar: "IV",
        espb: 10,
        href: "/informatika/kodovanje-i-teorija-informacija.pdf"
    },
    {
        name: "Upravljanje IT projektima",
        status: "Izborni",
        semestar: "IV",
        espb: 10,
        href: "/informatika/upravljanje-it-projektima.pdf"
    },
    {
        name: "Engleski jezik 4",
        status: "Obavezni",
        semestar: "IV",
        espb: 4,
        href: "/informatika/engleski4.pdf"
    },
    {
        name: "Numerička analiza",
        status: "Obavezni",
        semestar: "IV",
        espb: 7,
        href: "/informatika/numericka-analiza.pdf"
    }
];

const trecaGodinaPredmeti = [
    {
        name: "Baze podataka",
        status: "Obavezni",
        semestar: "V",
        espb: 6,
        href: "/informatika/baze-podataka.pdf"
    },
    {
        name: "Pedagoško-metodički aspekti u IT",
        status: "Obavezni",
        semestar: "V",
        espb: 7,
        href: "/informatika/pedagoski-metodicki-aspekti-u-it.pdf"
    },
    {
        name: "Elektronsko izdavaštvo",
        status: "Izborni",
        semestar: "V",
        espb: 7,
        href: "/informatika/elektronsko-izdavastvo.pdf"
    },
    {
        name: "Elektronska uprava",
        status: "Izborni",
        semestar: "V",
        espb: 7,
        href: "/informatika/elektronska-uprava.pdf"
    },
    {
        name: "Sigurnost i zaštita računarskih sistema",
        status: "Izborni",
        semestar: "VI",
        espb: 6,
        href: "/informatika/sigurnosti-i-zastite-racunarskih-sistema.pdf"
    },
    {
        name: "Informacione tehnologije u obrazovanju",
        status: "Obavezni",
        semestar: "VI",
        espb: 7,
        href: "/informatika/informacione-tehnologije-u-obrazovanju.pdf"
    },
    {
        name: "Pravni aspekti informatike",
        status: "Izborni",
        semestar: "VI",
        espb: 8,
        href: "/informatika/pravni-aspekti-informatike.pdf"
    },
    {
        name: "Poslovna komunikacija",
        status: "Obavezni",
        semestar: "VI",
        espb: 8,
        href: "/informatika/poslovna-komunikacija.pdf"
    },
    {
        name: "Operativni sistemi",
        status: "Obavezni",
        semestar: "VI",
        espb: 6,
        href: "/informatika/operativni-sistemi.pdf"
    },
    {
        name: "Psihološko-metodički aspekti u IT",
        status: "Obavezni",
        semestar: "VI",
        espb: 7,
        href: "/informatika/psiholosko-metodicki-aspekti-u-it.pdf"
    },
    {
        name: "Multimedijalni sistemi u nastavi informatike",
        status: "Obavezni",
        semestar: "VI",
        espb: 6,
        href: "/informatika/multimedijalni-sistemi-u-nastavi-informatike.pdf"
    }
];

const cetvrtaGodinaPredmeti = [
    {
        name: "Poslovni informacioni sistemi",
        status: "Obavezni",
        semestar: "VII",
        espb: 6,
        href: "/informatika/poslovni-informacioni-sistemi.pdf"
    },
    {
        name: "Računarski alati",
        status: "Obavezni",
        semestar: "VII",
        espb: 6,
        href: "/informatika/racunarski-alati.pdf"
    },
    {
        name: "Operaciona istraživanja",
        status: "Izborni",
        semestar: "VII",
        espb: 9,
        href: "/informatika/operaciona-istrazivanja.pdf"
    },
    {
        name: "Digitalni marketing",
        status: "Izborni",
        semestar: "VII",
        espb: 9,
        href: "/informatika/digitalni-marketing.pdf"
    },
    {
        name: "Alati i tehnologije za elektronsko učenje",
        status: "Obavezni",
        semestar: "VIII",
        espb: 6,
        href: "/informatika/alati-i-tehnologije-za-elektronsko-upravljanje.pdf"
    },
    {
        name: "Poslovno pravo",
        status: "Izborni",
        semestar: "VIII",
        espb: 9,
        href: "/informatika/poslovno-pravo.pdf"
    },
    {
        name: "Elektronsko poslovanje",
        status: "Izborni",
        semestar: "VIII",
        espb: 9,
        href: "/informatika/elektronsko-poslovanje.pdf"
    },
    {
        name: "Metodika nastave informatike",
        status: "Obavezni",
        semestar: "VIII",
        espb: 6,
        href: "/informatika/metodika-nastave-informatika.pdf"
    },
    {
        name: "Dizajniranje korisničkog interfejsa",
        status: "Obavezni",
        semestar: "VIII",
        espb: 6,
        href: "/informatika/dizajniranje-korisnickog-interfejsa.pdf"
    },
    {
        name: "Stručna praksa",
        status: "Obavezni",
        semestar: "VIII",
        espb: 4,
        href: "/informatika/stucna-praksa.pdf"
    },
    {
        name: "Završni rad",
        status: "Obavezni",
        semestar: "VIII",
        espb: 8,
        href: "/informatika/zavrsni-rad.pdf"
    }
];

const selection =  ref([
    {
        key: 1,
        title: "Прва година",
        payload: {
            datas: prvaGodinaPredmeti
        },
    },
    {
        key: 2,
        title: "Друга година",
        payload: {
            datas: drugaGodinaPredmeti
        }
    },
    {
        key: 3,
        title: "Трећа година",
        payload: {
            datas: trecaGodinaPredmeti
        }
    },
    {
        key: 4,
        title: "Четврта година",
        payload: {
            datas: cetvrtaGodinaPredmeti
        }
    },

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
        name:"semestar",
        title:"Семестар"
    },
    {
        id:4,
        name:"espb",
        title:"ЕСПБ"
    }
]);


</script>
