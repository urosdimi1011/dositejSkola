<template>
    <Form @submit="submit" :validation-schema="simpleSchema" >
        <div class="form-group my-12">
            <label for="name">Unesite naslov objave</label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-stone-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="name" />
        </div>
        <div class="form-group my-12">
            <label for="content">Unesite opis objave</label>
            <QuillEditor v-model:content="editorData" contentType="html" id="content" name="content" />
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="mt-10">Izaberite tip objave:</Label>
            <div class="flex w-full gap-3">
                <Label for="apartman">Zanimiljivosti:</Label>
                <Field id="category" name="category" type="radio" value="zanimljivosti" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="apartman">Nastava:</Label>
                <Field id="category" name="category" type="radio" value="nastava" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="apartman">Dogadjaji:</Label>
                <Field id="category" name="category" type="radio" value="dogadjaji" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="category" />
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ type == 'add' ? 'Dodaj' : 'Izmeni' }}</button>

    </Form>
</template>
<script setup>
import {ref,defineProps,defineEmits} from 'vue';
import {Form,Field,ErrorMessage} from 'vee-validate';
// import {useToast} from 'vue-toast-notification';
// const toast = useToast();
const emit = defineEmits(['closeModal','refreshRooms']);
import axios from 'axios';

import * as yup from 'yup';
import { QuillEditor } from '@vueup/vue-quill'
const editorData = ref('');
const simpleSchema = yup.object({
    name: yup.string().required('Ime je obavezeno polje'),
    category : yup.string().required('Morate odabrati tip objave'),
})

const props = defineProps({
    formsData : Object,
    id : Number,
    type : {
        required : false,
        default : 'add'
    }
})



const submit = async (values)=>{
        const formData =getsFormData({...values,'content':editorData.value});
        try {
            let response = null;
            if (props.type === 'add') {
                response = await axios.post('/admin/room', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });
            } else if (props.type === 'edit') {
                response = await axios.post(`/admin/room/${props.id}`, formData, {
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

    formData.append('name',values.name);
    formData.append('content', values.content);
    formData.append('category', values.category);

    return formData;

}
</script>
