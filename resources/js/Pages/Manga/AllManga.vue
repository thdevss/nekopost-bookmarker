
<template>
    <app-layout title="All Manga">


         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

              <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class=" overflow-hidden border-b border-gray-200 ">
                            <h2 class="text-center" v-if="mangas.length == 0">Please add some manga what you love.</h2>
                              
                            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                                
                                <div class="rounded overflow-hidden" v-for="manga in mangas" :key="manga.id" >
                                    <div class="wrapper bg-gray-100 antialiased text-gray-900">
                                        <!--Card 1-->
                                        <img class="w-full" :src="`https://www.osemocphoto.com/collectManga/${manga.project_id}/${manga.project_id}_cover.jpg?${manga.image_version}`" :alt="`${manga.name}`"/>
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">
                                                <span v-if="manga.is_new == '1'" class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">NEW</span>
                                                {{ manga.name }}
                                            </div>
                                            <p class="text-gray-700 text-base">
                                                <p>
                                                    Last Chapter: {{ manga.latest_chapter_no }}
                                                </p>
                                                <p>
                                                    Updated at: {{ manga.updated_at.split("T")[0] }}
                                                </p>
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <div class="text-right">
                                                <a :href="`../../user/manga/go/${manga.id}`" target="_blank" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                                    <span>Read this.</span>
                                                </a>
                                                <br />
                                                <a class="text-red-600 text-xs">Delete this manga?</a>
                                            </div>
                                            <!-- <a class="rounded-full px-4 bg-sky-900 text-white rounded-md font-semibold" :href="`../../user/manga/go/${manga.id}`" target="_blank">Read latest chapter</a> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                                        
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

export default defineComponent({
    components: {
        AppLayout,
    },

    props: {
        mangas: Array,
    },
});
</script>