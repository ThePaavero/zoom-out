<template>
  <div class='add-new-area'>
    <h2>Create new model</h2>
    <a href='#' @click.prevent='close'>Cancel</a>
    <p>...</p>
  </div><!-- add-new-area -->
</template>

<script>
  export default{
    props: [],
    components: {},
    data() {
      return {}
    },
    methods: {
      close() {
        this.$store.commit('setCreateNewModel', false)
      }
    }
  }
</script>

<style scoped>
  h2 {
    font-size: 15px;
  }

  .add-new-area {
    padding: 5px 10px;
    background-color: #d8ffd8;
  }
</style>
