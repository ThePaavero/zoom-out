import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  structure: null,
  creatingNewModel: false,
  modelsToCreate: [],
  notifications: []
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
  },
  addNotification(state, notification) {
    state.notifications.push(notification)
  },
  removeNotification(state, notification) {
    state.notifications = state.notifications.filter(n => {
      return n !== notification
    })
  }
}

export default new Vuex.Store({
  state,
  mutations
})
