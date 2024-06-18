<script>
export default {
    name: 'LessonsIndex',
};
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>


<template>
    <app-layout title="Lessons">
        <div class="p-6 bg-white rounded-lg shadow">
            <h1 class="text-2xl font-semibold text-gray-800">Lessons</h1>
            <p class="mt-2 text-sm text-gray-600">List of all lessons</p>
        </div>
    </app-layout>
</template>
