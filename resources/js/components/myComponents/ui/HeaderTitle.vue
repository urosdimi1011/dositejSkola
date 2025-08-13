<template>
    <div class="bg-[url('/assets/img/slikaSlajder2.jpg')]
         bg-center bg-fixed bg-cover relative header-bigger-block text-gray-50 text-center mb-10 bg-red-800 py-2 shadow-xl">
        <div class="absolute inset-0 bg-red-800 opacity-70 pointer-events-none"></div>
        <h1 data-aos="fade-down" class="!text-2xl sm:!text-3xl font-medium text-shadow-lg"><slot></slot></h1>
        <span class="relative mx-auto h-1 block rounded-sm w-[11%] bg-red-800 overflow-hidden">
          <span class="absolute inset-y-0 left-[-30%] w-[20%] bg-red-500/30 animate-shimmer rounded-sm"></span>
        </span>
        <!-- Prikaz breadcrumb-a ako postoji niz stavki -->
        <nav data-aos="fade-down" v-if="props.breadcrumbs && props.breadcrumbs.length" class="mt-4 !text-sm sm:!text-lg">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li v-for="(breadcrumb, index) in props.breadcrumbs" :key="index" class="flex items-center mr-0">
                    <template v-if="breadcrumb.url && index !== props.breadcrumbs.length - 1">
                        <span class="text-gray-50">
                            {{latinToCyrillic(breadcrumb.label)}}
                        </span>
                        <span class="mx-2">/</span>
                    </template>
                    <template v-else>
                        <span class="text-gray-300">{{ latinToCyrillic(breadcrumb.label )}}</span>
                    </template>
                </li>
            </ol>
        </nav>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();

function latinToCyrillic(text) {
    const map = {
        'dj': 'ђ', 'nj': 'њ', 'lj': 'љ',
        'a': 'а', 'b': 'б', 'v': 'в', 'g': 'г', 'd': 'д', 'đ': 'ђ',
        'e': 'е', 'ž': 'ж', 'z': 'з', 'i': 'и', 'j': 'ј', 'k': 'к',
        'l': 'л', 'm': 'м', 'n': 'н', 'o': 'о', 'p': 'п', 'r': 'р',
        's': 'с', 't': 'т', 'ć': 'ћ', 'u': 'у', 'f': 'ф', 'h': 'х',
        'c': 'ц', 'č': 'ч', 'š': 'ш',
        'Dž': 'Џ', 'Nj': 'Њ', 'Lj': 'Љ'
    };
    return text.replace(/nj|lj|dž|[a-zćčđšž]/gi, match => {
        const lower = match.toLowerCase();
        const isUpper = match[0] === match[0].toUpperCase();
        const converted = map[lower] || match;
        return isUpper ? converted.toUpperCase() : converted;
    });
}

</script>
<style scoped>
@keyframes shimmer {
    0% {
        left: -30%;
        opacity: 0;
    }
    30% {
        opacity: 1;
    }
    50% {
        left: 50%;
        opacity: 0.3;
    }
    100% {
        left: 100%;
        opacity: 0;
    }
}

.animate-shimmer {
    animation: shimmer 5s ease-in-out infinite;
}
</style>
