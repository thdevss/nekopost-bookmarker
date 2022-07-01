
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

                                    <MangaBox :manga="manga" />

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
import MangaBox from '@/Components/MangaBox'
import Pagination from '@/Components/Pagination'

export default defineComponent({
    components: {
        AppLayout,
        Pagination,
        MangaBox
    },

    props: {
        mangas: Object,
    },
});
</script>