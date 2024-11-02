<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
<AuthenticatedLayout>

    <template #header>
            <h1
            style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
     ফযিলত ছাত্রদের সনদের কার্যক্রম
            </h1>
        </template>

        <div class="container mt-4">
    <!-- Card container for the form elements -->
    <div class="card p-4 shadow-sm">
        <!-- First Row: Dropdown Menus Aligned Side-by-Side -->
        <div class="row mb-3">
            <!-- Dropdown 1 -->
            <div class="col-md-3">
                <label for="dropdown1" class="form-label">Option 1</label>
                <select class="form-select" id="dropdown1" aria-label="Dropdown 1">
                    <option selected>Select Option 1</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>

            <!-- Dropdown 2 -->
            <div class="col-md-3">
                <label for="dropdown2" class="form-label">Option 2</label>
                <select class="form-select" id="dropdown2" aria-label="Dropdown 2">
                    <option selected>Select Option 2</option>
                    <option value="1">Option A</option>
                    <option value="2">Option B</option>
                    <option value="3">Option C</option>
                </select>
            </div>

            <!-- Dropdown 3 -->
            <div class="col-md-3">
                <label for="dropdown3" class="form-label">Option 3</label>
                <select class="form-select" id="dropdown3" aria-label="Dropdown 3">
                    <option selected>Select Option 3</option>
                    <option value="1">Choice 1</option>
                    <option value="2">Choice 2</option>
                    <option value="3">Choice 3</option>
                </select>
            </div>

            <!-- Empty Column for spacing -->
            <div class="col-md-3"></div>
        </div>

        <!-- Second Row: Search Box Centered -->
        <div class="row">
            <div class="col-12">
                <label for="searchBox" class="form-label">Search</label>
                <input type="text" id="searchBox" class="form-control" placeholder="Type to search..." />
            </div>
        </div>
    </div>
</div>


</AuthenticatedLayout>
</template>