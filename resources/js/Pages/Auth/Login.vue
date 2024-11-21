<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false, // Handle remember me checkbox
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>







<template>
    <div  class="flex flex-col justify-center items-center min-h-screen bg-gray-100">
        <!-- Company Name -->
        <div  class="text-center mb-10">
            <h1  style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"  class="text-4xl sm:text-5xl font-extrabold text-gray-800 tracking-wide leading-tight">
                বেফাকুল মাদারিসিল আরাবিয়া বাংলাদেশ (সনদ শাখা)
            </h1>
        </div>

        <!-- Form Container -->
        <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
            <Head title="Log in" />

            <!-- Status Message -->
            <p v-if="status" class="text-sm text-green-500 mb-4 text-center">
                {{ status }}
            </p>

            <form @submit.prevent="submit">
                <!-- Email Input -->
                <div class="mb-4">
                    <InputLabel for="email" value="Email Address" class="text-sm text-gray-700" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <InputLabel for="password" value="Password" class="text-sm text-gray-700" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center text-sm text-gray-700">
                        <Checkbox
                            name="remember"
                            v-model="form.remember"
                            class="rounded border-gray-300 text-blue-600"
                        />
                        <span class="ml-2">Remember me</span>
                    </label>

                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-sm text-blue-600 hover:text-blue-800"
                    >
                        Forgot password?
                    </Link>
                </div>

                <!-- Submit Button -->
                <div>
                    <PrimaryButton
                        class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 ease-in-out"
                        :class="{ 'opacity-50': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>




