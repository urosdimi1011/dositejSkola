<template>
    <admin-layout>
        <Table>
            <TableHeader :headers="headersOfTable"></TableHeader>
            <TableBody :data="dataForBody" :headers="headersOfTable" :number-of-column="headersOfTable.length"></TableBody>
        </Table>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="addNewRooms()">Dodaj novog clana osoblja</button>
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
import StaffMembersForm from "@/components/myComponents/forms/StaffMembersForm.vue";
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
    const response = await axios.get('/admin/osobljeSvo');
    dataForBody.value = response.data.osoblje;
}
// Ovo mora svaka tabela da prosledi !!!
const headersOfTable = ref<HeadersIntefrace[]>([
    {
        "name": "id",
        'label': "Id"
    },
    {
        "name": "name",
        'label': "Ime i prezime"
    },
    {
        "name": "email",
        'label': "Email"
    },
    {
        "name": "role",
        'label': "Tip nastavnika"
    },
    {
        "name": "photo_path",
        'label': "Slika nastavnika",
        "type": "img"
    },

    {
        "name": "created_at",
        'label': "Postavljeno(datum)"
    },
    {
        "name": "edit",
        'label': "Izmeni osoblje",
        'actions' : (row)=>{
            if(!row) return;
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Izmeni osoblje';
            dialog.dialogComponent= StaffMembersForm;
            dialog.dialogProps = {'id':row.id,'type':'edit'};
        },
        "class":"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    },
    {
        "name": "delete",
        'label': "Obrisi osoblje",
        'actions' : (row)=>{
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Da li ste sigurni da zelite da obrisete osoblje?';
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
    dialog.dialogTitle = "Dodaj clana osoblja";
    dialog.dialogComponent = StaffMembersForm;
}
</script>
<style scoped>
div[data-state="open"]{
    width: 100% !important;
    max-width: max-content !important;
}
</style>
