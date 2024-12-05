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
    <Head title="Fazilat" />

    <AuthenticatedLayout>
      <!-- Search Form Section -->
      <section class="container-fluid mx-auto p-8 bg-white rounded-lg shadow-xl">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-900">ফযিলত ছাত্র-ছাত্রী অনুসন্ধান</h2>

        <!-- Search Form -->
        <div class="bg-gradient-to-r from-blue-50 via-white to-gray-100 p-10 rounded-lg shadow-lg relative">
  <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-gray-200 -z-10 rounded-lg"></div>

  <div class="flex flex-wrap gap-6 justify-between">
    <!-- Year Dropdown -->
    <div class="flex-1 min-w-[200px]">
      <label for="year" class="block text-lg font-medium text-gray-700 mb-2">বছর নির্বাচন করুন</label>
      <div class="relative">
        <select
          v-model="form.year"
          id="year"
          class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-blue-400"
        >
          <option value="" disabled selected>বছর নির্বাচন করুন</option>
          <option v-for="year in years" :key="year" :value="year">
            {{ year }}
          </option>
        </select>
        <span class="absolute right-4 top-3 text-gray-400">
          <i class="fas fa-calendar-alt"></i>
        </span>
      </div>
    </div>

    <!-- Gender Dropdown -->
    <div class="flex-1 min-w-[200px]">
      <label for="gender" class="block text-lg font-medium text-gray-700 mb-2">ছাত্র-ছাত্রী নির্বাচন করুন</label>
      <div class="relative">
        <select
          v-model="form.gender"
          id="gender"
          class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400"
        >
          <option value="" disabled selected>ছাত্র-ছাত্রী নির্বাচন করুন</option>
          <option v-for="gender in genders" :key="gender.value" :value="gender.value">
            {{ gender.key }}
          </option>
        </select>
        <span class="absolute right-4 top-3 text-gray-400">
          <i class="fas fa-user-graduate"></i>
        </span>
      </div>
    </div>

    <!-- Roll Input -->
    <div class="flex-1 min-w-[200px]">
      <label for="roll" class="block text-lg font-medium text-gray-700 mb-2">রোল নম্বর</label>
      <input
        v-model="form.Roll"
        type="text"
        id="roll"
        placeholder="রোল নম্বর লিখুন"
        class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-purple-400"
      />
    </div>

    <!-- Registration ID Input -->
    <div class="flex-1 min-w-[200px]">
      <label for="registration_id" class="block text-lg font-medium text-gray-700 mb-2">রেজিস্ট্রেশন আইডি</label>
      <input
        v-model="form.reg_id"
        type="text"
        id="registration_id"
        placeholder="রেজিস্ট্রেশন আইডি লিখুন"
        class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-indigo-400"
      />
    </div>

    <!-- Search Button -->
    <div class="flex items-end">
      <button
        @click="validateAndSearch"
        class="bg-gradient-to-r from-blue-600 to-green-500 text-white font-semibold py-3 px-8 rounded-lg shadow hover:scale-105 transform transition-transform duration-200"
      >
        <i class="fas fa-search mr-2"></i> অনুসন্ধান করুন
      </button>
    </div>
  </div>
</div>

      </section>

      <!-- Search Results Section -->
      <section v-if="searchResults.length" class="container-fluid mx-auto mt-8">
        <h3 class="text-2xl font-bold text-center mb-6 text-gray-900">অনুসন্ধান ফলাফল</h3>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
          <table class="min-w-full table-auto text-lg">
            <thead class="bg-blue-600 text-white">
              <tr>
                <th class="px-6 py-4 text-left font-semibold">নাম</th>
                <th class="px-6 py-4 text-left font-semibold">পিতার নাম</th>
                <th class="px-6 py-4 text-left font-semibold">ক্লাস</th>
                <th class="px-6 py-4 text-left font-semibold">জন্মতারিখ</th>
                <th class="px-6 py-4 text-left font-semibold">রোল নম্বর</th>
                <th class="px-6 py-4 text-left font-semibold">রেজিস্ট্রেশন নম্বর</th>
                <th class="px-6 py-4 text-left font-semibold">একশন</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr
                v-for="student in searchResults"
                :key="student.id"
                class="hover:bg-blue-50 transition duration-300"
              >
                <td class="px-6 py-4">{{ student.Name }}</td>
                <td class="px-6 py-4">{{ student.Father }}</td>
                <td class="px-6 py-4">{{ student.Class }}</td>
                <td class="px-6 py-4">{{ student.DateofBirth }}</td>
                <td class="px-6 py-4">{{ student.Roll }}</td>
                <td class="px-6 py-4">{{ student.reg_id }}</td>
                <td class="px-6 py-4">
                  <a
                    :href="route('studentDetails', { Roll: student.Roll, reg_id: student.reg_id, SRType: student.SRType })"
                    class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded-lg shadow-lg transition"
                  >
                    বিস্তারিত
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- No Results Found -->
      <p v-else class="mt-8 text-center text-gray-500 text-lg">কোনো তথ্য পাওয়া যায়নি।</p>
    </AuthenticatedLayout>
  </template>





