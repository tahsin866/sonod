<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

// Props for receiving the Roll number and SRType
const props = defineProps({
  Roll: { type: [String, Number], required: true },
  reg_id: { type: [String, Number], required: true },
  SRType: { type: [String, Number], required: true }
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
  Total: "",
  Division: "",
  SRType: props.SRType,
});

// Subjects for Male and Female students
const maleSubjects = [
  { name: 'مشكوة المصابيح (الجزء الأول)' },
  { name: 'تفسير البيضاوي' },
  { name: 'شرح العقائد و الفرق الباطلة' },
  { name: 'مشكوة المصابيح (الجزء الثاني)' },
  { name: 'الهداية (الجزء الثالث)' },
  { name: 'الهداية (الجزء الرابع)' },
  { name: 'نزهة النظر في شرح نخبة الفكر' },
  { name: 'تحريك دار العلوم ديوبند' }
];

const femaleSubjects = [
  { name: 'مشكوة المصابيح (الجزء الأول)' },
  { name: 'تفسيرجلالين (الجزء الأول)' },
  { name: 'تفسيرجلالين (الجزء الثاني)' },
  { name: 'مشكوة المصابيح (الجزء الثاني)' },
  { name: 'الهداية (الجزء الثالث)' },
  { name: 'الهداية (الجزء الرابع)' },
  { name: 'عقيدة الطحاوي' }
];

// Define the subjects based on SRType
const currentSubjects = computed(() => {
  return Number(props.SRType) === 1 ? maleSubjects : femaleSubjects;
});

