<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
  <AuthenticatedLayout>
    <div class="container-fluid px-4 py-8">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Card 1: On route vehicles -->
        <div class="bg-gradient-to-r from-indigo-100 via-indigo-50 to-indigo-100 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl flex items-center">
          <div class="bg-indigo-500 text-white p-4 rounded-full shadow-md flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 2a8 8 0 110 16 8 8 0 010-16zm0 2a6 6 0 100 12 6 6 0 000-12z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-4">
            <div class="text-3xl font-bold text-gray-800">42</div>
            <div class="text-md text-gray-500">মোট আবেদন</div>
            <div class="text-sm text-indigo-600">+18.2% than last week</div>
          </div>
        </div>

        <!-- Card 2: Vehicles with errors -->
        <div class="bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-100 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl flex items-center">
          <div class="bg-yellow-500 text-white p-4 rounded-full shadow-md flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 2a8 8 0 110 16 8 8 0 010-16zm0 2a6 6 0 100 12 6 6 0 000-12z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-4">
            <div class="text-3xl font-bold text-gray-800">8</div>
            <div class="text-md text-gray-500">আজকের প্রদেয়</div>
            <div class="text-sm text-yellow-600">-8.7% than last week</div>
          </div>
        </div>

        <!-- Card 3: Deviated from route -->
        <div class="bg-gradient-to-r from-red-100 via-red-50 to-red-100 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl flex items-center">
          <div class="bg-red-500 text-white p-4 rounded-full shadow-md flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 2a8 8 0 110 16 8 8 0 010-16zm0 2a6 6 0 100 12 6 6 0 000-12z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-4">
            <div class="text-3xl font-bold text-gray-800">27</div>
            <div class="text-md text-gray-500">আবেদন পেন্ডিং</div>
            <div class="text-sm text-red-600">+4.3% than last week</div>
          </div>
        </div>

        <!-- Card 4: Late vehicles -->
        <div class="bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl flex items-center">
          <div class="bg-blue-500 text-white p-4 rounded-full shadow-md flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 2a8 8 0 110 16 8 8 0 010-16zm0 2a6 6 0 100 12 6 6 0 000-12z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-4">
            <div class="text-3xl font-bold text-gray-800">13</div>
            <div class="text-sm text-gray-500">Late vehicles</div>
            <div class="text-sm text-blue-600">-2.5% than last week</div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
/* Hover effects and transitions */
.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
}

.card .icon {
  transition: background-color 0.3s ease;
}

.card:hover .icon {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
