<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Create Account - Befaqul Madarisil Arabia Bangladesh" />

        <!-- Full-Width Background Container -->
        <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-gray-50 py-12 px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-md mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
                    <p class="mt-2 text-sm text-gray-600">Join our community today</p>
                </div>

                <!-- Registration Form -->
                <div class="bg-white rounded-xl shadow-2xl p-8">
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Name Field -->
                        <div>
                            <InputLabel for="name" value="Full Name"
                                      class="text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <TextInput id="name" type="text" v-model="form.name"
                                    class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required autofocus autocomplete="name"
                                    placeholder="Enter your full name" />
                            </div>
                            <InputError :message="form.errors.name" class="mt-1" />
                        </div>

                        <!-- Email Field -->
                        <div>
                            <InputLabel for="email" value="Email Address"
                                      class="text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <TextInput id="email" type="email" v-model="form.email"
                                    class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required autocomplete="username"
                                    placeholder="Enter your email address" />
                            </div>
                            <InputError :message="form.errors.email" class="mt-1" />
                        </div>

                        <!-- Password Field -->
                        <div>
                            <InputLabel for="password" value="Password"
                                      class="text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <TextInput id="password" type="password" v-model="form.password"
                                    class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required autocomplete="new-password"
                                    placeholder="Create a strong password" />
                            </div>
                            <InputError :message="form.errors.password" class="mt-1" />
                        </div>

                        <!-- Confirm Password Field -->
                        <div>
                            <InputLabel for="password_confirmation" value="Confirm Password"
                                      class="text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <TextInput id="password_confirmation" type="password"
                                    v-model="form.password_confirmation"
                                    class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required autocomplete="new-password"
                                    placeholder="Confirm your password" />
                            </div>
                            <InputError :message="form.errors.password_confirmation" class="mt-1" />
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200"
                                :class="{ 'opacity-75 cursor-not-allowed': form.processing }"
                                :disabled="form.processing">
                                <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                                    <path class="opacity-75" fill="currentColor"
                                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                                </svg>
                                {{ form.processing ? 'Creating Account...' : 'Create Account' }}
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Already have an account?
                                <Link :href="route('login')"
                                    class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                                    Sign in here
                                </Link>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
.animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>


<style scoped>
.animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>
