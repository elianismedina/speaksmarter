<script>
export default {
    name: 'CategoriesIndex',
};
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';


const { user } = usePage().props;

defineProps({
    categories: {
        type: Object,
        required: true,
    },
});
// Delete category function

const deleteCategory = (id) => {
    if (confirm('Are you sure you want to delete this category?')) {
        Inertia.delete(route('categories.destroy', id));
    }
};

</script>
<template>
    <app-layout title="Categories">
        <div class="p-6 bg-white rounded-lg shadow">
            <h1 class="text-2xl font-semibold text-gray-800">Categories</h1>
            <p class="mt-2 text-sm text-gray-600">List of all categories</p>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200 rounded-md shadow-md"
                    v-if="user.permissions.includes('create-categories')">
                    <div class="flex justify-between">
                        <Link :href="route('categories.create')"
                            class="text-slate-100 bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded-md"
                            v-if="user.permissions.includes('create-categories')">
                        Create Category
                        </Link>
                    </div>
                </div>
                <!-- component -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-4"
                    v-if="user.permissions.includes('read-categories')">
                    <table class="w-full border-collapse bg-white text-left text-sm text-slate-700">
                        <thead class="bg-indigo-500">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-bold text-lg text-slate-100">List of categories
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            <tr class="hover:bg-gray-50" v-for="category in categories.data">
                                <td class="flex flex-col px-6 py-4">
                                    <div class="">
                                        <p class="text-md font-semibold">{{ category.name }}</p>
                                    </div>
                                    <div class="flex flex-row-reverse gap-4">
                                        <Link @click="deleteCategory(category.id)"
                                            v-if="user.permissions.includes('delete-categories')"
                                            class="text-red-400 py-2 px-2" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        </Link>
                                        <Link :href="route('categories.edit', category.id)"
                                            v-if="user.permissions.includes('update-categories')"
                                            class="text-orange-400 py-2 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <div class="flex justify-between mt-2">
                    <Link v-if="categories.current_page > 1" :href="categories.prev_page_url"
                        class="py-2 px-4 rounded-md font-semibold text-slate-700">
                    < PREV </Link>
                        <div v-else></div>
                        <Link v-if="categories.current_page < categories.last_page" :href="categories.next_page_url"
                            class="py-2 px-4 rounded-md font-semibold text-slate-700">
                        NEXT >
                        </Link>
                        <div v-else></div>
                </div>

            </div>
        </div>
    </app-layout>
</template>
