
<template>
    <app-layout title="Manga">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Manga
                <a class="px-4 bg-sky-900 text-white rounded-md float-right" style="font-size:14px;" href="#">Add new +</a>
            </h2>
            
        </template>

         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

              <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class=" overflow-hidden border-b border-gray-200 ">
                              
                            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                                
                                <div class="rounded overflow-hidden" v-for="manga in mangas" :key="manga.id" >
                                    <div class="wrapper bg-gray-400 antialiased text-gray-900">
                                        <div>
                                            <img class="w-full object-cover object-center rounded-lg shadow-md" :src="`https://www.osemocphoto.com/collectManga/${manga.project_id}/${manga.project_id}_cover.jpg?${manga.image_version}`" :alt="`${manga.name}`"/>

    
                                            <div class="relative px-4 -mt-16  ">
                                                <div class="bg-white p-6 rounded-lg">
                                                    <div v-if="manga.is_new == 1" class="flex items-baseline">
                                                        <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                                            New
                                                        </span>
                                                        <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                                            Updated: {{ manga.updated_at }}
                                                        </div>  
                                                    </div>
                                                    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ manga.name }}</h4>
 
                                                    <div class="mt-1">
                                                        <!-- $1800
                                                        <span class="text-gray-600 text-sm">   /wk</span> -->
                                                    </div>
                                                    <div class="mt-4">
                                                        <!-- <a class="text-teal-600 text-md font-semibold">Read latest chapter</a> -->
                                                        <a class="rounded-full px-4 bg-sky-900 text-white rounded-md font-semibold" :href="`https://www.nekopost.net/manga/${manga.project_id}/${manga.latest_chapter_no}`" target="_blank">Read latest chapter</a>

                                                    </div>  
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
    
                                    <!--Card 1-->
                                    <!-- <img class="w-full" :src="`https://www.osemocphoto.com/collectManga/${manga.project_id}/${manga.project_id}_cover.jpg?${manga.image_version}`" :alt="`${manga.name}`"/>
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{ manga.name }}</div>
                                        <p class="text-gray-700 text-base">
                                            ...
                                        </p>
                                    </div>
                                    <div class="px-6 pt-4 pb-2">
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                                    </div> -->
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
  /* 👇 Pass the photos array as a props 👇 */
  props: {
    mangas: Array,
  },
});
</script>