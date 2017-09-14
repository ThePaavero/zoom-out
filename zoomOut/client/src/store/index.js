import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  structure: null,
  createNewModel: false,
  modelsToCreate: [],
  backendBaseUrl: 'http://zoom-out.dev:8000/zoomOut/backend/'
}

const mutations = {
  setStructure(state, structure){
    state.structure = structure
  },
  setCreateNewModel(state, bool) {
    state.createNewModel = bool
  },
  addToModelsToCreate(state, obj) {
    state.modelsToCreate.push(obj)
  },
}

export default new Vuex.Store({
  state,
  mutations
})
