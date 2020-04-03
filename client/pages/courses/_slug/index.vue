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
                <p class="text-base">{{ course.headline }}</p>
              </div>
            </div>
          </div>

          <div class="w-4/12 px-2 flex items-center justify-end">

            <button v-if="$auth.loggedIn" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow ">
              Inschrijven
            </button>

            <button v-else class="bg-gray-200 text-gray-600 font-semibold py-2 px-4 border border-gray-400 rounded shadow" title="Maak een account aan om in te schrijven!">
              Inschrijven
            </button>

          </div>
        </div>

      </div>
    </div>

    <div class="container mx-auto px-6">
      <div class="py-6">

        <div class="flex -mx-4">
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

          <div class="w-4/12 px-4">
            <div class="pb-4">
              <h2 class="font-medium text-lg">Instructeurs</h2>

              <div>
                <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/50x50.png">
              </div>
            </div>

            <div class="border shadow rounded px-3 py-2">
              <h2 class="font-medium text-lg">Omschrijving</h2>

              <ul>
                <li></li>
              </ul>
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
    }),
  },

  mounted() {
    this.$store.dispatch('courses/fetchCourseBySlug', this.$route.params.slug)
      .then(() => {
        this.$axios.post('http://dnh-leer-platform.test/api/v1/views/record-course-view/'+this.course.id, {
          'visitor': 'dsfda',
          'ip_address': '33535',
          'has_do_not_track_header': false,
          'is_crawler': false,
        })
      });
  },
}
</script>
