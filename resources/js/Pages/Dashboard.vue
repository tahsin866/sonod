<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
  <AuthenticatedLayout>
    <div class="container-fluid px-4 py-8 bg-gray-50">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transform transition-all duration-300 hover:scale-105 flex items-center">
      <div class="bg-indigo-500 text-white p-4 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10 2a8 8 0 110 16 8 8 0 010-16z" />
        </svg>
      </div>
      <div class="ml-6">
        <div class="text-4xl font-bold text-gray-800">42</div>
        <div class="text-gray-600 text-sm">মোট আবেদন</div>
        <div class="text-indigo-500 text-sm">+18.2% than last week</div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transform transition-all duration-300 hover:scale-105 flex items-center">
      <div class="bg-yellow-500 text-white p-4 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10 2a8 8 0 110 16 8 8 0 010-16z" />
        </svg>
      </div>
      <div class="ml-6">
        <div class="text-4xl font-bold text-gray-800">8</div>
        <div class="text-gray-600 text-sm">আজকের প্রদেয়</div>
        <div class="text-yellow-500 text-sm">-8.7% than last week</div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transform transition-all duration-300 hover:scale-105 flex items-center">
      <div class="bg-red-500 text-white p-4 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10 2a8 8 0 110 16 8 8 0 010-16z" />
        </svg>
      </div>
      <div class="ml-6">
        <div class="text-4xl font-bold text-gray-800">27</div>
        <div class="text-gray-600 text-sm">আবেদন পেন্ডিং</div>
        <div class="text-red-500 text-sm">+4.3% than last week</div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transform transition-all duration-300 hover:scale-105 flex items-center">
      <div class="bg-blue-500 text-white p-4 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10 2a8 8 0 110 16 8 8 0 010-16z" />
        </svg>
      </div>
      <div class="ml-6">
        <div class="text-4xl font-bold text-gray-800">13</div>
        <div class="text-gray-600 text-sm">Late vehicles</div>
        <div class="text-blue-500 text-sm">-2.5% than last week</div>
      </div>
    </div>
  </div>
</div>

  </AuthenticatedLayout>
</template>
