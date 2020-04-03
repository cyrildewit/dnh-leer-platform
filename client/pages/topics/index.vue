<template>
  <div>

    <div class="py-8 bg-gray-100 border-b border-gray-300">
      <div class="container mx-auto px-6">
        <h1 class="text-2xl mb-2">{{ $t('topicsPage.title') }}</h1>
        <p class="text-base">{{ $t('topicsPage.subtitle') }}</p>
      </div>
    </div>

    <div class="container mx-auto px-6">
      <!-- Popular Topics -->
      <div class="py-12">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg">{{ $t('misc.popularTopics') }}</h2>
        </div>

        <div class="flex -mx-2" v-for="(topicChunk, key, index) in chunkedTopics" :key="index">
          <div class="w-1/3 px-2 mb-2" v-for="topic in topicChunk" :key="topic.id">
            <nuxt-link class="flex px-3 py-3 bg-white hover:bg-gray-100 border shadow rounded" :to="localePath({ name: 'topics-slug', params: { slug: topic.slug } })">
            <span class="font-medium">{{ topic.display_name }}</span>
          </nuxt-link>
          </div>
        </div>

      </div>
    </div>

  </div>
</template>

<script>
import _ from 'lodash'
import { mapGetters } from 'vuex'

export default {
  name: 'Index',

  layout: 'BrandDefault',

  computed: {
    ...mapGetters({
      topics: 'topics/popular',
    }),
    chunkedTopics() {
      return _.chunk(_.take(this.topics, 6), 3)
    },
  },

  mounted() {
    this.$store.dispatch('topics/fetchTopics');
  },
}
</script>
