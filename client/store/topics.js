import _ from 'lodash'
import axios from 'axios'

const SET_TOPICS = 'SET_TOPICS'
const REMOVE_TOPICS = 'REMOVE_TOPICS'

export const state = () => ({
  topics: [],
})


export const mutations = {
  [SET_TOPICS](state, { topics }) {
    state.topics = topics
  },

  [REMOVE_TOPICS](state) {
    state.topics = []
  },
}

export const getters = {
  /**
   * Get sectors ordered by rank.
   *
   * @return {Array}
   */
  all: state => {
    return state.topics;
    return _.orderBy(state.sectors, 'order_by_rank')
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
}
