<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const showingDropdown = ref(false);
const showingUserDropdown = ref(false);

const dropdownItems = [
  { label: 'ফযিলত', href: '/Fazilat.Fazilat' },
  { label: 'সানাবিয়া উলইয়া', href: '/Fazilat.sana' },
  { label: 'মুতাওয়াস্সিতা', href: '' },
  { label: 'ইবতেদাইয়্যাহ', href: '' },
  { label: 'হিফজুল কোরান', href: '' },
  { label: 'ইলমুল ক্বিরআত ', href: '' },
]

</script>

<template>
  <div style="font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="min-h-screen flex bg-gray-100 dark:bg-gray-900 font-inter">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-64 h-full bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white shadow-xl">
    <!-- Header -->
    <div class="h-20 flex items-center justify-center">
      <h1 class="text-3xl font-bold tracking-wide bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
        সনদ শাখা
      </h1>
    </div>

    <!-- Navigation -->
    <nav class="mt-8">
      <ul class="space-y-2 px-4">
        <!-- Dashboard Link -->
        <li>
          <Link
            href="/dashboard"
            class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-all duration-200 group"
          >
            <svg
              class="w-5 h-5 text-gray-300 group-hover:text-white transition-colors"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="font-medium text-lg">ড্যাশবোর্ড</span>
          </Link>
        </li>

        <!-- Dropdown Menu -->
        <li>
          <div class="relative">
            <button
              @click="showingDropdown = !showingDropdown"
           style="font-size: 15px;"   class="w-full flex items-center justify-between py-3 px-4 rounded-lg hover:bg-white/10 transition-all duration-200 group"
              :class="{ 'bg-white/10': showingDropdown }"
            >
              <div class="flex items-center gap-3">

                <span class="font-medium text-lg">মারাহালা</span>
              </div>
              <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="{ 'rotate-180': showingDropdown }"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Dropdown Content -->
            <transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="transform scale-95 opacity-0"
              enter-to-class="transform scale-100 opacity-100"
              leave-active-class="transition duration-200 ease-in"
              leave-from-class="transform scale-100 opacity-100"
              leave-to-class="transform scale-95 opacity-0"
            >
              <div v-show="showingDropdown" class="mt-2 space-y-1 px-3">
                <Link
                  v-for="(item, index) in dropdownItems"
                  :key="index"
                  :href="item.href"
                  class="flex items-center gap-2 py-2.5 px-4 rounded-lg hover:bg-white/10 transition-all duration-200 group"
                >
                  <div class="w-1.5 h-1.5 rounded-full bg-gray-400 group-hover:bg-white transition-colors"></div>
                  <span class="font-medium text-md text-gray-300 group-hover:text-white transition-colors">
                    {{ item.label }}
                  </span>
                </Link>
              </div>
            </transition>
          </div>
        </li>
      </ul>
    </nav>
  </aside>


    <!-- Main Content Area -->
    <div class="ml-64 flex-1">
      <!-- Header -->
      <header style="font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="bg-white shadow-lg sticky top-0 z-50">
        <div class="px-8 py-4 flex justify-between items-center">
          <div class="text-2xl font-semibold text-gray-800">ড্যাশবোর্ড ওভারভিউ</div>
          <div class="relative">
            <button
              @click="showingUserDropdown = !showingUserDropdown"
              class="flex items-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition"
            >
              {{ $page.props.auth.user.name }}
              <svg
                class="ml-2 w-4 h-4 transform transition-transform duration-300"
                :class="{ 'rotate-180': showingUserDropdown }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>
            <div
              v-show="showingUserDropdown"
              class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50"
            >
              <Link
                href="/profile"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50"
              >
                Profile
              </Link>
              <ResponsiveNavLink
                :href="route('logout')"
                method="post"
                as="button"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50"
              >
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main style="font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="px-8 py-8 bg-gray-50 min-h-screen">
        <slot />
      </main>
    </div>
  </div>
</template>

<style scoped>
/* Optional: Add additional styles for better appearance */
</style>
