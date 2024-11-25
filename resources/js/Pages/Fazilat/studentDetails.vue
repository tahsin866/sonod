
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// Props
const props = defineProps({
    Roll: {
        type: [String, Number],
        required: true
    }
})

// Student Object
const student = ref({
    Name: '',
    Father: '',
    Madrasha: '',
    Class: '',
    DateofBirth: '',
    Roll: '',
    reg_id: '',
    Nationality: '',



})








// Total Marks Calculation
const totalMarks = ref(0);
const calculateTotalMarks = () => {
    totalMarks.value = student.value.results.reduce((sum, subject) => sum + subject.marks, 0);
}

// Fetch Data on Mount
const fetchStudentDetails = async () => {
    try {
        const response = await axios.get(`/api/student/${props.Roll}`);
        const { data } = response.data;
        student.value = response.data.data;
        calculateTotalMarks(); // Update total marks after fetching
    } catch (error) {
        console.error('Error fetching student details:', error);
    }

    results.value = {
            SubValue_1: data.results.SubValue_1 || '',
            SubValue_2: data.results.SubValue_2 || '',
            SubValue_3: data.results.SubValue_3 || '',
            SubValue_4: data.results.SubValue_4 || '',
            SubValue_5: data.results.SubValue_5 || '',
            SubValue_6: data.results.SubValue_6 || '',
            SubValue_7: data.results.SubValue_7 || '',
            SubValue_8: data.results.SubValue_8 || '',
        };




}



onMounted(() => {
    fetchStudentDetails();
});
</script>


<template>
    <AuthenticatedLayout>
        <!-- Student Details Section -->
        <div class="container-fluid mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow-2xl p-8">
                <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">ছাত্র/ছাত্রীর বিস্তারিত তথ্য</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Section -->
                    <div class="space-y-6">
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">নামঃ</span>
                            <span class="text-gray-600">{{ student.Name }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">পিতার নামঃ</span>
                            <span class="text-gray-600">{{ student.Father }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">মাদরাসার নামঃ</span>
                            <span class="text-gray-600">{{ student.Madrasha }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">শ্রেণীঃ</span>
                            <span class="text-gray-600">{{ student.Class }}</span>
                        </div>

                    </div>

                    <!-- Right Section -->
                    <div class="space-y-6">
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">জন্মতারিখঃ</span>
                            <span class="text-gray-600">{{ student.DateofBirth }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">রোল নম্বরঃ</span>
                            <span class="text-gray-600">{{ student.Roll }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">রেজিস্ট্রেশন নম্বরঃ</span>
                            <span class="text-gray-600">{{ student.reg_id }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="font-semibold text-lg text-gray-700">জাতীয়তা</span>
                            <span class="text-gray-600">{{ student.Nationality }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Marksheet Section -->
        <div class="container-fluid mx-auto px-6 py-8">
            <div class="mt-8 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-list-alt text-blue-500"></i> মার্কশিট
                </h3>
                <table class="table-auto w-full border-collapse border border-gray-200 text-sm">
                    <thead class="bg-blue-100 text-gray-700">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ক্রামিক</th>
                            <th class="border border-gray-300 px-4 py-2">বিষয়</th>
                            <th class="border border-gray-300 px-4 py-2">পূর্ণ নম্বর</th>
                            <th class="border border-gray-300 px-4 py-2">প্রাপ্ত নম্বর</th>
                            <th class="border border-gray-300 px-4 py-2">গ্রেড</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">1</td>

                            <td class="border border-gray-300 px-4 py-2">مشكوة المصابيح (الجزء الأول)</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_1 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">2</td>

                            <td class="border border-gray-300 px-4 py-2">تفسير البيضاوي</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_2 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">3</td>

                            <td class="border border-gray-300 px-4 py-2">شرح العقائد و الفرق الباطلة</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_3 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">4</td>

                            <td class="border border-gray-300 px-4 py-2">مشكوة المصابيح (الجزء الثاني)</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_4 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">5</td>

                            <td class="border border-gray-300 px-4 py-2">الهداية  (الجزء الثالث)</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_5 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">6</td>

                            <td class="border border-gray-300 px-4 py-2">الهداية (الجزء الرابع)</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_6 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">7</td>

                            <td class="border border-gray-300 px-4 py-2">نزهة النظر في شرح نخبة الفكر</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_7 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                        <tr  class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">8</td>

                            <td class="border border-gray-300 px-4 py-2">تحريك دار العلوم ديوبند</td>
                            <!-- <td class="border border-gray-300 px-4 py-2 text-center">{{ results.SubValue_8 }}</td> -->
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-100">
                            <td colspan="3" class="border border-gray-300 px-4 py-2 font-semibold text-right">মোট</td>
                            <td class="border border-gray-300 px-4 py-2 text-center font-bold">{{ totalMarks }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Footer Section -->
            <div class="mt-6 text-sm text-gray-600 text-center">
                <p>
                    <i class="fas fa-info-circle text-blue-500"></i> The grades are calculated based on performance in exams.
                </p>
                <p>Thank you for reviewing the student's marksheet!</p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
