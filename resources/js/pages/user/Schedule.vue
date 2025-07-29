<template>
    <my-layout>
        <div class="schedules ">
            <header-title >
                <strong class="font-bold">Распоред</strong> {{typeOfSchedule}}
            </header-title>

            <div class="schedules-block max-w-screen-xl mx-auto">
                <button
                    id="dropdownRadioHelperButton" data-dropdown-toggle="dropdownRadioHelper" class="cursor-pointer mt-3 flex items-center text-red-700 border border-orange-400 px-3 py-1 text-sm rounded hover:bg-orange-50 transition" type="button">Изабери студијски програм <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownRadioHelper" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-60 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioHelperButton">
                        <li>
                            <div class="flex p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex items-center h-5">
                                    <input v-model="selectedStudyProgram" @change="changeStudyType()" id="helper-radio-5" name="id_study_program" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-radio-5" class="font-medium text-gray-900 dark:text-gray-300">
                                        <div>Сви студијски програми</div>
                                        <p id="helper-radio-text-4" class="text-xs font-normal text-gray-500 dark:text-gray-300">Биће приказани сви распореди студијских програма.</p>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex items-center h-5">
                                    <input v-model="selectedStudyProgram" @change="changeStudyType()" id="helper-radio-4" name="id_study_program" type="radio" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-radio-4" class="font-medium text-gray-900 dark:text-gray-300">
                                        <div>Информатика</div>
                                        <p id="helper-radio-text-4" class="text-xs font-normal text-gray-500 dark:text-gray-300">Биће приказани само расореди за смер Информатика.</p>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex items-center h-5">
                                    <input v-model="selectedStudyProgram" @change="changeStudyType()" id="helper-radio-6" name="id_study_program" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-radio-6" class="font-medium text-gray-900 dark:text-gray-300">
                                        <div>Економија</div>
                                        <p id="helper-radio-text-6" class="text-xs font-normal text-gray-500 dark:text-gray-300">Биће приказани само расореди за смер Економија.</p>
                                    </label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <template v-if="spinnerLoading">
                    <div
                        class="min-h-[200px] flex items-center justify-center"
                    >
                        <svg
                            class="w-12 h-12 text-red-600 animate-spin"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25"
                                cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"
                            />
                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8v4l5-5-5-5v4a8 8 0 100 16z"
                            />
                        </svg>
                    </div>
                </template>
                <template v-else-if="hasSchedules">
                    <ScheduleComponent v-for="raspored in rasporediMoji" :key="raspored.id" :raspored="raspored"/>
                </template>
                <template v-else>
                    <h3 class="text-gray-500 my-4">Тренутно нема распореда {{ typeOfSchedule }}</h3>
                </template>
            </div>

        </div>

    </my-layout>
</template>
<script setup lang="ts">
import MyLayout from "@/layouts/myLayout.vue";
import {computed, onMounted,onBeforeUnmount} from "vue";
import {initFlowbite} from 'flowbite';
import {defineProps,ref} from 'vue';
import {ScheduleI} from "@/types";
import ScheduleComponent from "@/components/myComponents/ui/ScheduleComponent.vue";
import axios from "axios";
import { Dropdown } from 'flowbite';
import HeaderTitle from "@/components/myComponents/ui/HeaderTitle.vue";
onMounted(()=>{
    initFlowbite();
})
const spinnerLoading = ref(false);
const selectedStudyProgram = ref(0);
let dropdownMenu : HTMLElement | null;
let dropdownButton : HTMLElement | null;
let dropdown;
onMounted(() => {
    dropdownMenu = document.getElementById('dropdownRadioHelper');
    dropdownButton = document.getElementById('dropdownRadioHelperButton')
    dropdown = new Dropdown(dropdownMenu,dropdownButton)
})
// onBeforeUnmount(() => {
//     dropdown = null
// })
const typeOfSchedule = computed(()=>{
    if(props.type === 'ispita'){
        return 'Испита';
    }
    else if(props.type == 'nastave'){
        return 'Наставе';
    }
})


const changeStudyType = async () => {
    dropdown.hide();
    spinnerLoading.value = true;
    let params = {'type': props.type};
    if(selectedStudyProgram.value != "0"){
         params.study_program_id =selectedStudyProgram.value;
    }
    const response = await axios.get('/raspored',{
        params
    })
    rasporediMoji.value = response.data.raspored;
    spinnerLoading.value = false;
}

const props = defineProps<{
    rasporedi : ScheduleI[],
    type : string
}>();

const rasporediMoji = ref(props.rasporedi);

const hasSchedules = computed(()=>rasporediMoji.value.length > 0);

</script>
