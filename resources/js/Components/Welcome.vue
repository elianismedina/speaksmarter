<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { usePage } from '@inertiajs/vue3';
const { user } = usePage().props;

</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <div class="flex flex-row gap-4">
                <PrimaryButton v-if="user.permissions.includes('create-roles')">Create Roles
                </PrimaryButton>
                <PrimaryButton v-if="user.permissions.includes('create-lessons')">Create Lessons
                </PrimaryButton>
            </div>

        </div>
    </div>
</template>
