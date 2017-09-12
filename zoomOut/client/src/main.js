import Vue from 'vue'
import App from './App'
import Vuex from 'vuex'

Vue.use(Vuex)
Vue.config.productionTip = false

const store = new Vuex.Store({
  state: {
    structure: null
  },
  mutations: {
    setStructure(state, structure){
      state.structure = structure
    }
  }
})

new Vue({
  el: '#app',
  template: '<App/>',
  components: {App},
  store
})
