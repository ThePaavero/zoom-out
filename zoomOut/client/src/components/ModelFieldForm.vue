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
  export default{
    props: ['container']
  }
</script>

<style scoped>
</style>
