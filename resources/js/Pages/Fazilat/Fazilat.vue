<template>
    <AuthenticatedLayout>
        <div class="max-w-4xl mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Student Registration Form</h2>
      </div>
      <form @submit.prevent="submitForm">
        <!-- Student Name (Bangla) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="Student_name_bn" class="block text-sm font-medium text-gray-700">Student Name (Bangla)</label>
            <input type="text" id="Student_name_bn" v-model="form.Student_name_bn" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>

          <!-- Student Name (English) -->
          <div>
            <label for="Student_name_en" class="block text-sm font-medium text-gray-700">Student Name (English)</label>
            <input type="text" id="Student_name_en" v-model="form.Student_name_en" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>
        </div>

        <!-- Student Name (Arabic) -->
        <div class="mt-6">
          <label for="Student_name_ar" class="block text-sm font-medium text-gray-700">Student Name (Arabic)</label>
          <input type="text" id="Student_name_ar" v-model="form.Student_name_ar" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <!-- Father's Name (Bangla) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
          <div>
            <label for="stu_father_name_bn" class="block text-sm font-medium text-gray-700">Father Name (Bangla)</label>
            <input type="text" id="stu_father_name_bn" v-model="form.stu_father_name_bn" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>

          <!-- Father's Name (English) -->
          <div>
            <label for="stu_father_name_en" class="block text-sm font-medium text-gray-700">Father Name (English)</label>
            <input type="text" id="stu_father_name_en" v-model="form.stu_father_name_en" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>
        </div>

        <!-- Father's Name (Arabic) -->
        <div class="mt-6">
          <label for="stu_father_name_ar" class="block text-sm font-medium text-gray-700">Father Name (Arabic)</label>
          <input type="text" id="stu_father_name_ar" v-model="form.stu_father_name_ar" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <!-- Mother's Name (Bangla) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
          <div>
            <label for="stu_mother_name_bn" class="block text-sm font-medium text-gray-700">Mother Name (Bangla)</label>
            <input type="text" id="stu_mother_name_bn" v-model="form.stu_mother_name_bn" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>

          <!-- Mother's Name (English) -->
          <div>
            <label for="stu_mother_name_en" class="block text-sm font-medium text-gray-700">Mother Name (English)</label>
            <input type="text" id="stu_mother_name_en" v-model="form.stu_mother_name_en" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>
        </div>

        <!-- Mother's Name (Arabic) -->
        <div class="mt-6">
          <label for="stu_mother_name_ar" class="block text-sm font-medium text-gray-700">Mother Name (Arabic)</label>
          <input type="text" id="stu_mother_name_ar" v-model="form.stu_mother_name_ar" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <!-- Nationality -->
        <div class="mt-6">
          <label for="Nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
          <input type="text" id="Nationality" v-model="form.Nationality" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <!-- Date of Birth -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
          <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input type="date" id="date_of_birth" v-model="form.date_of_birth" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>

          <!-- Roll -->
          <div>
            <label for="Roll" class="block text-sm font-medium text-gray-700">Roll</label>
            <input type="number" id="Roll" v-model="form.Roll" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
          </div>
        </div>

        <!-- Registration ID -->
        <div class="mt-6">
          <label for="reg_id" class="block text-sm font-medium text-gray-700">Registration ID</label>
          <input type="text" id="reg_id" v-model="form.reg_id" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <!-- Submit Button -->
        <div class="mt-8 text-center">
          <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Submit
          </button>
        </div>
      </form>
    </div>
    </AuthenticatedLayout>
  </template>

  <script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import axios from 'axios';

export default {
  setup() {
    const form = ref({
      Student_name_bn: '',
      Student_name_en: '',
      Student_name_ar: '',
      stu_father_name_bn: '',
      stu_father_name_en: '',
      stu_father_name_ar: '',
      stu_mother_name_bn: '',
      stu_mother_name_en: '',
      stu_mother_name_ar: '',
      Nationality: '',
      date_of_birth: '',
      Roll: '',
      reg_id: '',
    });

    const submitForm = async () => {
      try {
        // Send form data to the Laravel backend
        const response = await axios.post('/student/register', form.value);

        // Handle success
        alert(response.data.message);

        // Clear form after successful submission
        form.value = {
          Student_name_bn: '',
          Student_name_en: '',
          Student_name_ar: '',
          stu_father_name_bn: '',
          stu_father_name_en: '',
          stu_father_name_ar: '',
          stu_mother_name_bn: '',
          stu_mother_name_en: '',
          stu_mother_name_ar: '',
          Nationality: '',
          date_of_birth: '',
          Roll: '',
          reg_id: '',
        };
      } catch (error) {
        // Handle error
        console.error('There was an error submitting the form:', error);
        alert('Error submitting the form.');
      }
    };

    return {
      form,
      submitForm,
    };
  },
};
  </script>

  <style scoped>
  /* Custom Styles for the form */
  </style>
