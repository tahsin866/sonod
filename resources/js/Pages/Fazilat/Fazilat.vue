<template>
    <AuthenticatedLayout>
      <template #header>
        <h1
          style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
          class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
        >
          ফযিলত ছাত্রদের সনদের কার্যক্রম
        </h1>
      </template>
  
      <div class="container mt-8 px-4 sm:px-6 lg:px-8">
        <!-- Search Student by Roll and Year in one row -->
        <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Roll Number Input -->
          <div>
            <label for="rollNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Roll Number</label>
            <input
              v-model="rollNumber"
              id="rollNumber"
              type="text"
              placeholder="Enter student roll number"
              class="w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
  
          <!-- Year Dropdown -->
          <div>
            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Year</label>
            <select
              v-model="year"
              id="year"
              class="w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
              <option value="" disabled>Select a year</option>
              <option v-for="y in years" :key="y" :value="y">{{ y }}</option>
            </select>
          </div>
        </div>
  
        <!-- Search Button -->
        <div class="mb-6">
          <button
            @click="searchStudent"
            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105"
          >
            Search Student
          </button>
        </div>
  
        <!-- Student Details Display -->
        <div v-if="studentDetails.found" class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Student Details</h2>
          <div class="mt-4 space-y-3">
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Name:</strong> {{ studentDetails.name }}</p>
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Roll:</strong> {{ studentDetails.roll_number }}</p>
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Class:</strong> {{ studentDetails.class }}</p>
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Year:</strong> {{ studentDetails.year }}</p>
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>School_name:</strong> {{ studentDetails.School_name }}</p>
          </div>
  
          <!-- Display Subject Table -->
          <div class="mt-6">
            <table class="min-w-full mt-4 table-auto border-collapse border border-gray-200 dark:border-gray-700 rounded-lg">
              <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                  <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-300">Subject</th>
                  <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-300">Marks</th>
                  <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-300">School_name</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(subject, index) in studentDetails.subjects" :key="index" class="hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="px-6 py-3 text-sm text-gray-800 dark:text-gray-200">{{ subject.name }}</td>
                  <td class="px-6 py-3 text-sm text-gray-800 dark:text-gray-200">{{ subject.marks }}</td>
                  <!-- <td class="px-6 py-3 text-sm text-gray-800 dark:text-gray-200">{{ school.School_name }}</td> -->
                </tr>
              
              </tbody>
            </table>
          </div>
        </div>
  
        <!-- Error message when student not found -->
        <div v-if="!studentDetails.found && studentDetails.message" class="mt-4 text-center">
          <p class="text-sm text-red-600 font-medium">{{ studentDetails.message }}</p>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  
  // Reactive variables
  const rollNumber = ref('');
  const year = ref('');
  const years = ref([2021, 2022, 2023, 2024]); // Dummy years for dropdown
  
  const studentDetails = ref({
    found: false,
    name: '',
    roll_number: '',
    class: '',
    year: '',
    subjects: [],
    school: [],
    message: ''
  });
  
  // Search student function
  const searchStudent = async () => {
    try {
      const response = await axios.get('api/students/search', {
        params: {
          roll_number: rollNumber.value,
          year: year.value
        }
      });
  
      if (response.data.length > 0) {
        studentDetails.value = {
          found: true,
          ...response.data[0], // Accessing the first student from the response
          subjects: response.data[0].subjects || []
        };
      } else {
        studentDetails.value = {
          found: false,
          message: 'No student found'
        };
      }
    } catch (error) {
      studentDetails.value = {
        found: false,
        message: error.response?.data?.message || 'An error occurred while fetching the data'
      };
    }
  };
  </script>
  
  <style scoped>
  /* Custom Styles */
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  button {
    width: 100%;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  th,
  td {
    padding: 12px;
    text-align: left;
  }
  
  th {
    background-color: #f9fafb;
  }
  
  td {
    border-bottom: 1px solid #ddd;
  }
  
  .dark th {
    background-color: #2d3748;
    color: #fff;
  }
  
  .dark td {
    border-bottom: 1px solid #444;
  }
  
  table tr:hover {
    background-color: #f1f5f9;
  }
  </style>
  