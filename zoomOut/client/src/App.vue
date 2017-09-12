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
      axios.get('http://zoom-out.dev:8000/zoomOut/backend/').then(response => {
        this.$store.commit('setStructure', response.data)
      })
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
</style>
