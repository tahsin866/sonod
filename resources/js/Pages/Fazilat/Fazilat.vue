<template>
    <Head title="Fazilat" />

    <AuthenticatedLayout>
        <!-- Search Form Section -->
        <section class="container-fluid mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">ফযিলত ছাত্র-ছাত্রী অনুসন্ধান</h2>

            <!-- Search Form -->
            <div class="bg-gray-100 p-10">
    <div class="bg-white shadow-xl rounded-lg p-6 border border-gray-200 relative">
        <!-- Decorative Layer (Behind Effect) -->
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-50 to-gray-100 -z-10 rounded-lg transform translate-x-4 translate-y-4"></div>

        <!-- Form Fields -->
        <div class="flex flex-wrap items-center gap-6">
            <!-- Year Dropdown -->
            <div class="flex-1 min-w-[150px]">
                <label for="year" class="block text-md font-medium text-gray-700 mb-1">বছর নির্বাচন করুন</label>
                <select v-model="form.year" id="year" class="form-select w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled selected>বছর নির্বাচন করুন</option>
                    <option v-for="year in years" :key="year" :value="year">
                        {{ year }}
                    </option>
                </select>
            </div>

            <!-- Gender Dropdown -->
            <div class="flex-1 min-w-[150px]">
                <label for="gender" class="block text-md font-medium text-gray-700 mb-1">ছাত্র-ছাত্রী নির্বাচন করুন</label>
                <select v-model="form.gender" id="gender" class="form-select w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled selected>ছাত্র-ছাত্রী নির্বাচন করুন</option>
                    <option v-for="gender in genders" :key="gender.value" :value="gender.value">
                        {{ gender.key }}
                    </option>
                </select>
            </div>

            <!-- Roll Input -->
            <div class="flex-1 min-w-[150px]">
                <label for="roll" class="block text-md font-medium text-gray-700 mb-1">রোল নম্বর</label>
                <input
                    v-model="form.Roll"
                    type="text"
                    id="roll"
                    placeholder="রোল নম্বর লিখুন"
                    class="form-control w-full p-2 border border-gray-300 rounded-md shadow-sm"
                />
            </div>

            <!-- Registration ID Input -->
            <div class="flex-1 min-w-[150px]">
                <label for="registration_id" class="block text-md font-medium text-gray-700 mb-1">রেজিস্ট্রেশন আইডি</label>
                <input
                    v-model="form.reg_id"
                    type="text"
                    id="registration_id"
                    placeholder="রেজিস্ট্রেশন আইডি লিখুন"
                    class="form-control w-full p-2 border border-gray-300 rounded-md shadow-sm"
                />
            </div>

            <!-- Search Button -->
            <div class="mt-7">
                <button
                    @click="validateAndSearch"
                    class="bg-blue-600 hover:bg-green-700 text-white text-sm font-medium px-6 py-2 rounded-md shadow-md transition"
                >
                    অনুসন্ধান করুন
                </button>
            </div>
        </div>
    </div>
</div>

        </section>

        <!-- Search Results Section -->
        <section v-if="searchResults.length" class="container-fluid mx-auto mt-6">
    <h3 class="text-md font-semibold text-center mb-6 text-gray-800">অনুসন্ধান ফলাফল</h3>

    <!-- Results Table -->
    <div class="overflow-x-auto bg-white rounded-md shadow-md ring-1 ring-gray-200">
        <table class="min-w-full table-auto border-collapse text-md">
            <thead class="bg-gray-800 text-white">
                <tr>

                    <th class="px-6 py-4 text-left font-semibold">নাম</th>
                    <th class="px-6 py-4 text-left font-semibold">পিতার নাম</th>
                    <!-- <th class="px-6 py-4 text-left font-semibold">মাদরাসার নাম</th> -->
                    <th class="px-6 py-4 text-left font-semibold">ক্লাস</th>
                    <th class="px-6 py-4 text-left font-semibold">জন্মতারিখ</th>
                    <th class="px-6 py-4 text-left font-semibold">রোল নম্বর</th>
                    <th class="px-6 py-4 text-left font-semibold">রেজিস্ট্রেশন নম্বর</th>
                    <th class="px-6 py-4 text-left font-semibold">একশন</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in searchResults" :key="student.id" class="border-t hover:bg-gray-50 transition-colors duration-200 ease-in-out">
                    <td class="px-6 py-4 text-gray-800">{{ student.Name }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ student.Father }}</td>
                    <!-- <td class="px-6 py-4 text-gray-800">{{ student.Madrasha }}</td> -->
                    <td class="px-6 py-4 text-gray-800">{{ student.Class }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ student.DateofBirth }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ student.Roll }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ student.reg_id }}</td>
                    <td class="px-6 py-4">
                        <!-- View Button -->
                        <td class="px-6 py-4">
                            <!-- <Link
    :href="route('studentDetails', { Roll: student.Roll, reg_id: student.reg_id })"
    class="inline-block text-sm font-medium py-2 px-6 rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
>
    বিস্তারিত
</Link> -->
<a :href="route('studentDetails',{ Roll: student.Roll, reg_id: student.reg_id, SRType: student.SRType })" class="inline-block">
  <PrimaryButton class="mx-14">
    বিস্তারিত
  </PrimaryButton>
</a>

</td>
          </td>
                </tr>
            </tbody>
        </table>
    </div>


</section>





        <!-- No Results Found -->
        <p v-else class="mt-6 text-center text-gray-500">কোনো তথ্য পাওয়া যায়নি।</p>
    </AuthenticatedLayout>
</template>

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


<style scoped>
body {
    font-family: 'Merriweather', 'SolaimanLipi', sans-serif;
}
</style>
