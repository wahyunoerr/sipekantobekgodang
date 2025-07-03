<template>

    <Head title="Jenis Surats" />

    <AuthenticatedLayout>
        <template #header>
            Jenis Surats
        </template>

        <div class="max-w-7xl mx-auto sm:px-8 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between mb-4">
                        <form @submit.prevent="searchJenisSurats" class="relative w-full sm:max-w-xs mb-4 sm:mb-0">
                            <input v-model="q" type="text" placeholder="Search jenis surats..."
                                class="input input-bordered w-full pl-10 pr-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </form>
                        <div class="flex justify-center sm:justify-end">
                            <button @click="createJenisSurat"
                                class="btn btn-primary bg-blue-500 p-2 rounded font-bold text-white">
                                Create
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Form Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Persyaratans
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-if="jenisSurats.data.length === 0">
                                    <td colspan="5"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        No jenis surats found. Please try a different search.
                                    </td>
                                </tr>
                                <tr v-for="(jenisSurat, index) in jenisSurats.data" :key="jenisSurat.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ index + 1 + (jenisSurats.current_page - 1) * jenisSurats.per_page }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ jenisSurat.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ jenisSurat.form.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <ol>
                                            <li v-for="persyaratan in jenisSurat.persyaratans" :key="persyaratan.id">
                                                {{ persyaratan.name }}
                                            </li>
                                        </ol>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button @click="editJenisSurat(jenisSurat.id)"
                                            class="btn btn-secondary bg-indigo-500 p-2 rounded mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                                                viewBox="0 0 576 512" fill="currentColor">
                                                <path
                                                    d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                            </svg>
                                        </button>
                                        <button @click="deleteJenisSurat(jenisSurat.id)"
                                            class="btn btn-danger bg-red-500 p-2 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h1v10a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm3 4a1 1 0 112 0v8a1 1 0 11-2 0V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <pagination :links="jenisSurats.links" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { ref } from 'vue';

const { props } = usePage();
const jenisSurats = ref(props.jenisSurats);
const q = ref('');

const searchJenisSurats = () => {
    router.get(route('jenis-surats.index'), { q: q.value }, {
        preserveState: true,
        onSuccess: (page) => {
            jenisSurats.value = page.props.jenisSurats;
        }
    });
};

const createJenisSurat = () => {
    router.get(route('jenis-surats.create'));
};

const editJenisSurat = (id) => {
    router.get(route('jenis-surats.edit', { jenis_surat: id }));
};

const deleteJenisSurat = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('jenis-surats.destroy', { jenis_surat: id }), {
                onSuccess: () => {
                    Swal.fire(
                        'Deleted!',
                        'Jenis Surat has been deleted.',
                        'success'
                    );
                    searchJenisSurats();
                }
            });
        }
    });
};
</script>

<style scoped>
/* Add your styles here */
</style>
