<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Navbar -->
            <nav class="border-b border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-800 shadow-lg">
                <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
                    <div class="flex h-20 justify-between items-center">
                        <!-- Left Section: Logo and Links -->
                        <div class="flex items-center">
                            <!-- Logo -->
                            <div class="flex-shrink-0">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="h-12 w-auto fill-current text-gray-800 dark:text-gray-200" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-10 sm:ml-12 sm:flex">
                                <NavLink
                                    class="text-lg font-semibold"
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                >
                                    Dashboard
                                </NavLink>
                              <!-- Updated Navigation Link for 'ফযিলত' -->
<NavLink
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 18px;"
    :href="route('Fazilat')"
    :active="route().current('Fazilat')"
>
    ফযিলত
</NavLink>

                            </div>
                        </div>

                        <!-- Right Section: User Dropdown -->
                        <div class="hidden sm:flex sm:items-center">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        type="button"
                                        class="inline-flex items-center px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-300 dark:focus:bg-gray-600 transition duration-150 ease-in-out"
                                    >
                                        {{ $page.props.auth.user.name }}
                                        <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </template>
                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                                </template>
                            </Dropdown>
                        </div>

                        <!-- Hamburger for Mobile -->
                        <div class="flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-200 hover:text-gray-600 focus:outline-none focus:bg-gray-200 focus:text-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:focus:text-gray-300 transition duration-150 ease-in-out"
                            >
                                <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Navigation Menu -->
                <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
                    <div class="space-y-1 pt-2 pb-4 bg-white dark:bg-gray-800">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-lg font-medium">Dashboard</ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('Fazilat')" :active="route().current('Fazilat')" class="text-lg font-medium">ফযিলত</ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="border-t border-gray-300 bg-white pt-4 pb-1 dark:border-gray-600 dark:bg-gray-800">
                        <div class="px-4">
                            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $page.props.auth.user.name }}</div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $page.props.auth.user.email }}</div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')" class="text-lg font-medium">Profile</ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="text-lg font-medium">Log Out</ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow-md dark:bg-gray-800" v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-6 py-6 sm:px-8 lg:px-10">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10 py-8">
                <slot />
            </main>
        </div>
    </div>
</template>
