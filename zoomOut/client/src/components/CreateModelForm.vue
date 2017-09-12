<template>
  <div @keyup.enter='submit' class='add-new-area'>
    <h2>Create new model</h2>
    <a href='#' @click.prevent='close'>Cancel</a>
    <div class='row'>
      <label>
        Model class name
        <input type='text' v-model='objectToCreate.className' placeholder='Product'/>
      </label>
    </div><!-- row -->
    <div class='row'>
      <label>
        Fields
        <ModelFieldForm :container='this.getNewFieldContainer()'/>
      </label>
    </div><!-- row -->
    <button @click='submit'>Save</button>
  </div><!-- add-new-area -->
</template>

<script>
  import ModelFieldForm from './ModelFieldForm.vue'

  export default{
    props: [],
    components: {
      ModelFieldForm,
    },
    data() {
      return {
        objectToCreate: {
          className: '',
          databaseFields: []
        }
      }
    },
    methods: {
      getNewFieldContainer() {
        const container = {
          databaseColumnName: ''
        }
        return container
      },
      close() {
        this.$store.commit('setCreateNewModel', false)
      },
      submit() {
        this.$store.commit('addToModelsToCreate', this.objectToCreate)
      },
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
