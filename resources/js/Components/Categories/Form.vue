<script>
export default {
    name: 'CategoriesForm',
};
</script>
<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


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
});
defineEmits(['submit']);
</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            <h2 class="text-lg font-semibold text-gray-900">
                {{ updating ? 'Update' : 'Create' }} Category
            </h2>
        </template>
        <template #description>
            {{ updating ? 'Update the category details' : 'Create a new category' }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" :value="updating ? 'Category Name' : 'Name'" />
                <TextInput id="name" type="text" v-model="form.name" :error="form.errors.name" autocomplete="name" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>
        <template #actions>
            <PrimaryButton type="submit" :loading="form.processing">
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>

    </FormSection>
</template>
