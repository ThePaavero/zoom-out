<template>
  <div @keyup.stop.prevent='update' @click.stop.prevent='update'>
    <label>
      Database column name
      <input type='text' v-model='field.databaseColumnName' placeholder='phoneNumber'/>
    </label>
    <label>
      Database column type
      <select v-model='field.databaseColumnType'>
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
    },
    components: {},
    data() {
      return {
        field: {
          databaseColumnName: '',
          databaseColumnType: 'integer'
        }
      }
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
