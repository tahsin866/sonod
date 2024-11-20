<template>
    <Head title="Fazilat" />

    <AuthenticatedLayout>
        <div class="container mx-auto p-5" id="app">

            <div class="max-w-full mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg">
                <div class="text-center mb-8">
                    <h2 style="font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="text-3xl font-semibold text-gray-800">ফযিলত ছাত্রদের সনদ কার্যক্রম</h2>
                </div>
                <form @submit.prevent="searchStudent">
                    <!-- Year Selection -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="selectYear" class="block text-sm font-medium text-gray-700">বছর নির্বাচন করুন</label>
                            <select id="selectYear" v-model="form.selectYear" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option disabled value="">বছর নির্বাচন করুন</option>
                                <option v-for="year in selectYear" :key="year" :value="year">{{ year }}</option>
                            </select>
                        </div>

                        <!-- Student Type Selection -->
                        <div>
                            <label for="selectStudentType" class="block text-sm font-medium text-gray-700">ছাত্র-ছাত্রী নির্বাচন করুন</label>
                            <select id="selectStudentType" v-model="form.selectStudentType" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option disabled value="">ছাত্র-ছাত্রী নির্বাচন করুন</option>
                                <option v-for="name in selectStudentType" :key="name" :value="name">{{ name }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Roll Number or Registration ID Search Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <!-- Roll Number Search -->
                        <div>
                            <label for="rollNumber" class="block text-sm font-medium text-gray-700">রোল নম্বর অনুসন্ধান করুন</label>
                            <input
                                id="rollNumber"
                                v-model="form.selectRollNumber"
                                type="text"
                                placeholder="রোল নম্বর লিখুন"
                                class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Registration ID Search -->
                        <div>
                            <label for="registrationId" class="block text-sm font-medium text-gray-700">রেজিস্ট্রেশন আইডি অনুসন্ধান করুন</label>
                            <input
                                id="registrationId"
                                v-model="form.selectRegId"
                                type="text"
                                placeholder="রেজিস্ট্রেশন আইডি লিখুন"
                                class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 text-center">
                        <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Search
                        </button>
                    </div>
                </form>

                <!-- Search Results (Example Section) -->
                <div v-if="searchResults.length > 0" class="mt-8">
                    <h3 class="text-xl font-semibold">Search Results</h3>
                    <ul>
                        <li v-for="result in searchResults" :key="result.id" class="p-4 border-b">
                            <p><strong>Name:</strong> {{ result.name }}</p>
                            <p><strong>Roll Number:</strong> {{ result.rollNumber }}</p>
                            <p><strong>Registration ID:</strong> {{ result.registrationId }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <main class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10 py-8">
                <slot />
            </main>

    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = ref({
    selectYear: '',
    selectStudentType: '',
    selectRollNumber: '',
    selectRegId: ''
});

// Data for dropdowns
const selectYear = ref(['2009', '2008', '2007', '2010']);
const selectStudentType = ref(['ছাত্র', 'ছাত্রী']);

// Example Search Results Data
const students = ref([
    { id: 1, name: 'John Doe', rollNumber: '001', registrationId: 'REG1234' },
    { id: 2, name: 'Jane Smith', rollNumber: '002', registrationId: 'REG1235' },
    { id: 3, name: 'Ali Ahmed', rollNumber: '003', registrationId: 'REG1236' }
]);

// Search results storage
const searchResults = ref([]);

// Search Function
const searchStudent = () => {
    searchResults.value = students.value.filter(student => {
        const matchesYear = form.value.selectYear ? student.year === form.value.selectYear : true;
        const matchesStudentType = form.value.selectStudentType ? student.type === form.value.selectStudentType : true;
        const matchesRoll = form.value.selectRollNumber ? student.rollNumber === form.value.selectRollNumber : true;
        const matchesRegId = form.value.selectRegId ? student.registrationId === form.value.selectRegId : true;

        return matchesYear && matchesStudentType && (matchesRoll || matchesRegId);
    });
};
</script>
