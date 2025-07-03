<template>
    <Form @submit="submit" :key="formKey" :validation-schema="simpleSchema" :initial-values="initialValues">
        <div class="form-group my-12">
            <label for="name">Unesite naslov objave</label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-stone-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="title" />
        </div>
        <div class="form-group my-12">
            <label for="content">Unesite opis objave</label>
            <QuillEditor v-model:content="editorData" contentType="html" id="content" name="content" />
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="mt-10">Izaberite tip objave:</Label>
            <div class="flex w-full gap-3">
                <Label for="zanimljivosti">Zanimiljivosti:</Label>
                <Field id="zanimljivosti" name="category" type="radio" value="zanimljivosti" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="nastava">Nastava:</Label>
                <Field id="nastava" name="category" type="radio" value="nastava" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="dogadjaji">Dogadjaji:</Label>
                <Field id="dogadjaji" name="category" type="radio" value="događaji" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="category" />
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ type == 'add' ? 'Dodaj' : 'Izmeni' }}</button>

    </Form>
</template>
<script setup>
import {ref, defineProps, defineEmits, onBeforeMount, computed, reactive} from 'vue';
import {Form,Field,ErrorMessage} from 'vee-validate';
// import {useToast} from 'vue-toast-notification';
// const toast = useToast();
const emit = defineEmits(['closeModal','refreshRooms']);
import axios from 'axios';

import * as yup from 'yup';
import { QuillEditor } from '@vueup/vue-quill'
const editorData = ref('');
const simpleSchema = yup.object({
    title: yup.string().required('Ime je obavezeno polje'),
    category : yup.string().required('Morate odabrati tip objave'),
})
const formKey = ref(0);

const props = defineProps({
    formsData : Object,
    id : Number,
    type : {
        required : false,
        default : 'add'
    }
})

const formValues = reactive(
    {
        "title" : '',
        "category" : "",
    }
);

const initialValues = computed(() => formValues.value);

onBeforeMount(async ()=>{
    if(props.id){
        console.log("Uslii");
        await getOneNotice(props.id);
    }
})

const getOneNotice = async ()=>{

    const response = await axios.get(`/admin/obavestenja/${props.id}`);
    const notice = response.data.notice;

    formValues.value = {
        title: notice.title || '',
        category: notice.category || '',
    };

    editorData.value =  notice.content || '';

    formKey.value++;

}



const submit = async (values)=>{
        const formData =getsFormData({...values,'content':editorData.value});
        console.log(formData);
        try {
            let response = null;
            if (props.type === 'add') {
                response = await axios.post('/admin/obavestenja', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });
            } else if (props.type === 'edit') {
                response = await axios.post(`/admin/obavestenja/${props.id}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });
            }
            // toast.success(response.data.message, {duration: 3000});
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

    formData.append('title',values.title);
    formData.append('content', values.content);
    formData.append('category', values.category);
    return formData;

}
</script>
