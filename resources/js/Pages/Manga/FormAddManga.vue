<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';


const form = useForm({
    _method: 'POST',
    project_url: null
});

const addNewMangaURL = () => {

    form.post(route('user.manga.store'), {
        errorBag: 'addNewMangaURL',
        preserveScroll: true,
        onSuccess: () => {
            alert('added, please wait bot update 2-3 minute after')
            form.project_url = ''
        }
    });
};

</script>

<template>
    <JetFormSection @submitted="addNewMangaURL">
        <template #title>
            Add New Manga
        </template>

        <template #description>
            Paste NEKOPOST URL's manga you love it to here.
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="project_url" value="NEKOPOST URL" />
                <JetInput
                    id="project_url"
                    v-model="form.project_url"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="https://www.nekopost.net/manga/xxxxx"
                />
                <JetInputError :message="form.errors.project_url" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                Added!
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Add
            </JetButton>
        </template>
    </JetFormSection>
</template>
