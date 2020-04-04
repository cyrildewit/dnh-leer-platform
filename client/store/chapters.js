import _ from 'lodash'
import axios from 'axios'

const SET_CURRENT_CHAPTER = 'SET_CURRENT_CHAPTER'
const REMOVE_CURRENT_CHAPTER = 'REMOVE_CURRENT_CHAPTER'

export const state = () => ({
  currentChapter: null,
})


export const getters = {
  currentChapter: state => {
    return state.currentChapter;
  },
}

export const mutations = {

  [SET_CURRENT_CHAPTER](state, { chapter }) {
    state.currentChapter = chapter
  },

  [REMOVE_CURRENT_CHAPTER](state) {
    state.currentChapter = null
  },
}

export const actions = {
  async fetchChapter({ commit }, id) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/chapters/' + id)

      commit(SET_CURRENT_CHAPTER, { chapter: data })
    } catch (e) {
      commit(REMOVE_CURRENT_CHAPTER)
    }
  },

  async fetchChapterBySlug({ commit }, slug) {
    try {
      const { data } = await axios.get('http://dnh-leer-platform.test/api/v1/chapters/getBySlug/' + slug)

      commit(SET_CURRENT_CHAPTER, { chapter: data })
    } catch (e) {
      commit(REMOVE_CURRENT_CHAPTER)
    }
  },
}
