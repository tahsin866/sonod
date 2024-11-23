<script setup>
import { ref } from 'vue';

import { computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

const issuedDate = new Date().toLocaleDateString();

const student = {
  name: "John Doe",
  fatherName: "Michael Doe",
  address: "123 Elm Street, Springfield",
  email: "john.doe@example.com",
  totalMarks: 450,
  grade: "A",
  status: "Pass",
  results: [
    { subject: "مشكوة المصابيح (الجزء الأول)", marks: 95, grade: "A+" },
    { subject: "تفسير البيضاوي", marks: 85, grade: "A" },
    { subject: "شرح العقائد و الفرق الباطلة", marks: 88, grade: "A" },
    { subject: "مشكوة المصابيح (الجزء الثاني)", marks: 90, grade: "A+" },
    { subject: "الهداية  (الجزء الثالث)", marks: 92, grade: "A+" },
    { subject: "الهداية  (الجزء الثالث)", marks: 92, grade: "A+" },
    { subject: "الهداية  (الجزء الثالث)", marks: 92, grade: "A+" },
    { subject: "الهداية  (الجزء الثالث)", marks: 92, grade: "A+" },
  ],
};

const statusClass = computed(() => {
  return student.status === "Pass"
    ? "text-green-600 bg-green-100 px-2 py-1 rounded-full"
    : "text-red-600 bg-red-100 px-2 py-1 rounded-full";
});

// model
// Reactive state to control modal visibility
const showModal = ref(false);

// Function to toggle modal visibility
const toggleModal = () => {
  showModal.value = !showModal.value;
};

const form = ref({
  name: '',
  email: ''
});

const handleSubmit = () => {
  // Handle form submission
  console.log('Form submitted:', form.value);
  toggleModal(); // Close the modal after submission
};


</script>

<template>
    <AuthenticatedLayout>
      <div class="container-fluid bg-gradient-to-r from-blue-50 to-white p-8 shadow-lg rounded-lg">
        <!-- Header Section -->
        <div class="flex justify-between items-center border-b pb-4 mb-8">
          <div>
            <h1 class="text-2xl font-bold text-blue-700">ব্যক্তিগত তথ্য</h1>
            <p class="text-sm text-gray-600 mt-1">
              <strong>ক্লাস: ফযিলত | রোলা: 12 | রেজিস্ট্রেশন নম্বর: 12</strong>
            </p>
            <p class="text-sm text-gray-600">ইংরেজি সেশন: 2023-2024</p>
            <p class="text-sm text-gray-600">হিজরি সেশন: 2023-2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm text-gray-500">
              <i class="far fa-calendar-alt"></i> Date Issued: {{ issuedDate }}
            </p>
          </div>
        </div>

        <!-- Student Details -->
        <PrimaryButton
        @click="toggleModal"
class="mb-7"
    type="button"



        >


            Edit</PrimaryButton>
        <div class="grid grid-cols-2 gap-6 text-sm text-gray-700 bg-white shadow-md rounded-lg p-6">
          <div>
            <h2 class="font-semibold text-gray-800 mb-2">
              <i class="fas fa-user text-blue-500 text-[18px]"></i> বিস্তারিত তথ্য
            </h2>
            <p><strong class="text-[15px]">বাংলা নাম:</strong> {{ student.name }}</p>
            <p><strong class="text-[15px]">আরবি নাম:</strong> {{ student.fatherName }}</p>
            <p><strong class="text-[15px] ">ইংরেজি নাম:</strong> {{ student.address }}</p>
            <br />
            <p><strong class="text-[15px]">বাংলা পিতার নাম:</strong> {{ student.name }}</p>
            <p><strong class="text-[15px]">আরবি পিতার নাম:</strong> {{ student.fatherName }}</p>
            <p><strong class="text-[15px]">ইংরেজি  পিতার নাম:</strong> {{ student.address }}</p>
            <br />
            <p><strong class="text-[15px]">বাংলা মাতার নাম:</strong> {{ student.name }}</p>
            <p><strong class="text-[15px]">আরবি মাতার নাম:</strong> {{ student.fatherName }}</p>
            <p><strong class="text-[15px]">ইংরেজি  মাতার নাম:</strong> {{ student.address }}</p>
            <br />
          </div>
          <div>
            <h2 class="font-semibold text-gray-800 mb-2">
              <i class="fas fa-info-circle text-blue-500"></i> প্রয়োজনীয় তথ্য
            </h2>
            <p><strong class="text-[15px]">জন্মতারিখ:</strong> {{ student.email }}</p>
            <p><strong class="text-[15px]">জনসনদ/এন.আইডি:</strong> {{ student.email }}</p>
            <p><strong class="text-[15px]">ফোন নম্বর:</strong> {{ student.email }}</p>
            <p><strong class="text-[15px]">জাতীয়তা:</strong> {{ student.email }}</p>
            <br />
            <p><strong class="text-[15px]">মাদরাসা নাম (বাংলা ):</strong> {{ student.email }}</p>
            <p><strong class="text-[15px]">মাদরাসা নাম (ইংরেজি):</strong> {{ student.email }}</p>
            <br />
            <p><strong class="text-[15px]">ঠিকানা:</strong> {{ student.email }}</p>
            <br />
            <p>
              <strong class="text-[15px]">ফলাফল:</strong> <span :class="statusClass">{{ student.status }}</span>
            </p>
          </div>
        </div>

        <!-- Results Table -->
        <div class="mt-8 bg-white shadow-md rounded-lg p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">
            <i class="fas fa-list-alt text-blue-500"></i> নম্বর পত্র
          </h3>
          <div class="text-right mb-4">
            <PrimaryButton>
              Print
            </PrimaryButton>
          </div>
          <table class="table-auto w-full border-collapse border border-gray-200 text-sm">
            <thead class="bg-blue-100 text-gray-700">
              <tr>
                <th class="border border-gray-300 px-4 py-2">ক্রামিক</th>
                <th class="border border-gray-300 px-4 py-2">বিষয়</th>
                <th class="border border-gray-300 px-4 py-2">নম্বর</th>
                <th class="border border-gray-300 px-4 py-2">বিভাগ</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="result in student.results"
                :key="result.subject"
                class="hover:bg-gray-50"
              >
              <td class="border border-gray-300 px-4 py-2"><strong>{{ result.subject }}</strong></td>
                <td class="border border-gray-300 px-4 py-2"><strong>{{ result.subject }}</strong></td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ result.marks }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ result.grade }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Footer Section -->
        <div class="mt-6 text-sm text-gray-600 text-center">
          <p>
            <i class="fas fa-info-circle text-blue-500"></i> The grades are calculated
            based on performance in exams.
          </p>
          <p>Thank you for reviewing the student's information!</p>
        </div>
      </div>

      <!-- model -->



  <!-- Modal -->
  <div
  v-if="showModal"
  id="center-modal"
  tabindex="-1"
  class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto bg-opacity-50 bg-gray-800"
