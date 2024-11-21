<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const showingDropdown = ref(false);

// Close the dropdown when clicking outside
const closeDropdown = () => {
  showingDropdown.value = false;
};
</script>

<template>
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 w-64 h-full bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-lg">
      <div class="h-20 flex items-center justify-center bg-gray-900">
        <h1
          style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 25px;"
          class="text-2xl font-semibold font-serif text-white"
        >
          সনদ শাখা
        </h1>
      </div>
      <nav class="mt-6 space-y-4 px-6">
        <ul>
          <!-- Navigation Items -->
          <li
            style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 25px;"
          >
            <Link
              href="/dashboard"
              class="block text-lg font-medium py-2 px-4 rounded-lg hover:bg-gray-700 transition duration-200"
            >
              ড্যাশবোর্ড
            </Link>
            <Link
              href="/Fazilat.sana"
              class="block text-lg font-medium py-2 px-4 rounded-lg hover:bg-gray-700 transition duration-200"
            >
              ফযিলত
            </Link>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Main Content Area -->
    <div
      style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 25px;"
      class="ml-64 flex-1 bg-gray-100 dark:bg-gray-900"
    >
      <!-- Header -->
      <header class="bg-white shadow-md dark:bg-gray-800 relative">
        <div class="px-6 py-4 flex items-center justify-between">
          <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            Dashboard Overview
          </div>

          <!-- Dropdown -->
          <div class="relative">
            <button
              @click="showingDropdown = !showingDropdown"
              class="flex items-center text-gray-800 dark:text-gray-200"
            >
              {{ $page.props.auth.user.name }}
              <svg
                class="w-5 h-5 ml-2"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                ></path>
              </svg>
            </button>

            <!-- Dropdown Content -->
            <div
              v-if="showingDropdown"
              @click.away="closeDropdown"
              class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-lg shadow-lg py-2"
            >
              <ResponsiveNavLink
                :href="route('profile.edit')"
                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
              >
                Profile
              </ResponsiveNavLink>
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
      <main class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10 py-8">
        <slot />
      </main>
    </div>
  </div>
</template>
