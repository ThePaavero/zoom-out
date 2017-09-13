<template>
  <div @keyup.stop.prevent='update' @click.stop.prevent='update'>
    <label>
      Database column name
      <input type='text' v-model='object.databaseColumnName' placeholder='phoneNumber'/>
    </label>
    <label>
      Database column type
      <select v-model='object.databaseColumnType'>
        <option value='integer' selected>Integer</option>
        <option value='float'>Float</option>
        <option value='string'>String</option>
        <option value='boolean'>Boolean</option>
        <option value='dateTime'>DateTime</option>
      </select>
    </label>
  </div>
</template>

<script>
  import _ from 'lodash'

  export default{
    props: ['object'],
    mounted() {
      // ...
      console.log(this.object)
    },
    components: {},
    data: {
      object: this.object
    },
    methods: {
      update() {
        console.log('Update parent...')
        console.log(this.object)
      }
    }
  }
</script>

<style scoped>
</style>
