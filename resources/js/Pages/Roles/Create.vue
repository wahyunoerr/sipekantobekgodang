<template>

    <Head title="Create Role" />

    <AuthenticatedLayout>
        <template #header>
            Create Role
        </template>

        <div class="max-w-2xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" v-model="form.name" id="name" placeholder="Masukkan nama roles"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
import { Head, useForm, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const form = useForm({
    name: '',
});

const submit = () => {
    form.post(route('roles.store'), {
        onSuccess: () => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Role created successfully!',
            });
        },
        onError: (errors) => {
            let errorMessage = 'Something went wrong!';
            if (errors.name) {
                errorMessage = errors.name[0];
            }
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
            });
        }
    });
};

const goBack = () => {
    router.get(route('roles.index'));
};
</script>

<style scoped>
/* Add your styles here */
</style>
