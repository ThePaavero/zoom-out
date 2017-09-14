import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  structure: null,
  creatingNewModel: false,
  modelsToCreate: [],
}

const mutations = {
  setStructure(state, structure){
    state.structure = structure
  },
  setCreatingNewModel(state, bool) {
    state.creatingNewModel = bool
  },
  addToModelsToCreate(state, obj) {
    state.modelsToCreate.push(obj)
  }
}

export default new Vuex.Store({
  state,
  mutations
})
