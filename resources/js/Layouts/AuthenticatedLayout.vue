<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
const showingDropdown = ref(false);
</script>

<template>
  <div  style="font-family: 'SolaimanLipi', sans-serif;" class="min-h-screen flex bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-60 h-full bg-[#FFFAFA] text-gray-800 shadow-md">
      <div class="h-20 flex items-center justify-center">
        <h1 class="text-xl font-bold text-gray-800">সনদ শাখা</h1>
      </div>
      <nav class="mt-6 px-4 space-y-2">
        <ul>
          <li>
            <Link
              href="/dashboard"
              class="block py-3 px-4 rounded-md text-base font-medium hover:bg-blue-100 transition"
            >
              ড্যাশবোর্ড
            </Link>
          </li>
          <li>
            <Link
              href="/Fazilat.Fazilat"
              class="block py-3 px-4 rounded-md text-base font-medium hover:bg-blue-100 transition"
            >
              ফযিলত
            </Link>
          </li>
          <li>
            <Link
              href="/Fazilat.sana"
              class="block py-3 px-4 rounded-md text-base font-medium hover:bg-blue-100 transition"
            >
              সানাবিয়া উলইয়া
            </Link>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="ml-60 flex-1">
      <!-- Header -->
      <header class="bg-white dark:bg-gray-800 shadow-md py-4">
        <div class="px-6 flex justify-between items-center">
          <div class="text-xl font-semibold text-gray-800 dark:text-white">
            Dashboard Overview
          </div>
          <div class="relative">
            <button
              @click="showingDropdown = !showingDropdown"
              class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition"
            >
              {{ $page.props.auth.user.name }}
            </button>
            <div
              v-show="showingDropdown"
              class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 shadow-lg rounded-md z-50"
            >
              <Link
                href="/profile"
                class="block px-4 py-2 text-sm hover:bg-blue-100 dark:hover:bg-gray-600"
              >
                Profile
              </Link>
              <ResponsiveNavLink
                :href="route('logout')"
                method="post"
                as="button"
                class="block px-4 py-2 text-sm hover:bg-blue-100 dark:hover:bg-gray-600"
              >
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main style="font-family: 'SolaimanLipi', sans-serif;" class="px-6 sm:px-8 lg:px-10 py-8 bg-gray-50 dark:bg-gray-800 rounded-md">
        <slot />
      </main>
    </div>
  </div>
</template>
