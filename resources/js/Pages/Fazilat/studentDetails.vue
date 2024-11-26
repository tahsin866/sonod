<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

// Props for receiving the Roll number
const props = defineProps({
    Roll: {
        type: [String, Number],
        required: true,
    },
    reg_id: {
        type: [String, Number],
        required: true,
    },
});

// Reactive state for student details
const student = ref({
  Name: "",
  Father: "",
  Madrasha: "",
  Class: "",
  DateofBirth: "",
  Roll: "",
  reg_id: "",
  Nationality: "",
  Division: "",
  SubValue_1: "",
  SubValue_2: "",
  SubValue_3: "",
  SubValue_4: "",
  SubValue_5: "",
  SubValue_6: "",
  SubValue_7: "",
  SubValue_8: "",
  Total:"",
  Division:""
   // Initialize as an empty array to avoid runtime errors
});

// Fetch student details
const fetchStudentDetails = async () => {
    try {
        const response = await axios.get(`/api/student/${props.Roll}/${props.reg_id}`);
        student.value = response.data.data || {};
        student.value.results = student.value.results || [];
    } catch (error) {
        console.error("Error fetching student details:", error);
    }

};

// Fetch student details when the component is mounted
onMounted(() => {
  fetchStudentDetails();
});







// Open the modal
const showModal = ref(false);

// Form data
const form = ref({
  Name: "",
  Father: "",
  Roll: "",
  Nationality: "",
  // Add other fields as needed
});

// Function to toggle modal visibility
const toggleModal = () => {
  showModal.value = !showModal.value;
};

// Function to handle form submission
const handleSubmit = () => {
  console.log("Form submitted:", form.value);
  toggleModal(); // Close modal after submission (optional)
};

</script>

<template>
    <AuthenticatedLayout>
        <a :href="route('Fazilat')" class="inline-block">
  <PrimaryButton class="mx-14">
    BACK
  </PrimaryButton>
</a>
      <!-- Student Details Section -->
      <div class="container mx-auto px-6 py-8">
  <div class="bg-white rounded-lg shadow-lg p-10">


    <table class="min-w-full table-auto border-collapse">
      <thead>
        <PrimaryButton class="mx-5" @click="toggleModal">
  EDIT
