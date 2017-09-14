<template>
  <div id="app">
    <StructureDisplay v-if='this.$store.state.structure'/>
    <div v-else>
      Loading structure, just a sec...
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import StructureDisplay from './components/StructureDisplay.vue'

  export default {
    mounted() {
      const secondsToWaitBeforeGivingUp = 5
      let gotServerResponse = false
      axios.get(this.$store.state.backendBaseUrl).then(response => {
        gotServerResponse = true
        this.$store.commit('setStructure', response.data)
      })
      setTimeout(() => {
        if (!gotServerResponse) {
          window.alert('Something\'s fucky. Is the server listening?')
        }
      }, secondsToWaitBeforeGivingUp * 1000)
    },
    components: {
      StructureDisplay
    }
  }
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }

  a {
    color: inherit;
  }
</style>
