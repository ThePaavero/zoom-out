<template>
  <div id="app">
    <Notifications/>
    <transition name="fade" mode="out-in">
      <StructureDisplay v-if='this.$store.state.structure'/>
      <div v-else>
        Loading structure, just a sec...
      </div>
    </transition>
  </div>
</template>

<script>
  import axios from 'axios'
  import StructureDisplay from './components/StructureDisplay.vue'
  import Notifications from './components/Notifications.vue'
  import network from './lib/NetworkCall'

  export default {
    mounted() {
      const secondsToWaitBeforeGivingUp = 5
      let gotServerResponse = false
      network.get('').then(response => {
        gotServerResponse = true
        this.$store.commit('setStructure', response.data)
      }).catch(err => {
        this.$store.commit('addNotification', {
          type: 'error',
          message: 'The server choked on something!'
        })
      })
      setTimeout(() => {
        if (!gotServerResponse) {
          this.$store.commit('addNotification', {
            type: 'error',
            ttl: 10,
            message: 'Something\'s fucky. Is the server listening?'
          })
        }
      }, secondsToWaitBeforeGivingUp * 1000)
    },
    components: {
      StructureDisplay,
      Notifications,
    }
  }
</script>

<style lang='scss' type='text/scss'>
  * {
    margin: 0;
    padding: 0;
    border: none;
  }

  body {
    font-family: 'PT Sans', sans-serif;
    background-color: #eee;
    color: #0d3625;
  }

  button {
    padding: 10px 20px;
    cursor: pointer;
    background: #46916c;
    color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    transition: transform 0.05s;

    &.strong-button {
      background: #477468;
    }

    &:hover {
      transform: scale(1.05);
    }

    &:active {
      transform: none;
    }
  }

  h1 {
    margin-bottom: 20px;
  }

  h2 {
    margin-bottom: 18px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }

  h3 {
    margin-bottom: 13px;
  }

  h4 {
    margin-bottom: 8px;
  }

  ul {
    list-style-type: square;
    margin-left: 20px;

    li {
      padding: 5px 0;
    }
  }

  a {
    color: inherit;
  }

  .cancel-button {
    text-decoration: none;
    font-size: 21px;

    &.large {
      font-size: 35px;
    }
  }

  select,
  input[type=text] {
    border: solid 1px #46916c;
    padding: 5px 10px;
  }

  select {
    background-color: rgb(255, 251, 192);
  }

  input[type=checkbox] {
    width: 14px;
    height: 14px;
  }

  input,
  label {
    cursor: pointer;
  }

  #app {
    padding: 50px;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .2s
  }

  .fade-enter, .fade-leave-to {
    opacity: 0
  }
</style>
