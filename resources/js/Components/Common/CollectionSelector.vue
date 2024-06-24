<script setup>
import { ref } from 'vue';

defineProps({
    collection: {
        type: Array,
        required: true,
    },
});
const currentSelection = ref(1);
const selection = ref([]);
const emit = defineEmits(['onCategories']);

function handleAddToSelection() {

    let alreadyExist = false;
    selection.value.forEach((item) => {
        if (item.id === currentSelection.value.id) {
            alreadyExist = true;
            return;
        }
    });
    if (alreadyExist) {
        return;
    }
    selection.value.push(currentSelection.value);
    emit('onCategories', selection.value);
}
function handleRemoveSelection(index) {

    selection.value = selection.value.filter((item) => item.id !== index);
    emit('onCategories', selection.value);
}


</script>
<template>
    <div class="w-full">
        <div class="flex">
            <div>
                <select v-model="currentSelection"
                    class="rounded-md w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">

                    <option v-for="(item, index) in collection" :key="index" :value="item">
                        {{ item?.name }}
                    </option>
                </select>
            </div>
            <div class="bg-indigo-500 p-2 rounded text-white hover:bg-indigo-700 py-2 px-4 ml-1">
                <button @click="handleAddToSelection">
                    Add
                </button>
            </div>
        </div>
        <div class="p-4 mt-4 items-center rounded-md">
            <ul>
                <li v-for="(item, index) in selection" :key="index"
                    class="mt-2 bg-indigo-500 p-2 rounded text-white hover:bg-indigo-700 py-2 px-4 ml-1">
                    {{ item.name }}
                    <span @click="handleRemoveSelection(item.id)">
                        <icon name="garbage" class="w-4 h-4 float-right"></icon>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</template>
