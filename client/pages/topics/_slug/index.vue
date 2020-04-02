<template>
  <div v-if="topic">

    <div class="py-8 bg-gray-100 border-b border-gray-300">
      <div class="container mx-auto px-6">
        <h1 class="text-2xl mb-2">{{ topic.display_name }}</h1>
        <p class="text-base">{{ topic.description }}</p>
      </div>
    </div>

    <div class="container mx-auto px-6">

      <div class="py-12" v-if="topicCourses">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg">Populaire Cursussen</h2>
        </div>

        <div class="flex -mx-2" v-for="(courseChunk, key, index) in chunkedPopularCourses" :key="index">
          <div class="w-1/3 px-2 mb-2" v-for="course in courseChunk" :key="course.id">
            <nuxt-link class="flex px-3 py-3 bg-white hover:bg-gray-100 border shadow rounded" :to="localePath({ name: 'courses-slug', params: { slug: course.slug } })">
            <span class="font-medium">{{ course.title }}</span>
          </nuxt-link>
          </div>
        </div>

      </div>

      <div class="py-12">

        <div class="mb-4 pb-3 border-b border-gray-400">
          <h2 class="font-medium text-lg">Alle Cursussen</h2>
        </div>

        <template v-if="topicCourses">
          <div class="flex -mx-2" v-for="(courseChunk, key, index) in chunkedAllCourses" :key="index">
            <div class="w-1/3 px-2 mb-2" v-for="course in courseChunk" :key="course.id">
              <nuxt-link class="flex px-3 py-3 bg-white hover:bg-gray-100 border shadow rounded" :to="localePath({ name: 'courses-slug', params: { slug: course.slug } })">
              <span class="font-medium">{{ course.title }}</span>
            </nuxt-link>
            </div>
          </div>
        </template>

        <p v-else>Er zijn geen cursussen gevonden voor het onderwerp {{ topic.display_name.toLowerCase() }}.</p>

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
      topic: 'topics/currentTopic',
      popularTopicCourses: 'courses/popularTopic',
      topicCourses: 'courses/allTopic',
    }),

    chunkedPopularCourses() {
      return _.chunk(_.take(this.popularTopicCourses, 3), 3)
    },

    chunkedAllCourses() {
      return _.chunk(this.topicCourses, 3)
    },
  },

  mounted() {
    this.$store.commit('topics/REMOVE_CURRENT_TOPIC');

    this.$store.dispatch('topics/fetchTopicBySlug', this.$route.params.slug)
    .then(() => {
      this.$axios.post('http://dnh-leer-platform.test/api/v1/views/record-topic-view/'+this.topic.id, {
        'visitor': 'dsfda',
        'ip_address': '33535',
        'has_do_not_track_header': false,
        'is_crawler': false,
      })
    });

    this.$store.dispatch('courses/fetchCoursesByTopic', this.$route.params.slug)
  },
}
</script>
