import _ from 'lodash'
import axios from 'axios'

const SET_COURSES = 'SET_COURSES'
const REMOVE_COURSES = 'REMOVE_COURSES'
const SET_CURRENT_COURSE = 'SET_CURRENT_COURSE'
const REMOVE_CURRENT_COURSE = 'REMOVE_CURRENT_COURSE'

export const state = () => ({
  courses: [],
  currentCourse: null,
})


export const getters = {
  /**
   * Get sectors ordered by rank.
   *
   * @return {Array}
   */
  all: state => {
    return state.courses;
  },

  popular: state => {
    return _.orderBy(state.courses, 'unique_views_count')
  },

  currentCourse: state => {
    return state.currentCourse;
  },
}

export const mutations = {
  [SET_COURSES](state, { courses }) {
    state.courses = courses
  },

  [REMOVE_COURSES](state) {
    state.courses = []
  },

  [SET_CURRENT_COURSE](state, { course }) {
    state.currentCourse = course
  },

  [REMOVE_CURRENT_COURSE](state) {
    state.currentCourse = null
  },
}

export const actions = {
  async fetchCourses({ commit }) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/courses')

      commit(SET_COURSES, { courses: data.data })
    } catch (e) {
      commit(REMOVE_COURSES)
    }
  },

  async fetchCourseBySlug({ commit }, slug) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/courses/getBySlug/' + slug)

      commit(SET_CURRENT_COURSE, { courses: data.data })
    } catch (e) {
      commit(REMOVE_CURRENT_COURSE)
    }
  },
}
