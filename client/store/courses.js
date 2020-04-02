import _ from 'lodash'
import axios from 'axios'

const SET_COURSES = 'SET_COURSES'
const REMOVE_COURSES = 'REMOVE_COURSES'
const SET_CURRENT_COURSE = 'SET_CURRENT_COURSE'
const REMOVE_CURRENT_COURSE = 'REMOVE_CURRENT_COURSE'

export const state = () => ({
  topics: [],
  currentTopic: null,
})


export const getters = {
  /**
   * Get sectors ordered by rank.
   *
   * @return {Array}
   */
  all: state => {
    return state.topics;
  },

  /**
   * Get sectors ordered by rank.
   *
   * @return {Array}
   */
  popular: state => n => {
    return _.orderBy(state.topics, 'unique_views_count')
  },

  /**
   * Get sectors ordered by rank.
   *
   * @return {Array}
   */
  currentTopic: state => {
    return state.currentTopic;
  },
}

export const mutations = {
  [SET_COURSES](state, { topics }) {
    state.topics = topics
  },

  [REMOVE_COURSES](state) {
    state.topics = []
  },

  [SET_CURRENT_COURSE](state, { topic }) {
    state.currentTopic = topic
  },

  [REMOVE_CURRENT_COURSE](state) {
    state.currentTopic = null
  },
}

export const actions = {
  async fetchTopics({ commit }) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/courses')

      commit(SET_COURSES, { topics: data.data })
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
