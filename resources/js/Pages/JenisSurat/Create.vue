<template>

    <Head title="Create Jenis Surat" />

    <AuthenticatedLayout>
        <template #header>
            Create Jenis Surat
        </template>

        <div class="max-w-2xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" v-model="form.name" id="name" placeholder="Masukkan nama jenis surat"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="form_id" class="block text-gray-700 text-sm font-bold mb-2">Form</label>
                        <select v-model="form.form_id" id="form_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option v-for="form in forms" :key="form.id" :value="form.id">{{ form.name }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Persyaratan</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <div v-for="(persyaratan, index) in persyaratans" :key="persyaratan.id"
                                class="flex items-center mb-2">
                                <input type="checkbox" :value="persyaratan.id" v-model="form.persyaratan_ids"
                                    class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out" />
                                <label class="ml-2 text-gray-700">{{ persyaratan.name }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" @click="goBack"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back
                        </button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router, usePage } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { ref } from 'vue';

const { props } = usePage();
const forms = ref(props.forms);
const persyaratans = ref(props.persyaratans);

const form = useForm({
    name: '',
    form_id: null,
    persyaratan_ids: []
});

const submit = () => {
    form.post(route('jenis-surats.store'), {
        onSuccess: () => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Jenis Surat created successfully!',
            });
        },
        onError: (errors) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        }
    });
};

const goBack = () => {
    router.get(route('jenis-surats.index'));
};
</script>

<style scoped>
/* Add your styles here */
</style>
