<template>
  <div @keyup.enter='submit' class='add-new-area'>
    <div v-if='isDisabled' class='disabled-blocker'></div>
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
  import network from './../lib/NetworkCall'
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
        },
        isDisabled: false
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
      setDisabled(bool) {
        this.isDisabled = bool
      },
      close() {
        this.$store.commit('setCreatingNewModel', false)
      },
      submit() {
        this.setDisabled(true)
        network.post('create.php', {
          data: {
            object: this.objectToCreate,
            type: 'model'
          }
        }).then(response => {
          if (response.data.success) {
            this.$store.commit('structure', null)
            network.get('').then(response => {
              this.$store.commit('setStructure', response.data)
              this.setDisabled(false)
              this.close()
            })
            return
          }
          window.alert('Something went wrong:\n\n' + response.data.error)
        }).catch(console.error)
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
    position: relative;
  }

  .disabled-blocker {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    opacity: 0.7;
    z-index: 5;
  }
</style>
