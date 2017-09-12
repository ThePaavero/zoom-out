<template>
  <div @keyup.enter.stop.prevent='submit'>
    <label>
      Database column name
      <input type='text' v-model='field.databaseColumnName' placeholder='phoneNumber'/>
    </label>
    <button @click='submit'>Done</button>
  </div>
</template>

<script>
  import _ from 'lodash'

  export default{
    props: [],
    mounted() {
      // ...
    },
    components: {},
    data() {
      return {
        field: {
          databaseColumnName: 'MARSU',
        }
      }
    },
    methods: {
      submit() {
        this.$emit('submit', this.field)
      }
    }
  }
</script>

<style scoped>
</style>
