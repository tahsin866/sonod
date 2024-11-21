<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
const showingDropdown = ref(false);
</script>

<template>
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 w-64 h-full bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-lg">
      <div class="h-20 flex items-center justify-center bg-gray-900">
        <h1 style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 25px;" class="text-2xl font-semibold font-serif text-white">সনদ শাখা</h1>
      </div>
      <nav class="mt-6 space-y-4 px-6">
        <ul>
          <!-- Navigation Items -->
          <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 25px;">
            <Link href="/dashboard" class="block text-lg font-medium py-2 px-4 rounded-lg hover:bg-gray-700 transition duration-200">
            ড্যাশবোর্ড
            </Link>
            <Link href="/Fazilat.sana" class="block text-lg font-medium py-2 px-4 rounded-lg hover:bg-gray-700 transition duration-200">
              ফযিলত
            </Link>

          </li>
          <!-- Add other items as needed -->
        </ul>
      </nav>
    </div>

    <!-- Main Content Area -->
    <div style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 25px;" class="ml-64 flex-1 bg-gray-100 dark:bg-gray-900">
      <!-- Header -->
      <header class="bg-white shadow-md dark:bg-gray-800">
        <div class="px-6 py-4 flex items-center justify-between">
          <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            Dashboard Overview
          </div>
          <div class="relative">
            <button
              @click="showingDropdown = !showingDropdown"
              class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-lg font-semibold py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition duration-150 ease-in-out"
            >
              {{ $page.props.auth.user.name }}
            </button>
            <div
              v-show="showingDropdown"
              class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden z-50"
            >
              <Link
                href="/profile"
                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
              >
                Profile
              </Link>
              <ResponsiveNavLink
                :href="route('logout')"
                method="post"
                as="button"
                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
              >
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="  px-6 sm:px-8 lg:px-10 py-8">
        <slot />
      </main>
    </div>
  </div>
</template>
