<script setup>
import { ref } from 'vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-gray-50 py-16 px-4 sm:px-6 lg:px-8">
        <Head title="Login - Befaqul Madarisil Arabia Bangladesh" />

        <!-- Logo/Branding Section -->
        <div  style="font-family: 'SolaimanLipi', sans-serif;" class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4"
               >
                বেফাকুল মাদারিসিল আরাবিয়া বাংলাদেশ
            </h1>
            <p class="text-xl text-gray-600"></p>
        </div>

        <!-- Main Form Container -->
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-md shadow-2xl overflow-hidden">
                <!-- Form Header -->
                <div  style="font-family: 'SolaimanLipi', sans-serif;" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600">
                    <h2 class="text-2xl font-bold text-white text-center">সনদ শাখা</h2>

                </div>

                <!-- Status Message -->
                <div v-if="status"
                     class="bg-green-50 border-l-4 border-green-400 p-4 mx-6 mt-6">
                    <p class="text-sm text-green-700">{{ status }}</p>
                </div>

                <!-- Login Form -->
                <div class="p-6">
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Email Field -->
                        <div>
                            <InputLabel for="email" value="Email Address"
                                      class="text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <TextInput id="email" type="email" v-model="form.email"
                                    class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required autofocus autocomplete="username" />
                            </div>
                            <InputError :message="form.errors.email" class="mt-1" />
                        </div>

                        <!-- Password Field -->
                        <div>
                            <InputLabel for="password" value="Password"
                                      class="text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <TextInput id="password" type="password" v-model="form.password"
                                    class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required autocomplete="current-password" />
                            </div>
                            <InputError :message="form.errors.password" class="mt-1" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <Checkbox v-model="form.remember" name="remember"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>

                            <Link v-if="canResetPassword" :href="route('password.request')"
                                class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                Forgot password?
                            </Link>
                        </div>

                        <!-- Login Button -->
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
                                {{ form.processing ? 'Signing in...' : 'Sign in' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Links -->
            <p class="mt-8 text-center text-sm text-gray-600">
                Don't have an account?
                <Link :href="route('register')" class="font-medium text-blue-600 hover:text-blue-500">
                    Register here
                </Link>
            </p>
        </div>
    </div>
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
