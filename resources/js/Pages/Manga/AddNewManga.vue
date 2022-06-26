<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import FormAddManga from './FormAddManga.vue';


</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Manga
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <FormAddManga />

                <JetSectionBorder />

            </div>
        </div>
    </AppLayout>
</template>