</PrimaryButton>

      </thead>
      <div class="container mx-auto px-6 py-8">
  <div class="bg-white rounded-lg shadow-xl p-10">
    <h2 class="text-4xl font-extrabold mb-6 text-center text-blue-800">
      <i class="fas fa-user-graduate"></i> ছাত্র/ছাত্রীর বিস্তারিত তথ্য
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Left Section -->
      <div>
        <table class="min-w-full">
          <tbody>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">নাম (বাংলা)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Name }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">নাম (ইংরেজি)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Name }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">নাম (আরবি)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Name }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">পিতার নাম (বাংলা)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Father }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">পিতার নাম (ইংরেজি)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Father }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">পিতার নাম (আরবি)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Father }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">মাদরাসার নাম (বাংলা)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Madrasha }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">মাদরাসার নাম (ইংরেজি)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Madrasha }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">মাদরাসার নাম (আরবি)</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Madrasha }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Right Section -->
      <div>
        <table class="min-w-full">
          <tbody>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">শ্রেণীঃ</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Class }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">জন্মতারিখঃ</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.DateofBirth }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">রোল নম্বরঃ</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Roll }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">রেজিস্ট্রেশন নম্বর</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.reg_id }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">জাতীয়তা:</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Nationality }}</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4 text-lg font-medium text-gray-600">প্রাপ্ত বিভাগ:</td>
              <td class="px-6 py-4 text-2xl font-medium text-gray-800">{{ student.Division }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

    </table>
  </div>
</div>




      <!-- Results Section -->
      <div class="container mx-auto px-6 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex items-center justify-between mb-6">
    <h3 class="text-xl font-bold text-blue-700">
        <i class="fas fa-table"></i> <span class="font-bold">মার্কশীট</span>
    </h3>

    <!-- Align button to the right -->
    <PrimaryButton>
        Print
    </PrimaryButton>
</div>

        <table class="table-auto w-full border border-gray-300 text-sm rounded-lg overflow-hidden shadow">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left font-bold text-center">ক্রামিক</th>
                    <th class="px-4 py-2 text-left font-bold text-center">বিষয়</th>
                    <th class="px-4 py-2 text-left font-bold text-center">পূর্ণ নম্বর</th>
                    <th class="px-4 py-2 text-left font-bold text-center">প্রাপ্ত নম্বর</th>
                    <th class="px-4 py-2 text-left font-bold text-center">প্রাপ্ত বিভাগ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">1</td>
                    <td class="border border-gray-300 px-4 py-2 text-md font-bold">مشكوة المصابيح (الجزء الأول)</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_1 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">2</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">تفسير البيضاوي</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_2 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">3</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">شرح العقائد و الفرق الباطلة</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_3 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">4</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">مشكوة المصابيح (الجزء الثاني)</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_4 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">5</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">الهداية  (الجزء الثالث)</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_5 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">6</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">الهداية (الجزء الرابع)</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_6 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">7</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">نزهة النظر في شرح نخبة الفكر</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_7 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 text-center font-bold">8</td>
                    <td class="border border-gray-300 px-4 py-2 font-bold">تحريك دار العلوم ديوبند</td>
                    <td class="border px-4 py-2 text-center font-bold">{{ student.SubValue_8 }}</td>
                    <td class="border px-4 py-2 text-center font-bold">--</td>
                    <td class="border px-4 py-2 text-center font-bold">A+</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-gray-100">
                    <td colspan="3" class="border border-gray-300 px-4 py-2 font-semibold text-right font-bold">মোট</td>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold">{{ student.Total }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold">{{ student.Division }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-6 text-center text-sm text-gray-600">
        <p class="font-bold">
            <i class="fas fa-info-circle text-blue-500"></i> Results are processed based on internal guidelines.
        </p>
    </div>
</div>



<!-- model -->

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
        <h3 class="text-xl font-semibold">সংশোধনী ফরম</h3>
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
              <label for="name" class="block text-md font-medium text-gray-700 dark:text-gray-300">নাম (বাংলা)</label>
              <input
                v-model="form.Name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <!-- Email field -->
            <div class="mb-4">
              <label for="email" class="block text-md font-medium text-gray-700 dark:text-gray-300">নাম (ইংরেজি)</label>
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
              <label for="name" class="block text-md font-medium text-gray-700 dark:text-gray-300">নাম (আরবি)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-md font-medium text-gray-700 dark:text-gray-300">পিতার নাম (বাংলা)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-md  font-medium text-gray-700 dark:text-gray-300">পিতার নাম (ইংরেজি)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-md  font-medium text-gray-700 dark:text-gray-300">পিতার নাম (আরবি)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-md  font-medium text-gray-700 dark:text-gray-300">মাতার নাম (বাংলা)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-md  font-medium text-gray-700 dark:text-gray-300">মাতার নাম (ইংরেজি)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-md  font-medium text-gray-700 dark:text-gray-300">মাতার নাম (আরবি)</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="mt-2 block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="phone" class="block text-md  font-medium text-gray-700 dark:text-gray-300">ফোন নম্বর</label>
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
              <label for="phone" class="block text-md  font-medium text-gray-700 dark:text-gray-300">জন্ম নিবন্ধন নম্বর/ এন.আইডি নম্বর</label>
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
              <label for="date" class="block text-md  font-medium text-gray-700 dark:text-gray-300">জন্মতারিখ</label>
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
            <PrimaryButton
              type="submit"
              class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-md text-sm px-8 py-3 transition duration-200"
            >
              save
            </PrimaryButton>
            <DangerButton
              type="button"
              @click="toggleModal"

            >
              Close
            </DangerButton>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>












    </AuthenticatedLayout>
  </template>
