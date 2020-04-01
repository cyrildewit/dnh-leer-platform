<template>
  <div>

    <!-- <div class="py-12 bg-gray-100 text-center border-b border-gray-300">
      <div class="container mx-auto px-6">
        <h1 class="text-2xl mb-2">Welkom op het Leer Platform</h1>
        <p class="text-lg">Leer, ontdek en ontwikkel jouw talent</p>
      </div>
    </div> -->

    <div class="container mx-auto px-6">
      <div class="py-12">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg"></h2>
        </div>

        <div class="flex -mx-2">
          <div class="w-1/3 px-2">
            <div class="bg-white border-t border-b shadow">
              <div class="border-b">

                <div class="flex justify-between px-6 -mb-px">
                  <h3 class="text-blue-dark py-4 font-normal text-lg">Recent Activity</h3>
                </div>

              </div>
            </div>
          </div>
          <div class="w-1/3 px-2">

            <div v-for="topic in topics" :key="topic.id">
              <!-- <nuxt-link :to="'/topics/' + ">
                {{ topic.display_name }}
              </nuxt-link> -->
            </div>


          </div>
          <div class="w-1/3 px-2">




          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  layout: 'BrandDefault',

  computed: {
    ...mapGetters({
      topics: 'topics/all',
    }),
  },

  mounted() {
    this.$store.dispatch('topics/fetchTopics');
  },
}
</script>
