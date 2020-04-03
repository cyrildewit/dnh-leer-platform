<template>
  <div v-if="course && chapter">

    <div class="py-8 bg-gray-100 border-b border-gray-300">
      <div class="container mx-auto px-6">

        <div class="flex -mx-2">
          <div class="w-8/12 px-2 flex">
            <div class="rounded overflow-hidden">
              <img src="https://via.placeholder.com/300x200.png" style="max-height: 120px;" alt="">
            </div>

            <div class="ml-4 flex items-center">
              <div>
                <h1 class="text-2xl mb-2">{{ course.title }}</h1>
                <p class="text-base"><span v-html="course.headline"></span></p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="container mx-auto px-6">
      <div class="py-6">

        <div class="flex -mx-4">

          <div class="w-4/12 px-4">
            <h2 class="uppercase text-sm mb-4">Hoofdstukken</h2>

            <div class="mb-4" v-for="chapter in course.chapters" :key="chapter.id">
              <nuxt-link
                :to="localePath({ name: 'my-courses-id-chapters-slug', params: { id: course.id, slug: chapter.slug } })"
                class="font-medium text-lg mb-2 hover:text-blue-700"
              >
                {{ chapter.title }}
              </nuxt-link>

              <!-- <nuxt-link
                v-for="section in chapter.sections" :key="section.id"
                :to="localePath({ name: 'my-courses-id-chapters-s', params: { id: course.id } })"
              > -->

            </div>
          </div>

          <div class="w-8/12 px-4">
            <div class="border shadow rounded px-6 py-6">
              <h2 class="font-medium text-2xl mb-2">{{ chapter.title }}</h2>

              <div class="course-content" v-html="course.description"></div>
            </div>

            <div class="border shadow rounded px-6 py-6 mt-6" v-for="section in chapter.sections" :key="section.id">
              <h2 class="font-medium text-lg mb-2">{{ section.title }}</h2>

              <div class="course-content" v-html="section.content"></div>
            </div>
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
      course: 'courses/currentCourse',
      chapter: 'chapters/currentChapter',
    }),
  },

  methods: {
  },

  mounted() {
    this.$store.dispatch('courses/fetchCourse', this.$route.params.id)
      .then(() => {
        this.$store.dispatch('chapters/fetchChapterBySlug', this.$route.params.slug)
      });
  },
}
</script>
