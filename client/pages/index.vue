<template>
  <div>

    <div class="py-12 bg-gray-100 text-center border-b border-gray-300">
      <div class="container mx-auto px-6">
        <h1 class="text-2xl mb-2">Welkom op het Leer Platform</h1>
        <p class="text-lg">Leer, ontdek en ontwikkel jouw talent</p>
      </div>
    </div>

    <div class="container mx-auto px-6">
      <div class="py-12">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg">Populaire Onderwerpen</h2>
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
              {{ topic.display_name }}
            </div>
            <nuxt-link to="/">
            </nuxt-link>

          </div>
          <div class="w-1/3 px-2">




          </div>
        </div>

      </div>




<!--
      <div class="container mx-auto px-6">
      <div class="py-12">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg">Populaire Onderwerpen</h2>
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
          <div class="w-1/3 px-2">//</div>
          <div class="w-1/3 px-2">


        <div class="bg-white border-t border-b sm:rounded sm:border shadow">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="text-blue-dark py-4 font-normal text-lg">Recent Activity</h3>
            </div>
          </div>
          <div>
            <div class="text-center px-6 py-4">
              <div class="py-8">
                <div class="mb-4">
                  <svg class="inline-block fill-current text-grey h-16 w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z"/></svg>
                </div>
                <p class="text-2xl text-grey-darker font-medium mb-4">No buys or sells yet</p>
                <p class="text-grey max-w-xs mx-auto mb-6">You've successfully linked a payment method and can start buying digital currency.</p>
                <div>
                  <button type="button" class="bg-blue hover:bg-blue-dark text-white border border-blue-dark rounded px-6 py-4">Buy now</button>
                </div>
              </div>
            </div>
          </div>
        </div>

          </div>
        </div>

      </div> -->

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
