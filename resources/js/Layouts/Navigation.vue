<template>
    <div :class="$page.props.showingMobileMenu ? 'block' : 'hidden'" @click="$page.props.showingMobileMenu = false"
        class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

    <div :class="$page.props.showingMobileMenu ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
        class="overflow-y-auto fixed inset-y-0 left-0 z-30 w-64 bg-stone-50 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex justify-center items-center mt-8">
            <div class="flex items-center">
                <img src="/tobekgodang.png" alt="" width="180px">

                <span class="mx-2 text-2xl font-semibold text-black"></span>
            </div>
        </div>

        <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: false }">
            <nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                <template #icon>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>
                </template>
                Dashboard
            </nav-link>

            <nav-link :href="route('users.index')" :active="route().current('users.index')">
                <template #icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </template>
                Users
            </nav-link>
            <nav-link :href="route('roles.index')" :active="route().current('roles.index')">
                <template #icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V5a1 1 0 00-1-1H9a1 1 0 00-1 1v6M4 15h16M4 19h16"></path>
                    </svg>
                </template>
                Roles
            </nav-link>

            <a class="flex items-center mt-4 py-2 px-6 text-gray-700" href="#" @click="showingSurat = !showingSurat"
                :class="{ 'bg-indigo-600 text-stone-50 rounded-lg': route().current('jenis-forms.index') || route().current('persyaratan.index') }">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zM14 2v6h6M16 13H8m0 4h8" />
                </svg>
                <span class="mx-3">Surat</span>
            </a>
            <transition enter-to-class="transition-all duration-300 ease-in-out" enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl" leave-to-class="max-h-0 opacity-0">
                <div
                    v-show="showingSurat || route().current('jenis-forms.index') || route().current('persyaratan.index') || route().current('jenis-surats.index')">
                    <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150"
                            :class="{ 'bg-stone-50 text-gray-700 rounded-lg': route().current('jenis-forms.index') }">
                            <Link class="w-full" :href="route('jenis-forms.index')">Jenis Form</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150"
                            :class="{ 'bg-stone-50 text-gray-700 rounded-lg': route().current('persyaratan.index') }">
                            <Link class="w-full" :href="route('persyaratan.index')">Persyaratan</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150"
                            :class="{ 'bg-stone-50 text-gray-700 rounded-lg': route().current('jenis-surats.index') }">
                            <Link class="w-full" :href="route('jenis-surats.index')">Jenis Surat</Link>
                        </li>
                    </ul>
                </div>
            </transition>
        </nav>
    </div>

</template>

<script>
import NavLink from '@/Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'

export default {
    components: {
        NavLink,
        Link,
    },

    setup() {
        let showingSurat = ref(false)

        return {
            showingSurat
        }
    },
}
</script>

<style scoped></style>
