<template>
  <div>
    <label>
      Database column name
      <input type='text' v-model='databaseColumnName' placeholder='phoneNumber' @keyup='update'/>
    </label>
  </div>
</template>

<script>
  import _ from 'lodash'

  export default{
    props: ['container'],
    mounted() {
      console.log(this.container)
    },
    components: {},
    data() {
      return {
        databaseColumnName: '',
      }
    },
    methods: {
      update() {
//        this.container.databaseColumnName = this.databaseColumnName
      }
    }
  }
</script>

<style scoped>
</style>
