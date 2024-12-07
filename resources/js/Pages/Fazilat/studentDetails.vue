<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DropdownLink from "@/Components/DropdownLink.vue";



const props = defineProps({
    Roll: { type: [String, Number], required: true },
    reg_id: { type: [String, Number], required: true },
    SRType: { type: [String, Number], required: true }
});

// Form state
const form = ref({
    Name: '',
    Father: '',
    st_en_name: '',
    DateofBirth: '',
    st_en_Fname: '',
    mobileNumber: '',
    MadrashaNameEn: '',
    Nationality: '',
    BirthRegistrationNo_nid_no: '',
    Madrasha: '',
    Class: '',
    Roll: '',
    reg_id: ''
});


const student = ref({
  SubValue_1: '',
  SubValue_2: '',
  SubValue_3: '',
  SubValue_4: '',
  SubValue_5: '',
  SubValue_6: '',
  SubValue_7: '',
  SubValue_8: '',
  Total: '',
  Division: ''
});

// UI state
const isSubmitting = ref(false);
const showModal = ref(false);
const isDropdownOpen1 = ref(false);

// Subjects data
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

// Computed properties
const currentSubjects = computed(() => {
    return Number(props.SRType) === 1 ? maleSubjects : femaleSubjects;
});

const validateForm = computed(() => {
    return {
        isValid: form.value.Name && form.value.Father && form.value.DateofBirth,
        errors: {
            Name: !form.value.Name ? 'Name is required' : '',
            Father: !form.value.Father ? 'Father name is required' : '',
            DateofBirth: !form.value.DateofBirth ? 'Date of birth is required' : '',
        },
    };
});

// Methods
const fetchStudentDetails = async () => {
    try {
        const response = await axios.get(`/api/student/${props.Roll}/${props.reg_id}/${props.SRType}`);
        if (response.data.data) {
            Object.assign(form.value, response.data.data);
            student.value = {
                SubValue_1: response.data.data.SubValue_1,
                SubValue_2: response.data.data.SubValue_2,
                SubValue_3: response.data.data.SubValue_3,
                SubValue_4: response.data.data.SubValue_4,
                SubValue_5: response.data.data.SubValue_5,
                SubValue_6: response.data.data.SubValue_6,
                SubValue_7: response.data.data.SubValue_7,
                SubValue_8: response.data.data.SubValue_8,
                Total: response.data.data.Total,
                Division: response.data.data.Division
            };
        }
    } catch (error) {
        console.error("Error fetching student details:", error);
    }
};

const handleSubmit = async () => {
    if (isSubmitting.value || !validateForm.value.isValid) return;

    isSubmitting.value = true;

    const formData = {
        ...form.value,
        Roll: props.Roll,
        reg_id: props.reg_id,
        SRType: props.SRType
    };

    try {
        const response = await axios.put(`/student/${props.Roll}/${props.reg_id}`, formData);
        if (response.data.success) {
            await fetchStudentDetails();
            showModal.value = false;
            alert('Student information updated successfully');
        }
    } catch (error) {
        console.log('Error details:', error.response?.data);
        const errorMessage = error.response?.data?.message || 'An error occurred while processing your request';
        alert(errorMessage);
    } finally {
        isSubmitting.value = false;
    }
};


const toggleModal = () => {
    showModal.value = !showModal.value;
};

const openEditModal = () => {
    showModal.value = true;
};


const toggleDropdown1 = () => {
    isDropdownOpen1.value = !isDropdownOpen1.value;
};

// Lifecycle hooks
onMounted(() => {
    fetchStudentDetails();
});
</script>


<template>
  <AuthenticatedLayout>
    <a :href="route('Fazilat')" class="inline-block">
      <PrimaryButton class="mx-14">
        BACK
      </PrimaryButton>
    </a>

    <!-- Student Details Section -->
    <div class="container-fluid mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-lg p-10">
      <div class="flex items-center justify-between mb-6">
        <!-- Left Button (EDIT) -->
        <PrimaryButton @click="openEditModal" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
    EDIT
  </PrimaryButton>

        <!-- Title in the center -->
        <h3 class="text-2xl font-bold text-gray-800">
          <i class="fas fa-table"></i> <span class="ml-2">বিস্তারিত তথ্য (বাংলা)</span>
        </h3>

        <!-- Right Button (Dropdown) -->
        <div class="relative">
            <PrimaryButton @click="toggleDropdown1" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none inline-flex items-center text-lg">
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
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.Name }}</td>
          </tr>
          <tr class="border-b bg-gray-50">
    <td class="px-6 py-4 text-lg font-semibold text-gray-600">নাম (ইংরেজি)</td>
    <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.st_en_name }}</td>
</tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">পিতার নাম (বাংলা)</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.Father }}</td>
          </tr>
          <tr class="border-b bg-gray-50">
    <td class="px-6 py-4 text-lg font-semibold text-gray-600">পিতার নাম (ইংরেজি)</td>
    <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.st_en_Fname }}</td>
</tr>
          <tr class="border-b bg-gray-50">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">মাদরাসার নাম</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.Madrasha }}</td>
          </tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">শ্রেণী</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.Class }}</td>
          </tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">রোল নম্বর</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.Roll }}</td>
          </tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">রেজিস্ট্রেশন নম্বর</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.reg_id }}</td>
          </tr>
          <tr class="border-b">
            <td class="px-6 py-4 text-lg font-semibold text-gray-600">জন্মতারিখ</td>
            <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.DateofBirth }}</td>
          </tr>
          <tr class="border-b">
  <td class="px-6 py-4 text-lg font-semibold text-gray-600">জন্মনিবন্ধন/এনআইডি</td>
  <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.BirthRegistrationNo_nid_no }}</td>
</tr>
<tr class="border-b">
  <td class="px-6 py-4 text-lg font-semibold text-gray-600">মোবাইল নম্বর</td>
  <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.mobileNumber }}</td>
</tr>
<tr class="border-b">
  <td class="px-6 py-4 text-lg font-semibold text-gray-600">মাদরাসার নাম ইংরেজি</td>
  <td class="px-6 py-4 text-xl font-medium text-gray-800">{{ form.MadrashaNameEn }}</td>
</tr>
        </tbody>
      </table>
    </div>
  </div>

    <!-- Results Section -->
    <div class="container-fluid mx-auto px-6 py-8">
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
          <td class="border px-4 py-3 text-center font-medium">
    {{ student[`SubValue_${index + 1}`] || 'N/A' }}
</td>
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
  <div
  v-if="showModal"
  id="center-modal"
  tabindex="-1"
  class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-30 backdrop-blur-sm transition-opacity duration-300"
>
  <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-lg transform transition-all">
    <!-- Modal Header -->
    <div class="flex items-center justify-between p-5 bg-gray-800 text-white rounded-t-2xl">
      <h3 class="text-lg font-semibold">সংশোধনী ফরম</h3>
      <button
        @click="toggleModal"
        class="p-2 rounded-full hover:bg-gray-700 transition"
      >
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Modal Body -->
    <div class="p-8 space-y-8">
    <form @submit.prevent="handleSubmit" class="space-y-8">
      <!-- Bangla Information -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">নাম (বাংলা)</label>
          <input
            v-model="form.Name"
            type="text"
            placeholder="নাম লিখুন"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>

        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">পিতার নাম (বাংলা)</label>
          <input
            v-model="form.Father"
            type="text"
            placeholder="পিতার নাম লিখুন"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>

        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">জন্ম তারিখ</label>
          <input
            v-model="form.DateofBirth"
            type="date"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>
      </div>

      <!-- English Information -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-3">
    <label class="block text-sm font-medium text-gray-700">নাম (ইংরেজি)</label>
    <input
        v-model="form.st_en_name"
        type="text"
        placeholder="Name in English"
        class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
    />
</div>

        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">পিতার নাম (ইংরেজি)</label>
          <input
            v-model="form.st_en_Fname"
            type="text"
            placeholder="Father's Name in English"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>

        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">জন্মনিবন্ধন নম্বর / এন আইডি নম্বর</label>
          <input
            v-model="form.BirthRegistrationNo_nid_no"
            type="text"
            placeholder="Birth Registration/NID Number"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>

        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">মোবাইল নম্বর</label>
          <input
            v-model="form.mobileNumber"
            type="text"
            placeholder="Mobile Number"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>

        <div class="space-y-3">
          <label class="block text-sm font-medium text-gray-700">মাদরাসার নাম ইংরেজি</label>
          <input
            v-model="form.MadrashaNameEn"
            type="text"
            placeholder="Alternative Mobile Number"
            class="w-full p-3 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none transition"
          />
        </div>
      </div>

      <!-- Form Actions -->
      <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
        <button
          type="button"
          @click="toggleModal"
          class="px-6 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition"
        >
          বাতিল করুন
        </button>
        <button
          type="submit"
          :disabled="isSubmitting"
          class="px-6 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-800 transition"
        >
          {{ isSubmitting ? 'সংরক্ষণ হচ্ছে...' : 'সেভ করুন' }}
        </button>
      </div>
    </form>
  </div>
  </div>
</div>






</template>


