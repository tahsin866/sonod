<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const showingDropdown = ref(false);
const showingUserDropdown = ref(false);

const dropdownItems = [
  { label: 'ফযিলত', href: '/Fazilat.Fazilat', icon: 'graduation-cap' },
  { label: 'সানাবিয়া উলইয়া', href: '/Fazilat.sana', icon: 'book-open' },
  { label: 'মুতাওয়াস্সিতা', href: '', icon: 'book' },
  { label: 'ইবতেদাইয়্যাহ', href: '', icon: 'pencil' },
  { label: 'হিফজুল কোরান', href: '', icon: 'quran' },
  { label: 'ইলমুল ক্বিরআত', href: '', icon: 'scroll' },
];
</script>

<template>
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900 font-inter">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-72 h-full bg-white dark:bg-gray-800 shadow-xl border-r border-gray-200 dark:border-gray-700   z-20">
      <!-- Logo/Brand -->
      <div class="h-20 flex items-center px-6 border-gray-200 dark:border-gray-700">
        <h1 class="px-15 text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
          সনদ শাখা
        </h1>
      </div>

      <!-- Navigation -->
      <nav class="p-4 space-y-1">
        <!-- Dashboard Link -->
        <Link href="/dashboard"
              class="flex items-center gap-3 px-4 py-3  text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
          <span class="text-xl font-semibold">ড্যাশবোর্ড</span>
        </Link>

        <!-- Dropdown Menu -->
        <div class="relative">
          <button @click="showingDropdown = !showingDropdown"
                  class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200"
                  :class="{ 'bg-blue-50 text-blue-600': showingDropdown }">
            <div class="flex items-center gap-3">
              <span class="text-xl font-semibold">মারহালা</span>
            </div>
            <svg class="w-4 h-4 transition-transform duration-300"
                 :class="{ 'rotate-180': showingDropdown }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown Items -->
          <transition enter-active-class="transition duration-200 ease-out"
                      enter-from-class="transform -translate-y-2 opacity-0"
                      enter-to-class="transform translate-y-0 opacity-100"
                      leave-active-class="transition duration-200 ease-in"
                      leave-from-class="transform translate-y-0 opacity-100"
                      leave-to-class="transform -translate-y-2 opacity-0">
            <div v-show="showingDropdown"
                 class="mt-1 ml-4 space-y-1 border-l-2 border-gray-200 dark:border-gray-700 rounded-lg">
              <Link v-for="(item, index) in dropdownItems"
                    :key="index"
                    :href="item.href"
                    class="flex items-center gap-3 pl-4 py-2.5 text-md font-medium text-gray-600 hover:text-blue-600 transition-colors duration-200">
                <div class="w-1.5 h-1.5 rounded-full bg-gray-400"></div>
                <span class="font-medium text-xl">{{ item.label }}</span>
              </Link>
            </div>
          </transition>
        </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="ml-72 flex flex-col min-h-screen">
      <!-- Header -->
      <header class="h-20 bg-white dark:bg-gray-800 shadow-xl rounded-t-lg border-gray-200 dark:border-gray-700">
        <div class="h-full px-8 flex justify-between items-center">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-white">ড্যাশবোর্ড ওভারভিউ</h2>

          <!-- User Menu -->
          <div class="relative">
            <button @click="showingUserDropdown = !showingUserDropdown"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors duration-200">
              <span class=" text-xl font-semibold">{{ $page.props.auth.user.name }}</span>
              <svg class="w-4 h-4 transition-transform duration-200"
                   :class="{ 'rotate-180': showingUserDropdown }"
                   fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <transition enter-active-class="transition ease-out duration-200"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-200"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95">
              <div v-show="showingUserDropdown"
                   class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-lg shadow-lg border border-gray-200">
                <Link href="/profile"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                  Profile
                </Link>
                <ResponsiveNavLink :href="route('logout')"
                                 method="post"
                                 as="button"
                                 class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                  Log Out
                </ResponsiveNavLink>
              </div>
            </transition>
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 p-8 bg-gray-50 dark:bg-gray-900">
        <slot />
      </main>
    </div>
  </div>
</template>

<style scoped>
.font-inter {
  font-family: 'Merriweather', 'SolaimanLipi', sans-serif;
}
</style>
