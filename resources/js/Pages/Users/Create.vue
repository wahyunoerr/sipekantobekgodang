<template>

    <Head title="Create User" />

    <AuthenticatedLayout>
        <template #header>
            Create User
        </template>

        <div class="max-w-2xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" v-model="form.name" id="name" placeholder="Enter user name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" v-model="form.email" id="email" placeholder="Enter user email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                            <select v-model="form.role" id="role" required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option v-for="role in roles" :key="role.id" :value="role.name">{{ role.name }}</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                            <input type="text" v-model="form.nik" id="nik" required placeholder="Enter NIK"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="nokk" class="block text-gray-700 text-sm font-bold mb-2">No KK</label>
                            <input type="text" v-model="form.nokk" id="nokk" required placeholder="Enter No KK"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis
                                Kelamin</label>
                            <select v-model="form.jenis_kelamin" id="jenis_kelamin" required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat
                                Lahir</label>
                            <input type="text" v-model="form.tempat_lahir" id="tempat_lahir" required
                                placeholder="Enter Tempat Lahir"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                                Lahir</label>
                            <input type="date" v-model="form.tanggal_lahir" id="tanggal_lahir" required
                                placeholder="Enter Tanggal Lahir"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="agama" class="block text-gray-700 text-sm font-bold mb-2">Agama</label>
                            <input type="text" v-model="form.agama" id="agama" required placeholder="Enter Agama"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="pekerjaan" class="block text-gray-700 text-sm font-bold mb-2">Pekerjaan</label>
                            <input type="text" v-model="form.pekerjaan" id="pekerjaan" required
                                placeholder="Enter Pekerjaan"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <input type="password" v-model="form.password" id="password" required
                                placeholder="Enter password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="retypePassword" class="block text-gray-700 text-sm font-bold mb-2">Retype
                                Password</label>
                            <input type="password" v-model="retypePassword" id="retypePassword" required
                                placeholder="Retype password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                        <textarea v-model="form.alamat" id="alamat" required placeholder="Enter Alamat"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button @click="goBack"
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
import { Head, useForm, usePage, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { ref } from 'vue';

const { props } = usePage();
const roles = props.roles;
const retypePassword = ref('');
const form = useForm({
    name: '',
    email: '',
    password: '',
    role: '',
    nik: '',
    nokk: '',
    alamat: '',
    jenis_kelamin: '',
    tempat_lahir: '',
    tanggal_lahir: '',
    agama: '',
    pekerjaan: '',
});

const submit = () => {
    if (form.password !== retypePassword.value) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Passwords do not match!',
        });
        return;
    }

    form.post(route('users.store'), {
        onSuccess: () => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User created successfully!',
            });
        },
        onError: (errors) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        },
        preserveState: true,
    });
};

const goBack = () => {
    router.get(route('users.index'));
};
</script>

<style scoped>
/* Add your styles here */
</style>
