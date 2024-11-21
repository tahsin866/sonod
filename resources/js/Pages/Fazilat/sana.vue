<template>
    <Head title="Fazilat" />

    <AuthenticatedLayout>
        <!-- Search Form Section -->
        <section class="container-fluid p-4 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center mb-6">ছাত্র-ছাত্রী অনুসন্ধান</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Year Dropdown -->
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">বছর নির্বাচন করুন</label>
                    <select v-model="form.year" id="year" class="form-select mt-2 w-full p-2 border rounded-md">
                        <option value="" disabled selected>বছর নির্বাচন করুন</option>
                        <option v-for="year in years" :key="year" :value="year">
                            {{ year }}
                        </option>
                    </select>
                </div>

                <!-- Gender Dropdown -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">ছাত্র-ছাত্রী নির্বাচন করুন</label>
                    <select v-model="form.gender" id="gender" class="form-select mt-2 w-full p-2 border rounded-md">
                        <option value="" disabled selected>ছাত্র-ছাত্রী নির্বাচন করুন</option>
                        <option v-for="gender in genders" :key="gender.value" :value="gender.value">
                            {{ gender.key }}
                        </option>
                    </select>
                </div>

                <!-- Roll Input -->
                <div>
                    <label for="roll" class="block text-sm font-medium text-gray-700">রোল নম্বর</label>
                    <input
                        v-model="form.roll"
                        type="text"
                        id="roll"
                        placeholder="রোল নম্বর লিখুন"
                        class="form-control mt-2 w-full p-2 border rounded-md"
                    />
                </div>

                <!-- Registration ID Input -->
                <div>
                    <label for="registration_id" class="block text-sm font-medium text-gray-700">রেজিস্ট্রেশন আইডি</label>
                    <input
                        v-model="form.registration_id"
                        type="text"
                        id="registration_id"
                        placeholder="রেজিস্ট্রেশন আইডি লিখুন"
                        class="form-control mt-2 w-full p-2 border rounded-md"
                    />
                </div>
            </div>

            <!-- Search Button -->
            <div class="flex justify-center mt-4">
                <button @click="searchStudents" class="btn btn-primary px-6 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    অনুসন্ধান করুন
                </button>
            </div>
        </section>

        <!-- Search Results Section -->
        <section v-if="searchResults.length" class="container-fluid mt-6">
            <h3 class="text-xl font-semibold text-center mb-4">অনুসন্ধান ফলাফল</h3>

            <!-- Results Table -->
            <table class="table-auto w-full border-collapse bg-white shadow-md rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">নাম</th>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">পিতার নাম</th>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">মাদরাসার নাম</th>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">ক্লাস</th>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">জন্মতারিখ</th>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">রোল নম্বর</th>
                        <th class="px-4 py-2 text-left text-sm text-gray-700">রেজিস্ট্রেশন নম্বর</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in searchResults" :key="student.id" class="border-t">
                        <td class="px-4 py-2 text-sm">{{ student.Name }}</td>
                        <td class="px-4 py-2 text-sm">{{ student.Father}}</td>
                        <td class="px-4 py-2 text-sm">{{ student.Madrasha }}</td>
                        <td class="px-4 py-2 text-sm">{{ student.Class }}</td>
                        <td class="px-4 py-2 text-sm">{{ student.DateofBirth }}</td>
                        <td class="px-4 py-2 text-sm">{{ student.Roll }}</td>
                        <td class="px-4 py-2 text-sm">{{ student.reg_id }}</td>

                    </tr>
                </tbody>
            </table>
        </section>

        <!-- No Results Found -->
        <p v-else class="mt-6 text-center text-gray-500">কোনো তথ্য পাওয়া যায়নি।</p>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Form state
const form = ref({
    Name: '',
    Father: '',
    Madrasha: '',
    Class: '',
    DateofBirth: '',
    Roll: '',
    reg_id: '',
});

// Filter options
const years = ref([]);
const genders = ref([]);

// Search results
const searchResults = ref([]);

// Fetch filter options (years and genders) from the backend
const fetchFilterOptions = async () => {
    try {
        const response = await axios.get('/api/filter-options');
        years.value = response.data.years;
        genders.value = response.data.genders;
    } catch (error) {
        console.error('Error fetching filter options:', error);
    }
};

// Search for students based on form filters
const searchStudents = async () => {
    try {
        const response = await axios.get('/api/search', {
            params: form.value,
        });
        searchResults.value = response.data;
    } catch (error) {
        console.error('Error searching students:', error);
    }
};

// Load filter options on component mount
onMounted(fetchFilterOptions);
</script>
