<template>
  <div @keyup.enter='submit'>
    <label>
      Database column name
      <input type='text' v-model='field.databaseColumnName' placeholder='phoneNumber'/>
    </label>
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
          databaseColumnName: '',
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
