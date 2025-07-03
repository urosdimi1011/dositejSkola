<template>
    <Form @submit="submit" :key="formKey" :validation-schema="simpleSchema" :initial-values="initialValues">
        <div class="form-group my-12">
            <label for="name">Unesite naslov rasporeda</label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-stone-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="title" />
        </div>
        <div class="form-group my-12">
            <div class="flex items-center gap-1 form-group flex-wrap">
                <Label class="w-40" for="mainImg">Unesite fajl:</Label>
                <Field id="mainImg" class="dark:text-stone-50 text-gray-700" name="file_path" type="file"/>
                <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="file_path" />
            </div>
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="mt-10">Izaberite tip rasporeda:</Label>
            <div class="flex w-full gap-3">
                <Label for="apartman">Raspored ispita:</Label>
                <Field id="category" name="type" type="radio" value="ispita" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="apartman">Raspored nastave:</Label>
                <Field id="category" name="type" type="radio" value="nastave" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="apartman">Kalendar aktivnosti:</Label>
                <Field id="category" name="type" type="radio" value="aktivnosti" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="type" />
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="mt-10">Izaberite za koji je studijski program:</Label>
            <div class="flex w-full gap-3">
                <Label for="study_program_id">Ekonomija:</Label>
                <Field id="study_program_id" name="study_program_id" class="!border" type="radio" value="1" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="study_program_id">Informatika:</Label>
                <Field id="study_program_id" name="study_program_id" class="!border" type="radio" value="2" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="type" />
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ type == 'add' ? 'Dodaj' : 'Izmeni' }}</button>

    </Form>
</template>
<script setup>
import {ref, defineProps, defineEmits, onBeforeMount, computed, reactive} from 'vue';
import {Form,Field,ErrorMessage} from 'vee-validate';
const emit = defineEmits(['closeModal','refreshRooms']);
import axios from 'axios';
import * as yup from 'yup';

const props = defineProps({
    formsData : Object,
    id : Number,
    type : {
        required : false,
        default : 'add'
    }
})
const simpleSchema = yup.object({
    file_path: props.type === 'add'
        ? yup.mixed().required('Fajl je obavezan')
        : yup.mixed().nullable(),
    title: yup.string().required('Ime je obavezeno polje'),
    type : yup.string().required('Morate odabrati tip rasporeda')

})
const formKey = ref(0);



const formValues = reactive(
    {
        "title" : '',
        "type" : "",
        "study_program_id" : "",
    }
);

const initialValues = computed(() => formValues.value);

onBeforeMount(async ()=>{
    if(props.id){
        await getOneSchedule(props.id);
    }
})

const getOneSchedule = async ()=>{

    const response = await axios.get(`/admin/raspored/${props.id}`);
    const schedule = response.data.raspored;

    formValues.value = {
        title: schedule.title || '',
        type: schedule.type || '',
        study_program_id : schedule.study_program_id ? schedule.study_program_id.toString() : ''
    };
    console.log(formValues.value);
    formKey.value++;
}



const submit = async (values)=>{
    const formData =getsFormData({...values});
    try {
        let response = null;
        if (props.type === 'add') {
            response = await axios.post('/admin/raspored', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
        } else if (props.type === 'edit') {
            response = await axios.post(`/admin/raspored/${props.id}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
        }
        emit('closeModal', false);
        emit('refreshRooms');
    }
    catch (error){
        // toast.error(error);
    }


}

const getsFormData =(values)=>{
    const formData = new FormData();

    if(props.type === 'edit'){
        formData.append('_method', 'PATCH');
    }
    if (values.file_path) {
        formData.append('file_path', values.file_path);
    }
    formData.append('title',values.title);
    if(values.study_program_id){
        formData.append('study_program_id', values.study_program_id);
    }
    formData.append('type', values.type);
    return formData;

}
</script>
