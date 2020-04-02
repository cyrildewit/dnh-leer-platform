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
          <!-- <h2 class="font-medium text-lg">{{ topic.display_name }}</h2> -->
        </div>

      </div>

    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  // name: 'Index',

  layout: 'BrandDefault',

  computed: {
    ...mapGetters({
      topic: 'topics/currentTopic',
    }),
  },

  mounted() {
    this.$store.dispatch('topics/fetchTopicBySlug', this.$route.params.slug);

    this.$axios.post('http://dnh-leer-platform.test/api/v1/views/record-topic-view/'+1, {
      // 'visitor': 'dsfda',
      // 'ip_address': '33535',
      'has_do_not_track_header': false,
      'is_crawler': false,
    })
  },
}
</script>
