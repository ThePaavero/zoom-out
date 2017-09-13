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
        Timestamps
        <input type='checkbox' value='index' v-model='objectToCreate.useTimestamps'/>
      </label>
    </div><!-- row -->
    <div class='row'>
      <label>
        Soft deletes
        <input type='checkbox' value='index' v-model='objectToCreate.useSoftDeleted'/>
      </label>
    </div><!-- row -->
    <div class='row'>
      <label>
        Fields
        <div v-for='field in objectToCreate.databaseFields'>
          <ModelFieldForm :container='field' @canceled='cancelField(field)'/>
        </div>
      </label>
    </div><!-- row -->
    <button @click='addFieldForm'>Add field</button>
    <button @click='submit'>Save</button>
  </div><!-- add-new-area -->
</template>

<script>
  import ModelFieldForm from './ModelFieldForm.vue'
  import axios from 'axios'
  import _ from 'lodash'

  export default{
    props: [],
    components: {
      ModelFieldForm,
    },
    data() {
      return {
        objectToCreate: {
          className: '',
          databaseFields: [],
          useTimestamps: true,
          useSoftDeletes: false
        }
      }
    },
    methods: {
      addFieldForm() {
        const newFieldObject = {
          databaseColumnName: '',
          databaseColumnType: 'string',
          isIndex: false,
          useTimestamps: true,
          useSoftDeleted: false
        }
        this.objectToCreate.databaseFields.push(newFieldObject)
      },
      close() {
        this.$store.commit('setCreateNewModel', false)
      },
      submit() {
        axios.post(this.$store.state.backendBaseUrl + 'create.php', {
          data: {
            object: this.objectToCreate,
            type: 'model'
          }
        }).then(response => {
          console.log('RESPONSE:')
          console.log(response.data)
          if (response.data.success) {
            this.$store.commit('structure', null)
            axios.get(this.$store.state.backendBaseUrl).then(response => {
              this.$store.commit('setStructure', response.data)
            })
            return
          }
          window.alert('Something went wrong:\n\n' + response.data.error)
        }).catch(console.error)
        this.close()
      },
      cancelField(field) {
        this.objectToCreate.databaseFields = this.objectToCreate.databaseFields.filter(i => {
          return i !== field
        })
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
