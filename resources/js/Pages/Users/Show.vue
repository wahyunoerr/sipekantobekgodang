<template>

    <Head title="User Details" />

    <AuthenticatedLayout>
        <template #header>
            User Details
        </template>

        <div class="max-w-2xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <p class="text-gray-900">{{ user.name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <p class="text-gray-900">{{ user.email }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                        <p class="text-gray-900">{{ user.roles[0]?.name || 'No Role' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                        <p class="text-gray-900">{{ user.nik.substring(0, 3) + '****' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">No KK</label>
                        <p class="text-gray-900">{{ user.nokk.substring(0, 3) + '****' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                        <p class="text-gray-900">{{ user.alamat }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                        <p class="text-gray-900">{{ user.jenis_kelamin }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                        <p class="text-gray-900">{{ user.tempat_lahir }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                        <p class="text-gray-900">{{ formatDate(user.tanggal_lahir) }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Agama</label>
                        <p class="text-gray-900">{{ user.agama }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pekerjaan</label>
                        <p class="text-gray-900">{{ user.pekerjaan }}</p>
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <button @click="goBack"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Back
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, router } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const { props } = usePage();
const user = props.user;

const fetchUserDetails = () => {
    router.get(route('users.show', user.uuid), {}, {
        preserveState: true,
        onSuccess: (page) => {
            router.reload({ preserveState: true });
        }
    });
};

onMounted(() => {
    fetchUserDetails();
});

const goBack = () => {
    router.get(route('users.index'));
};

const formatDate = (dateString) => {
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-GB', options);
};
</script>

<style scoped>
/* Add your styles here */
</style>
