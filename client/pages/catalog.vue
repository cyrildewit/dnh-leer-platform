<template>
  <div>

    <div class="py-8 bg-gray-100 border-b border-gray-300">
      <div class="container mx-auto px-6">
        <h1 class="text-2xl mb-2">{{ $t('catalogPage.title') }}</h1>
        <p class="text-base">{{ $t('catalogPage.subtitle') }}</p>
      </div>
    </div>

    <div class="container mx-auto px-6" v-if="topics">

      <div class="py-6" v-for="(topic, key, index) in topicsFiltered" :key="index">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg">{{ topic.display_name }} ({{ topic.courses.length }})</h2>
        </div>

        <div class="flex -mx-2" >
          <div class="w-1/3 px-2 mb-2" v-for="course in topic.courses" :key="course.id">
            <nuxt-link class="flex px-3 py-3 bg-white hover:bg-gray-100 border shadow rounded" :to="localePath({ name: 'courses-slug', params: { slug: course.slug } })">
            <span class="font-medium">{{ course.title }}</span>
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
  name: 'Catalog',

  layout: 'BrandDefault',

  computed: {
    ...mapGetters({
      topics: 'topics/all',
    }),
    topicsFiltered() {
      return _.orderBy(this.topics, [(topic) => {
        if (topic.courses === undefined) {return}

        if (topic.courses.length > 0) {
          return topic
        }
      }])
    },
  },

  mounted() {
    this.$store.dispatch('topics/fetchTopicsWithCourses');
  },
}
</script>
