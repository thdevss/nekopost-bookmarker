<template>
    <!-- Article -->
    <article class="overflow-hidden rounded-lg shadow-lg">

        <Link :href="route('user.manga.show', { manga: manga } )">
            <img class="block h-auto w-full" :src="`https://www.osemocphoto.com/collectManga/${manga.project_id}/${manga.project_id}_cover.jpg?${manga.image_version}`" :alt="`${manga.name}`"/>
        </Link>
        
        <header class="items-center justify-between leading-tight p-2 md:p-4" style="margin-bottom:0.5rem;">
            <Link replace :href="route('user.manga.show', { manga: manga } )"  class="no-underline truncate text-lg text-gray-700" target="_blank">
                <span v-if="manga.is_new == '1'" class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">NEW</span>
                {{ manga.name }}

            </Link>
            <p class="ml-0 text-sm" style="margin-top:0.5rem;">
                Last Chapter: {{ manga.latest_chapter_no }}
            </p>
            <p class="ml-0 text-sm">
                Updated at: {{ (manga.scraped_at) ? manga.scraped_at.split(" ")[0] : '-' }}
            </p>
        </header>
        

        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
            <Link replace :href="route('user.manga.show', { manga: manga } )" target="_blank" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span>Read this.</span>
            </Link>

            <Link :href="route('user.manga.destroy', { manga: manga } )"  method="delete" as="button" type="button" class="no-underline text-right text-grey-darker hover:text-red-dark" onclick="return confirm(`Are you sure? It's cant undo!`);">
                <span class="text-red-600 text-sm">[x]</span>
            </Link>
        </footer>

    </article>
    <!-- END Article -->
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>
<script>
export default {
    props: {
        manga: Object
    },
}
</script>