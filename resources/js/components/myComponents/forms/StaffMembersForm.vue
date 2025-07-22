<template>
    <Form @submit="submit" :key="formKey" :validation-schema="simpleSchema" :initial-values="initialValues">
        <div class="form-group my-12">
            <label for="name">Unesite ime i prezime osoblja</label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-stone-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="name" />
        </div>
        <div class="form-group my-12">
            <label for="name">Unesite email</label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-stone-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="email" />
        </div>
        <div class="form-group my-12">
            <div class="flex items-center gap-1 form-group flex-wrap">
                <Label class="w-40" for="photo_path">Unesite sliku osobe:</Label>
                <Field id="photo_path" class="dark:text-stone-50 text-gray-700" name="photo_path" type="file"/>
                <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="photo_path" />
            </div>
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="mt-10">Izaberite tip osoblja:</Label>
            <div class="flex w-full gap-3">
                <Label for="category1">Nastavno:</Label>
                <Field id="category1" name="tip" type="radio" value="nastavno" />
            </div>
            <div class="flex w-full gap-3">
                <Label for="category2">Nenastavno:</Label>
                <Field id="category2" name="tip" type="radio" value="nenastavno" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="tip" />
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="mt-10">Izaberite tip prijave:</Label>
            <div class="flex w-full gap-3" v-for="position in positions" :key="position.id">
                <Label :for="'prijava'+ position.id">{{ position.label }}</Label>
                <Field v-model="formValues.prijava" :id="'prijava'+ position.id" name="prijava" type="radio" :value="position.id.toString()" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="tip" />
        </div>
        <div class="form-group my-12">
            <label for="bio">Unesite opis osobe</label>
            <QuillEditor v-model:content="editorData" contentType="html" id="bio" name="bio" />
        </div>
        <div class="flex flex-wrap gap-3 my-5">
            <Label class="align-self-center">Izaberite dokumente za dodavanje:</Label>
            <DocumentComponents  @documents="setNewDocuments"></DocumentComponents>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ type == 'add' ? 'Dodaj' : 'Izmeni' }}</button>

    </Form>
</template>
<script setup>
import {ref, defineProps, defineEmits, onBeforeMount, computed, reactive, onMounted} from 'vue';
import {Form,Field,ErrorMessage} from 'vee-validate';
const emit = defineEmits(['closeModal','refreshRooms']);
import axios from 'axios';
import * as yup from 'yup';
import {QuillEditor} from "@vueup/vue-quill";
import DocumentComponents from "@/components/myComponents/ui/DocumentComponents.vue";

const positions = ref([]);

onMounted(async ()=>{
    // await getAllPositions();
})
const getAllPositions = async ()=>{
    const response = await axios.get('/admin/pozicije');

    positions.value = response.data.positions;
}
const props = defineProps({
    formsData : Object,
    id : Number,
    type : {
        required : false,
        default : 'add'
    }
})
const simpleSchema = yup.object({
    photo_path: props.type === 'add'
        ? yup.mixed().required('Fajl je obavezan')
        : yup.mixed().nullable(),
    name: yup.string().required('Ime je obavezeno polje'),
    email : yup.string().required('Email je obavezno polje'),
    tip : yup.string().required('Tip osoblja je obavezno polje'),
    prijava : yup.string().required("Morate odabrati tip prijave")
})
const formKey = ref(0);
const editorData = ref('');
const  documents = ref([]);

const setNewDocuments = (sendOfDocuments)=> {
    documents.value = sendOfDocuments;
}
const formValues = reactive(
    {
        "title" : '',
        "type" : "",
        "study_program_id" : "",
    }
);

const initialValues = computed(() => formValues.value);

onMounted(async ()=>{
    await getAllPositions();
    if(props.id){
        await getOneSchedule(props.id);
    }
})

const getOneSchedule = async ()=>{

    const response = await axios.get(`/admin/osoblje/${props.id}`);
    const schedule = response.data.osoba;
    formValues.value = {
        name: schedule.name || '',
        email: schedule.email || '',
        tip : schedule.role ? schedule.role.toString() : '',
        prijava : schedule.position_id ? schedule.position_id.toString() : ''
    };
    editorData.value = schedule.bio || '';

    formKey.value++;
}



const submit = async (values)=>{
    const formData =getsFormData({...values,'bio':editorData.value,documents: documents.value});
    try {
        let response = null;
        if (props.type === 'add') {
            response = await axios.post('/admin/osoblje', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
        } else if (props.type === 'edit') {
            response = await axios.post(`/admin/osoblje/${props.id}`, formData, {
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
    if (values.photo_path) {
        formData.append('photo', values.photo_path);
    }
    formData.append('name',values.name);
    formData.append('bio',values.bio);
    formData.append('prijava',values.prijava);
    formData.append('email',values.email);
    if (values.documents && values.documents.length) {
        values.documents.forEach((doc, idx) => {
            // naslov dokumenta
            formData.append(`documents[${idx}][title]`, doc.title);
            // fajl samog dokumenta
            formData.append(`documents[${idx}][file]`,  doc.file);
        });
    }
    if(values.tip){
        formData.append('role', values.tip);
    }
    return formData;

}
</script>
