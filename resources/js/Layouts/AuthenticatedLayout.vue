<script setup>
import { ref, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'

const showingDropdown = ref(false)
const showingUserDropdown = ref(false)
const isScrolled = ref(false)

const dropdownItems = [
  { label: 'ফযিলত', href: '/Fazilat.Fazilat', icon: 'graduation-cap' },
  { label: 'সানাবিয়া উলইয়া', href: '/Fazilat.sana', icon: 'book-open' },
  { label: 'মুতাওয়াস্সিতা', href: '', icon: 'book' },
  { label: 'ইবতেদাইয়্যাহ', href: '', icon: 'pencil' },
  { label: 'হিফজুল কোরান', href: '', icon: 'quran' },
  { label: 'ইলমুল ক্বিরআত', href: '', icon: 'scroll' },
]

// Add scroll detection
onMounted(() => {
  window.addEventListener('scroll', () => {
    isScrolled.value = window.scrollY > 0
  })
})
</script>

<template>
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900 font-inter">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-72 h-full bg-white dark:bg-gray-800 shadow-lg transition-all duration-300 z-20">
      <!-- Logo/Brand -->
      <div class=" mx-15 h-20 flex items-center px-8  border-gray-100 dark:border-gray-700">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
          সনদ শাখা
        </h1>
      </div>

      <!-- Navigation -->
      <nav class="p-4 space-y-2">
        <!-- Dashboard Link -->
        <Link href="/dashboard"
              class="flex items-center gap-3 px-6 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
          <i class="fas fa-home text-lg"></i>
          <span class="text-lg font-medium">ড্যাশবোর্ড</span>
        </Link>

        <!-- Dropdown Menu -->
        <div class="relative">
          <button @click="showingDropdown = !showingDropdown"
                  class="w-full flex items-center justify-between px-6 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200"
                  :class="{ 'bg-blue-50 text-blue-600': showingDropdown }">
            <div class="flex items-center gap-3">
              <i class="fas fa-layer-group text-lg"></i>
              <span class="text-lg font-medium">মারহালা</span>
            </div>
            <svg class="w-4 h-4 transition-transform duration-300"
                 :class="{ 'rotate-180': showingDropdown }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown Items -->
          <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="transform -translate-y-2 opacity-0"
            enter-to-class="transform translate-y-0 opacity-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="transform translate-y-0 opacity-100"
            leave-to-class="transform -translate-y-2 opacity-0">
            <div v-show="showingDropdown"
                 class="mt-1 ml-6 space-y-1 border-l-2 border-gray-200 dark:border-gray-700">
              <Link v-for="(item, index) in dropdownItems"
                    :key="index"
                    :href="item.href"
                    class="flex items-center gap-3 pl-4 py-2.5 text-gray-600 hover:text-blue-600 transition-all duration-200">
                <i :class="['fas', `fa-${item.icon}`, 'text-lg']"></i>
                <span class="text-lg font-medium">{{ item.label }}</span>
              </Link>
            </div>
          </transition>
        </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="ml-72 flex flex-col min-h-screen">
      <!-- Header -->
      <header :class="[
        'fixed right-0 left-72 h-20 bg-white/95 backdrop-blur-sm dark:bg-gray-800/95 transition-all duration-300 z-10',
        isScrolled ? 'shadow-md' : ''
      ]">
        <div class="h-full px-8 flex justify-between items-center">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-white">ড্যাশবোর্ড ওভারভিউ</h2>

          <!-- User Menu -->
          <div class="relative">
            <button @click="showingUserDropdown = !showingUserDropdown"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition-all duration-200">
              <img :src="`https://ui-avatars.com/api/?name=${$page.props.auth.user.name}&background=random`"
                   class="w-8 h-8 rounded-full"
                   :alt="$page.props.auth.user.name">
              <span class="text-lg font-medium">{{ $page.props.auth.user.name }}</span>
              <svg class="w-4 h-4 transition-transform duration-200"
                   :class="{ 'rotate-180': showingUserDropdown }"
                   fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <transition
              enter-active-class="transition ease-out duration-200"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-200"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95">
              <div v-show="showingUserDropdown"
                   class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-lg shadow-lg border border-gray-200">
                <Link href="/profile"
                      class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                  <i class="fas fa-user"></i>
                  Profile
                </Link>
                <ResponsiveNavLink :href="route('logout')"
                                 method="post"
                                 as="button"
                                 class="w-full flex items-center gap-2 text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                  <i class="fas fa-sign-out-alt"></i>
                  Log Out
                </ResponsiveNavLink>
              </div>
            </transition>
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="pt-24  bg-gray-50 dark:bg-gray-900">
        <slot />
      </main>
    </div>
  </div>
</template>

<style scoped>
.font-inter {
  font-family: 'Merriweather', 'SolaimanLipi', sans-serif;
}

/* Add smooth scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>
