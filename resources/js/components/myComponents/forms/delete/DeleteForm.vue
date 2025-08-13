<template>
    <form @submit.prevent="submit">
        <button
            type="submit"
            class="text-red-600 hover:text-red-900"
            @click="confirmDelete"
        >
            <slot>Obriši</slot>
        </button>
    </form>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'
import { inject } from 'vue'

const dialog = inject('dialog');
const form = useForm({})

const props = defineProps({
    id: {
        type: [Number, String],
        required: true
    },
    routeName: {
        type: String,
        required: true
    },
    confirmationMessage: {
        type: String,
        default: 'Da li ste sigurni da želite da obrišete ovu stavku?'
    },
    method: {
        type: String,
        default: 'delete'
    },
    onConfirm: {
        type: Function,
        required: true
    }
})

const confirmDelete = (e) => {
    e.preventDefault()
    props.onConfirm();
}

const submit = () => {
    router.delete(route(props.routeName, props.id), {
        onSuccess: () => {
            // Dodatne akcije nakon brisanja
            alert('Stavka je uspešno obrisana.');
        },
        onError: () => {
            alert('Došlo je do greške prilikom brisanja.');
        },
        preserveScroll: true
    })
}
</script>
