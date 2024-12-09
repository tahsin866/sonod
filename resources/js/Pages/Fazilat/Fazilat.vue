<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
// Form state
const form = ref({
    year: '',
    gender: '',
    Roll: '',
    reg_id: '',
});

// Filter options
const years = ref([]);
const genders = ref([
    { key: 'ছাত্র', value: 1 },
    { key: 'ছাত্রী', value: 0 },
]);

// Search results
const searchResults = ref([]);

// Fetch filter options from the backend
const fetchFilterOptions = async () => {
    try {
        const response = await axios.get('/api/filter-options');
        years.value = response.data.years;
        genders.value = response.data.genders;
    } catch (error) {
        console.error('Error fetching filter options:', error);
    }
};

// Validate form and search students
const validateAndSearch = () => {
    if (!form.value.year) {
        alert('অনুগ্রহ করে বছর নির্বাচন করুন।');
        return;
    }
    if (form.value.gender === '') {
        alert('অনুগ্রহ করে ছাত্র/ছাত্রী নির্বাচন করুন।');
        return;
    }
    if (!form.value.Roll) {
        alert('অনুগ্রহ করে রোল নম্বর লিখুন।');
        return;
    }
    if (!form.value.reg_id) {
        alert('অনুগ্রহ করে রেজিস্ট্রেশন আইডি লিখুন।');
        return;
    }
    searchStudents();
};

// Search students
const searchStudents = async () => {
    try {
        const response = await axios.get('/api/search', {
            params: {
                year: form.value.year,
                gender: form.value.gender,
                Roll: form.value.Roll,
                reg_id: form.value.reg_id,
            },
        });
        searchResults.value = response.data.status === 'success' ? [response.data.data] : [];
    } catch (error) {
        alert('অনুসন্ধানে ত্রুটি হয়েছে।');
    }
};

// Load filter options
onMounted(fetchFilterOptions);
</script>




<template>
    <AuthenticatedLayout>
      <div class="min-h-screen bg-gray-50 py-8">
        <!-- Main Container -->
        <div class="container-fluid px-4 sm:px-6 lg:px-8">
          <!-- Page Header -->
          <div class="bg-white rounded-md shadow-lg mb-8">
            <div class="p-6 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-md">
              <h1 class="text-3xl font-bold text-white text-center">
                ফযিলত ছাত্র-ছাত্রী অনুসন্ধান সিস্টেম
              </h1>
            </div>
          </div>

          <!-- Search Form Card -->

            <div class="bg-white rounded-md shadow-lg p-6 mb-8">
  <div class="bg-gradient-to-br from-blue-50 to-gray-50 rounded-lg p-6">
    <!-- Form Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 items-center">
      <!-- Year Dropdown -->
      <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">
          বছর নির্বাচন করুন <span class="text-red-500">*</span>
        </label>
        <select
          v-model="form.year"
          class="w-full h-12 px-4 rounded-lg border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
          <option value="" disabled>বছর নির্বাচন করুন</option>
          <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
        </select>
      </div>

      <!-- Gender Dropdown -->
      <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">
          ছাত্র-ছাত্রী নির্বাচন করুন <span class="text-red-500">*</span>
        </label>
        <select
          v-model="form.gender"
          class="w-full h-12 px-4 rounded-lg border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
          <option value="" disabled>ছাত্র-ছাত্রী নির্বাচন করুন</option>
          <option v-for="gender in genders" :key="gender.value" :value="gender.value">
            {{ gender.key }}
          </option>
        </select>
      </div>

      <!-- Roll Number Input -->
      <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">
          রোল নম্বর <span class="text-red-500">*</span>
        </label>
        <input
          v-model="form.Roll"
          type="text"
          placeholder="রোল নম্বর লিখুন"
          class="w-full h-12 px-4 rounded-lg border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        />
      </div>

      <!-- Registration ID Input -->
      <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">
          রেজিস্ট্রেশন আইডি <span class="text-red-500">*</span>
        </label>
        <input
          v-model="form.reg_id"
          type="text"
          placeholder="রেজিস্ট্রেশন আইডি লিখুন"
          class="w-full h-12 px-4 rounded-lg border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        />
      </div>

      <!-- Search Button -->
      <div class="space-y-2 mt-5">
        <button
          @click="validateAndSearch"
          class="w-full h-12 inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg transition-all duration-200"
        >
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
            />
          </svg>
          অনুসন্ধান করুন
        </button>
      </div>
    </div>
  </div>
</div>




          <!-- Results Section -->
          <div v-if="searchResults.length" class="bg-white rounded-md shadow-lg overflow-hidden">
            <div class="p-6">
              <h2 class="text-xl font-semibold text-gray-800 mb-6">অনুসন্ধান ফলাফল</h2>
              <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                  <thead>
                    <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white ">
                      <th class="px-6 py-3 text-left text-xl font-semibold">নাম</th>
                      <th class="px-6 py-3 text-left text-xl font-semibold">পিতার নাম</th>
                      <th class="px-6 py-3 text-left text-xl font-semibold">ক্লাস</th>
                      <th class="px-6 py-3 text-left text-xl font-semibold">জন্মতারিখ</th>
                      <th class="px-6 py-3 text-left text-xl font-semibold">রোল নম্বর</th>
                      <th class="px-6 py-3 text-left text-xl font-semibold">রেজিস্ট্রেশন নম্বর</th>
                      <th class="px-6 py-3 text-left text-xl font-semibold">একশন</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    <tr v-for="student in searchResults"
                        :key="student.id"
                        class="hover:bg-gray-50 transition-colors duration-200">
                      <td class="px-6 py-4 text-xl ">{{ student.Name }}</td>
                      <td class="px-6 py-4 text-xl">{{ student.Father }}</td>
                      <td class="px-6 py-4 text-xl">{{ student.Class }}</td>
                      <td class="px-6 py-4 text-xl">{{ student.DateofBirth }}</td>
                      <td class="px-6 py-4 text-xl">{{ student.Roll }}</td>
                      <td class="px-6 py-4 text-xl">{{ student.reg_id }}</td>
                      <td class="px-6 py-4 text-xl">
                        <a :href="route('studentDetails', {
                             Roll: student.Roll,
                             reg_id: student.reg_id,
                             SRType: student.SRType
                           })"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-md font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                          বিস্তারিত
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- No Results Message -->
          <div v-else class="mt-8 text-center">
            <p class="text-gray-500 text-lg">কোনো তথ্য পাওয়া যায়নি।</p>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>





<style scoped>
.container-fluid {
  width: 100%;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 640px) {
  .container-fluid {
    max-width: none;
  }
}
</style>
