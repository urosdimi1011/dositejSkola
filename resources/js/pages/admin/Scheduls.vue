<template>
    <admin-layout>
        <Table>
            <TableHeader :headers="headersOfTable"></TableHeader>
            <TableBody :data="dataForBody" :headers="headersOfTable" :number-of-column="headersOfTable.length"></TableBody>
        </Table>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="addNewRooms()">Dodaj novi raspored</button>
        <DialogRoot v-model:open="dialog.isDialogOpen">
            <DialogContent class="!max-w-max !w-full !max-h-max !max-h-screen !md:max-h-[600px] !overflow-y-auto scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-gray-900">
                <DialogTitle><h2>{{dialog.dialogTitle}}</h2></DialogTitle>
                <component @refreshRooms="getAllData()" :is="dialog.dialogComponent" v-bind="dialog.dialogProps" @closeModal="dialog.isDialogOpen = false"></component>
                <DialogClose>
                    <button type="button">Zatvori</button>
                </DialogClose>
            </DialogContent>
            <!--            </Dialog>-->
        </DialogRoot>
    </admin-layout>
</template>
<script setup lang="ts">
import AdminLayout from "@/layouts/adminLayout.vue";
import Table from "@/components/myComponents/Table.vue";
import TableHeader from "@/components/myComponents/tableHeader.vue";
import TableBody from "@/components/myComponents/tableBody.vue";
import {reactive, ref,onMounted} from "vue";
import {HeadersIntefrace, ScheduleData} from '@/types';
import DialogContent from "@/components/ui/dialog/DialogContent.vue";
import DialogTitle from "@/components/ui/dialog/DialogTitle.vue";
import DialogClose from "@/components/ui/dialog/DialogClose.vue";
import {DialogRoot} from "reka-ui";
import Button from "@/components/ui/button/Button.vue";
import ScheduleForm from '@/components/myComponents/forms/ScheduleForm.vue';
import axios from "axios";
import {boolean} from "yup";
// const store = useStore();
const dialog = reactive({
    isDialogOpen : false,
    dialogTitle : '',
    dialogComponent : null,
    dialogProps : {}
})
onMounted(async ()=>{
    await getAllData();
})
const getAllData = async ()=>{
    const response = await axios.get('/admin/rasporediSvi');
    dataForBody.value = response.data.rasporedi;
}
// Ovo mora svaka tabela da prosledi !!!
const headersOfTable = ref<HeadersIntefrace[]>([
    {
        "name": "id",
        'label': "Id"
    },
    {
        "name": "title",
        'label': "Naslov"
    },
    {
        "name": "is_active",
        "type" : 'toggle',
        'label': "Da li je vidljivo",
        'actions':async (values)=>{

            const data = new FormData();
            console.log(values.checked);
            data.append('is_published',values.checked);
            data.append('_method', 'PATCH');

            const response = await axios.post(`/admin/raspored/${values.id}/published`,data,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            await getAllData();
        }
    },
    {
        "name": "created_at",
        'label': "Postavljeno(datum)"
    },
    {
        "name": "edit",
        'label': "Izmeni raspored",
        'actions' : (row)=>{
            if(!row) return;
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Izmeni raspored';
            dialog.dialogComponent= ScheduleForm;
            dialog.dialogProps = {'id':row.id,'type':'edit'};
        },
        "class":"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    },
    {
        "name": "delete",
        'label': "Obrisi raspored",
        'actions' : (row)=>{
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Da li ste sigurni da zelite da obrisete sobu?';
            dialog.dialogProps = {'id':row.id};
            dialog.dialogComponent= RoomDeleteConfirm;

            //Ovde sada treba da se otvori modal za izmenu sobe i da prikaze sve podateke vec u formi za izmenu
            //samo da vidim kako to sad mogu da odradim
        },
        "class":"bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    },
]);

const dataForBody = ref<ScheduleData[]>([]);
const closeModal = ref(false);
//Ovo su realni podaci sa apija!

const addNewRooms = ()=>{
    dialog.isDialogOpen = true;
    dialog.dialogProps = null;
    dialog.dialogTitle = "Dodaj novi raspored";
    dialog.dialogComponent = ScheduleForm;
}
</script>
<style scoped>
div[data-state="open"]{
    width: 100% !important;
    max-width: max-content !important;
}
</style>
