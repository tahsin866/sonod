<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section class="space-y-6 max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">
        <!-- Header Section -->
        <header>
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                Update Password
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Ensure your account is using a strong, secure password to stay protected.
            </p>
        </header>

        <!-- Password Update Form -->
        <form @submit.prevent="updatePassword" class="space-y-6 mt-6">
            <!-- Current Password Field -->
            <div>
                <InputLabel for="current_password" value="Current Password" />
                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    autocomplete="current-password"
                />
                <InputError :message="form.errors.current_password" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- New Password Field -->
            <div>
                <InputLabel for="password" value="New Password" />
                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Confirm Password Field -->
            <div>
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password_confirmation" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center">
                <PrimaryButton :disabled="form.processing" class="w-full sm:w-auto py-2 px-6 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md">
                    Save
                </PrimaryButton>

                <Transition
                    enter-active-class="transition-opacity ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition-opacity ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600 dark:text-gray-400 mt-2 sm:mt-0"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