>
  <div class="relative w-full max-w-4xl bg-white rounded-lg shadow-lg dark:bg-gray-800 transition-transform transform duration-300 ease-out">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-800">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-6 border-b rounded-t-lg dark:border-gray-600 bg-gray-800 text-white">
        <h3 class="text-xl font-semibold">Modal with Form</h3>
        <button
          @click="toggleModal"
          type="button"
          class="text-white hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
        </button>
      </div>
      <!-- Modal body with form -->
      <div class="p-6 space-y-6 bg-gray-50 dark:bg-gray-700 rounded-b-lg">
        <form @submit.prevent="handleSubmit">
          <!-- 3 fields in a row -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Name field -->
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <!-- Email field -->
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
              <input
                v-model="form.email"
                type="email"
                id="email"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <!-- Phone Number field -->
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter phone number"
              />
            </div>
            <!-- Date field -->
            <div class="mb-4">
              <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
              <input
                v-model="form.date"
                type="date"
                id="date"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <!-- Message field (text area) -->
            <!-- <div class="mb-4 col-span-3">
              <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
              <textarea
                v-model="form.message"
                id="message"
                rows="4"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
                placeholder="Enter your message here"
              ></textarea>
            </div> -->
          </div>

          <!-- Action buttons -->
          <div class="flex justify-end space-x-4 mt-6">
            <button
              type="submit"
              class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-md text-sm px-8 py-3 transition duration-200"
            >
              Submit
            </button>
            <button
              type="button"
              @click="toggleModal"
              class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-semibold rounded-md text-sm px-8 py-3 transition duration-200"
            >
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>








    </AuthenticatedLayout>
  </template>