// Fetch student details
const fetchStudentDetails = async () => {
  try {
    const response = await axios.get(`/api/student/${props.Roll}/${props.reg_id}/${props.SRType}`);
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

// Modal functionality
const showModal = ref(false);
const toggleModal = () => {
  showModal.value = !showModal.value;
};

// Form data for editing student details
const form = ref({
  Name: "",
  Father: "",
  Roll: "",
  Nationality: "",
  // Add other fields as needed
});


const isDropdownOpen = ref(false);

const checkboxes = ref([
  { label: 'বাংলা মার্কশীট', checked: false },
  { label: 'আরবি মার্কশীট', checked: true },
  { label: 'ইংরেজি মার্কশীট', checked: false },
]);

const toggleDropdown = () => {
  isDropdownOpen.value = !isDropdownOpen.value;
};



const isDropdownOpen1 = ref(false);

const checkboxes1 = ref([
  { label: 'বাংলা-ইংরেজি', checked: false },
  { label: 'আরবি-ইংরেজি', checked: true },

]);

const toggleDropdown1 = () => {
  isDropdownOpen1.value = !isDropdownOpen1.value;
};







// Handle form submission
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
      <div class="flex items-center justify-between mb-6">
        <!-- Left Button (EDIT) -->
        <PrimaryButton @click="toggleModal" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
          EDIT
        </PrimaryButton>

        <!-- Title in the center -->
        <h3 class="text-2xl font-bold text-gray-800">
          <i class="fas fa-table"></i> <span class="ml-2">বিস্তারিত তথ্য</span>
        </h3>

        <!-- Right Button (Dropdown) -->
        <div class="relative">
          <PrimaryButton @click="toggleDropdown1" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none inline-flex items-center">
            সনদের ধরণ
            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6" aria-hidden="true">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4" />
            </svg>
          </PrimaryButton>

          <!-- Dropdown Menu -->
          <div v-if="isDropdownOpen1" class="absolute top-0 right-0 mt-12 w-56 bg-white divide-y divide-gray-100 rounded-lg shadow-md z-10">
            <ul class="p-4 space-y-3 text-sm text-gray-700">
              <li v-for="(item, index) in checkboxes1" :key="index">
                <div class="flex items-center">
                  <input type="checkbox" :id="'checkbox-item-' + index" v-model="item.checked" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                  <label :for="'checkbox-item-' + index" class="ml-2 text-gray-800">{{ item.label }}</label>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg shadow-md">
        <tbody>
          <tr class="border-b bg-gray-50">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">নাম (বাংলা)</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ student.Name }}</td>
          </tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">পিতার নাম (বাংলা)</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ student.Father }}</td>
          </tr>
          <tr class="border-b bg-gray-50">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">মাদরাসার নাম</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ student.Madrasha }}</td>
          </tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">শ্রেণী</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ student.Class }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

    <!-- Results Section -->
    <div class="container mx-auto px-6 py-8">
  <div class="bg-white shadow-lg rounded-lg p-8">
    <!-- Header Section -->
    <div class="flex items-center justify-between mb-6">
      <h3 class="text-2xl font-bold text-blue-700 flex items-center">
        <i class="fas fa-table mr-2"></i> মার্কশীট
      </h3>
      <div class="relative">
        <button
          @click="toggleDropdown"
          class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 inline-flex items-center"
        >
          মার্কশীটের ধরণ
          <svg
            class="w-4 h-4 ml-2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
            aria-hidden="true"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M1 1l4 4 4-4"
            />
          </svg>
        </button>

        <!-- Dropdown Menu -->
        <div
          v-if="isDropdownOpen"
          class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-md divide-y divide-gray-200 z-10"
        >
          <ul class="py-2 text-sm text-gray-700">
            <li v-for="(item, index) in checkboxes" :key="index">
              <label class="flex items-center px-4 py-2 cursor-pointer">
                <input
                  type="checkbox"
                  :id="'checkbox-item-' + index"
                  v-model="item.checked"
                  class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                />
                <span class="ml-2">{{ item.label }}</span>
              </label>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow">
      <thead class="bg-blue-100">
        <tr>
          <th class="px-4 py-3 text-center font-semibold text-gray-700">ক্রামিক</th>
          <th class="px-4 py-3 text-center font-semibold text-gray-700">বিষয়</th>
          <th class="px-4 py-3 text-center font-semibold text-gray-700">পূর্ণ নম্বর</th>
          <th class="px-4 py-3 text-center font-semibold text-gray-700">প্রাপ্ত নম্বর</th>
          <th class="px-4 py-3 text-center font-semibold text-gray-700">প্রাপ্ত বিভাগ</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(subject, index) in currentSubjects" :key="index" class="bg-white hover:bg-gray-50">
          <td class="border px-4 py-3 text-center font-medium">{{ index + 1 }}</td>
          <td class="border px-4 py-3 text-center font-medium">{{ subject.name }}</td>
          <td class="border px-4 py-3 text-center font-medium">100</td>
          <td class="border px-4 py-3 text-center font-medium">{{ student[`SubValue_${index + 1}`] }}</td>
          <td class="border px-4 py-3 text-center font-medium text-green-600">A+</td>
        </tr>
      </tbody>
      <tfoot class="bg-gray-100">
        <tr>
          <td colspan="3" class="border px-4 py-3 font-bold text-right">মোট</td>
          <td class="border px-4 py-3 text-center font-bold">{{ student.Total }}</td>
          <td class="border px-4 py-3 text-center font-bold">{{ student.Division }}</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

    <div class="relative inline-block text-left">


  </div>

  </AuthenticatedLayout>

  <!-- Edit Modal -->
  <div v-if="showModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
    <div class="bg-white p-8 rounded-lg w-96">
      <h3 class="text-xl font-bold mb-4">Edit Student Details</h3>
      <form @submit.prevent="handleSubmit">
        <div class="mb-4">
          <label class="block text-lg font-medium">Name</label>
          <input type="text" v-model="form.Name" class="border border-gray-300 p-2 w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-lg font-medium">Father's Name</label>
          <input type="text" v-model="form.Father" class="border border-gray-300 p-2 w-full" />
        </div>
        <div class="flex justify-between">
          <PrimaryButton type="submit">Save</PrimaryButton>
          <DangerButton @click="toggleModal">Cancel</DangerButton>
        </div>
      </form>
    </div>
  </div>
</template>


