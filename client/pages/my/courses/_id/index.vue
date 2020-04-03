<template>
  <p>Redirecting...</p>
</template>

<script>
import _ from 'lodash'
import { mapGetters } from 'vuex'

export default {
  name: 'Index',

  computed: {
    ...mapGetters({
      course: 'courses/currentCourse',
    }),
  },

  mounted() {
    this.$store.dispatch('courses/fetchCourse', this.$route.params.id)
      .then(() => {

        var slug = this.course.chapters[0].slug;

        this.$router.push(this.localePath({ name: 'my-courses-id-chapters-slug', params: { id: this.course.id, slug: slug } }));

      });
  },
}
</script>
