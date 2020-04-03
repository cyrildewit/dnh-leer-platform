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

            <button v-if="$auth.loggedIn" @click="enroll" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow ">
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
            <div class="mb-4">
              <h2 class="font-medium text-lg mb-2">Instructeurs</h2>

              <div v-for="author in course.authors" :key="author.id" class="flex items-center border rounded shadow p-3">
                <img class="w-10 h-10 rounded-full" :src="author.avatar">
                <h4 class="ml-2 font-medium">{{ author.name }}</h4>
              </div>
            </div>

            <div class="mb-4">
              <h2 class="font-medium text-lg mb-2">Details</h2>

              <ul class="border shadow rounded p-3">
                <li><strong class="text-gray-700">Niveau:</strong> {{ course.level }}</li>
                <li><strong class="text-gray-700">Studieduur: </strong> {{ course.estimated_duration }} uur</li>
                <li><strong class="text-gray-700">Taal:</strong> {{ course.language.toUpperCase() }}</li>
                <li><strong class="text-gray-700">Onderwerp:</strong> {{ course.topic.display_name }}</li>
                <li><strong class="text-gray-700">Unieke weergaven:</strong> {{ course.unique_views_count + 1 }}x bekeken</li>
              </ul>
            </div>

            <div>
              <h2 class="font-medium text-lg mb-2">Labels</h2>

              <div>
                <a class="border rounded px-3 py-1 text-sm mr-2" v-for="tag in course.tags" :key="tag.id">{{ tag.name.en }}</a>
              </div>
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
    }),
  },

  methods: {
    enroll() {
      this.$axios.post('http://dnh-leer-platform.test/api/v1/courses/'+ this.course.id +'/enroll')
    },
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
