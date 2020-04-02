import _ from 'lodash'
import axios from 'axios'

const SET_TOPICS = 'SET_TOPICS'
const REMOVE_TOPICS = 'REMOVE_TOPICS'
const SET_CURRENT_TOPIC = 'SET_CURRENT_TOPIC'
const REMOVE_CURRENT_TOPIC = 'REMOVE_CURRENT_TOPIC'

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
  [SET_TOPICS](state, { topics }) {
    state.topics = topics
  },

  [REMOVE_TOPICS](state) {
    state.topics = []
  },

  [SET_CURRENT_TOPIC](state, { topic }) {
    state.currentTopic = topic
  },

  [REMOVE_CURRENT_TOPIC](state) {
    state.currentTopic = null
  },
}

export const actions = {
  async fetchTopics({ commit }) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/topics')

      commit(SET_TOPICS, { topics: data.data })
    } catch (e) {
      commit(REMOVE_TOPICS)
    }
  },

  async fetchTopicBySlug({ commit }, slug) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/topics/getBySlug/' + slug)

      commit(SET_CURRENT_TOPIC, { topics: data.data })
    } catch (e) {
      commit(REMOVE_CURRENT_TOPIC)
    }
  },
}
