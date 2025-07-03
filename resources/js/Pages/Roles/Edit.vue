<template>

    <Head title="Edit Role" />

    <AuthenticatedLayout>
        <template #header>
            Edit Role
        </template>

        <div class="max-w-2xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" v-model="form.name" id="name" required placeholder="Masukkan nama roles"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" @click="goBack"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back
                        </button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const { props } = usePage();
const form = useForm({
    name: props.role.name,
});

const submit = () => {
    form.put(route('roles.update', { role: props.role.id }),
        {
            onSuccess: () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Role updated successfully!',
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
    router.get(route('roles.index'));
};
</script>

<style scoped>
/* Add your styles here */
</style>
