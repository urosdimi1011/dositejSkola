<template>
    <div class="documents-form">

        <!-- Dinamički unos dokumenata -->
        <div
            v-for="(doc, idx) in form.documents"
            :key="idx"
            class="doc-entry"
        >
            <!-- Naziv dokumenta -->
            <input
                v-model="doc.title"
                type="text"
                placeholder="Naziv dokumenta"
                class="doc-title"
            />

            <!-- Upload fajla -->
            <input
                type="file"
                @change="e => onFileChange(e, idx)"
                class="doc-file"
            />

            <!-- Dugme za brisanje polja -->
            <button
                type="button"
                @click="removeDocument(idx)"
                class="btn-remove"
            >
                &minus;
            </button>

            <!-- Prikaz izabranog fajla -->
            <div v-if="doc.file" class="doc-preview">
                Izabrano: {{ doc.file.name }}
            </div>
        </div>

        <!-- Dugme za dodavanje novog unosa -->
        <button
            type="button"
            @click="addDocument"
            class="btn-add"
        >
            + Dodaj dokument
        </button>
        <button
            type="button"
            @click="submit"
            class="btn-submit"
        >
            Sačuvaj dokumente
        </button>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3'
import {defineEmits} from 'vue';
// Inercia form helper

const form = useForm({
    documents: []  // niz objekata { title: '', file: null }
})


// Dodaje prazan unos u niz

function addDocument() {
    form.documents.push({ title: '', file: null })
}


// Uklanja unos sa indeksa
function removeDocument(index) {
    form.documents.splice(index, 1)
}

// Čuva fajl iz inputa u form.documents[i].file
function onFileChange(event, index) {
    form.documents[index].file = event.target.files[0]
}

const emit = defineEmits(['documents'])
// Slanje forme na backend
function submit() {
    emit('documents',form.documents);
}
</script>
<style scoped>
.documents-form {
    max-width: 600px;
    margin: 0 auto;
}

.doc-entry {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.doc-title {
    flex: 1;
}

.doc-file {
    width: 160px;
}

.btn-remove {
    background: #e53e3e;
    color: white;
    border: none;
    padding: 0.5rem;
    cursor: pointer;
}

.btn-add {
    background: #3182ce;
    color: white;
    border: none;
    padding: 0.75rem 1rem;
    margin-top: 1rem;
    cursor: pointer;
}

.btn-submit {
    background: #2f855a;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    margin-top: 1rem;
    cursor: pointer;
}

.doc-preview {
    font-size: 0.85rem;
    color: #4a5568;
}
</style>
