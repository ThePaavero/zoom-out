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
        <div v-for='field in objectToCreate.databaseFields'>
          <ModelFieldForm @submit='addFieldToObject'/>
        </div>
      </label>
    </div><!-- row -->
    <button @click='addFieldForm'>Add field</button>
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
      addFieldForm() {
        this.objectToCreate.databaseFields.push({})
      },
      close() {
        this.$store.commit('setCreateNewModel', false)
      },
      submit() {
//        this.$store.commit('addToModelsToCreate', this.objectToCreate)
        console.log('Create new model:', this.objectToCreate)
        this.close()
      },
      addFieldToObject(field) {
        console.log('Got field:', field)
        this.objectToCreate.databaseFields.push(field)
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
