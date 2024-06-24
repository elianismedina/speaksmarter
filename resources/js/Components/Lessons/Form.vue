<script>
export default {
    name: 'LessonsForm',
};
</script>
<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import CollectionSelector from '@/Components/Common/CollectionSelector.vue';
import { ref } from 'vue';

defineProps({
    form: {
        type: Object,
        required: true,
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
    categories: {
        type: Object,
        required: true,
    },
    levels: {
        type: Object,
        required: true,
    },
});
const categoriesSelected = ref([]);
const onCategories = (_categories) => {
    categoriesSelected.value = _categories;
};
defineEmits(['submit']);
</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            <h2 class="text-lg font-semibold text-gray-900">
                {{ updating ? 'Update' : 'Create' }} Lesson
            </h2>
        </template>
        <template #description>
            {{ updating ? 'Update the selected lesson' : 'Create a new lesson' }}
        </template>
        <template #form>
            <div>
                <div>
                    <InputLabel for="name" :value="updating ? 'Lesson Name' : 'Name'" />
                    <TextInput id="name" type="text" v-model="form.name" :error="form.errors.name" autocomplete="name"
                        class="w-full" />
                    <InputError :message="$page.props.errors.name" class="mt-2" />
                </div>
                <div>
                    <InputLabel for="description" :value="updating ? 'Lesson Description' : 'Description'" />
                    <TextInput id="description" type="text" v-model="form.description" :error="form.errors.description"
                        autocomplete="description" class="w-full" />
                    <InputError :message="$page.props.errors.desciption" class="mt-2" />
                </div>
                <div>
                    <InputLabel for="content_uri" :value="updating ? 'Lesson Content URI' : 'Content URI'" />
                    <TextInput id="content_uri" type="text" v-model="form.content_uri" :error="form.errors.content_uri"
                        autocomplete="content_uri" class="w-full" />
                    <InputError :message="$page.props.errors.content_uri" class="mt-2" />
                </div>
                <div>
                    <InputLabel for="pdf_uri" :value="updating ? 'Lesson PDF' : 'PDF'" />
                    <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                    <InputError :message="$page.props.errors.pdf_uri" class="mt-2" />
                </div>
                <div class="flex flex-row gap-4 mt-2">
                    <div class="w-1/2">
                        <InputLabel for="level_id" :value="updating ? 'Lesson Level' : 'Level'" />
                        <select class="mt-2 mr-2 rounded-md" name="level_id" id="level_id">
                            <option v-for="(level, index) in levels" :key="index" :value="level.id">
                                {{ level.name }}
                            </option>
                        </select>
                        <InputError :message="$page.props.errors.level_id" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <InputLabel for="category_id" :value="updating ? 'Lesson Category' : 'Category'" class="mb-2" />
                        <CollectionSelector :collection="categories" class="mt-2 mr-2" @onCategories="onCategories" />
                        <InputError :message="$page.props.errors.category_id" class="mt-2" />
                    </div>
                </div>
            </div>
        </template>
        <template #actions>
            <PrimaryButton type="submit" :loading="form.processing">
                {{ updating ? 'Update' : 'Save' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
