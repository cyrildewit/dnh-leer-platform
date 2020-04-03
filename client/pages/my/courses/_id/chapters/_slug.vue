<template>
  <div v-if="course">

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
            <div class="mb-4" v-for="chapter in course.chapters" :key="chapter.id">
              <h2 class="font-medium text-lg mb-2">{{ chapter.title }}</h2>

              <nuxt-link
                :to="localePath({ name: 'my-courses-id', params: { id: this.course.id } })">{{ section.title }}</nuxt-link>

            </div>
          </div>

          <div class="w-8/12 px-4">
            <div class="border shadow rounded px-6 py-6">
              <h2 class="font-medium text-2xl mb-2">Over deze cursus</h2>

              <div class="course-content" v-html="course.description"></div>

              <h2 class="font-medium text-2xl mb-2">Wat leer je tijdens deze cursus</h2>
              <ul>
                <li class="list-disc list-inside ml-2" v-for="learning_point in course.learning_points" :key="learning_point">{{ learning_point }}</li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </div>

    <div class="container mx-auto px-6">

      <div class="mt-6 max-w-2xl mx-auto">
        <h2 class="font-medium text-2xl text-center mb-6">Curriculum van deze cursus</h2>

        <div>
          <div v-for="chapter in course.chapters" :key="chapter.id" class="border shadow rounded px-6 py-4 mb-4">
            <h3 class="font-medium text-xl mb-2">{{ chapter.title }}</h3>
            <p class="mb-1" v-for="section in chapter.sections" :key="section.id">{{ section.title }}</p>
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
      chapter: 'courses/currentChapter',
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
