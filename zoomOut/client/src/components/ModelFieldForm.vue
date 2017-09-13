<template>
  <div>
    <label>
      Database column name
      <input type='text' v-model='container.databaseColumnName' placeholder='phoneNumber'/>
    </label>
    <label>
      Database column type
      <select v-model='container.databaseColumnType'>
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
    props: ['container'],
    components: {},
    data: () => {
      return {
        container: this.container
      }
    }
  }
</script>

<style scoped>
</style>
