
<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>
<template>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
      <!-- Sidebar -->
      <div class="fixed top-0 left-0 w-64 h-full bg-gray-800 text-white">
        <div class="h-16 flex items-center justify-center bg-gray-900">
          <h1 style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;" class="text-xl font-semibold">সনদ শাখা</h1>
        </div>
        <nav class="mt-5">
  <ul class="space-y-2">
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        সানাবিয়া উলইয়া
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        সানাবিয়া উলইয়া
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        সানাবিয়া উলইয়া
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        সানাবিয়া
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        মুতাওয়াসসিতাহ
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        ইবতেদাইয়্যাহ
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        হিফজুল কোরান
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/profile" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        ইলমুল ক্বিরআত
      </router-link>
    </li>
    <li style="font-family: 'Merriweather','SolaimanLipi',sans-serif; font-size: 20px;">
      <router-link to="/logout" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-white">
        লগআউট
      </router-link>
    </li>
  </ul>
</nav>

      </div>

      <!-- Main Content Area -->
      <div class="flex-1 ml-64">
        <!-- Header -->
        <header class="bg-white shadow-md dark:bg-gray-800">
          <div class="px-6 py-4 flex items-center justify-between">
            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
              Dashboard Overview
            </div>

            <div style="font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="hidden sm:flex sm:items-center">
              <Dropdown align="right" width="48">
                <template #trigger>
                  <button type="button" class="inline-flex items-center px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-300 dark:focus:bg-gray-600 transition duration-150 ease-in-out">
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
          </div>
        </header>

        <!-- Page Content -->
        <main class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10 py-8">
          <slot />
        </main>
      </div>
    </div>
  </template>




  <style scoped>
  /* Make sure the sidebar takes full height */
  body, html {
    height: 100%;
  }

  .min-h-screen {
    display: flex;
    height: 100%;
  }

  .flex {
    display: flex;
  }

  .h-screen {
    height: 100vh;
  }

  .flex-1 {
    flex: 1;
  }

  .bg-gray-800 {
    background-color: #2d3748;
  }

  .bg-gray-900 {
    background-color: #1a202c;
  }

  .text-white {
    color: #ffffff;
  }
  </style>
