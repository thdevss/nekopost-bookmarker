
<template>
    <app-layout title="All Manga">


         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

              <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class=" overflow-hidden border-b border-gray-200 ">
                            <h2 class="text-center" v-if="mangas.data.length == 0">Please add some manga what you love.</h2>
                            
                            <div class="flex flex-wrap -mx-1 lg:-mx-5">

                                <!-- Column -->
                                <div class="my-1 px-1 w-full md:w-1/2 lg:my-5 lg:px-5 lg:w-1/5" v-for="manga in mangas.data" :key="manga.id" >

                                    <!-- Article -->
                                    <article class="overflow-hidden rounded-lg shadow-lg">

                                        <a :href="`../../user/manga/go/${manga.id}`" target="_blank">
                                            <img class="block h-auto w-full" :src="`https://www.osemocphoto.com/collectManga/${manga.project_id}/${manga.project_id}_cover.jpg?${manga.image_version}`" :alt="`${manga.name}`"/>
                                        </a>

                                        <header class="items-center justify-between leading-tight p-2 md:p-4" style="margin-bottom:0.5rem;">
                                            <h1 class="text-lg">
                                                <a class="no-underline hover:underline text-black" :href="`../../user/manga/go/${manga.id}`" target="_blank">
                                                    <span v-if="manga.is_new == '1'" class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">NEW</span>
                                                    {{ manga.name }}
                                                </a>
                                            </h1>
                                            <p class="ml-0 text-sm" style="margin-top:0.5rem;">
                                                Last Chapter: {{ manga.latest_chapter_no }}
                                            </p>
                                            <p class="ml-0 text-sm">
                                                Updated at: {{ manga.updated_at }}
                                            </p>
                                        </header>
                                        

                                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                            <a :href="`../../user/manga/go/${manga.id}`" target="_blank" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                                <span>Read this.</span>
                                            </a>

                                            <a class="no-underline text-right text-grey-darker hover:text-red-dark" href="#">
                                                <a class="text-red-600 text-sm">[x]</a>
                                            </a>
                                        </footer>

                                    </article>
                                    <!-- END Article -->

                                </div>
                                <!-- END Column -->


                                
                               
                            </div>
                            


                                        
                          </div>
                            <div style="float: right;">
                                <pagination class="mt-6" :links="mangas.links" />
                            </div>

                      </div>
                  </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from '@/Components/Pagination'

export default defineComponent({
    components: {
        AppLayout,
        Pagination
    },

    props: {
        mangas: Object,
    },
});
</script>