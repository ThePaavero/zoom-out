import Vue from 'vue'
import App from './App.vue'
import store from './store'
import network from './lib/NetworkCall'

Vue.config.productionTip = false
network.setBaseUrl('http://zoom-out.dev:8000/zoomOut/backend/')

new Vue({
  el: '#app',
  template: '<App/>',
  components: {App},
  store
})
