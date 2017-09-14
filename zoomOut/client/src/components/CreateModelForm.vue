<template>
  <div @keyup.enter='submit' class='add-new-area'>
    <div v-if='isDisabled' class='disabled-blocker'></div>
    <h2>Create new model</h2>
    <div class='content'>
      <a href='#' @click.prevent='cancel' class='cancel-button large'>×</a>
      <div class='row'>
        <label>
          Model class name
          <input type='text' v-model='objectToCreate.className' placeholder='e.g. "Product"' ref='classNameInput'/>
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
          <div class='database-fields-tools'>
            <div v-for='field in objectToCreate.databaseFields'>
              <ModelFieldForm :container='field' @canceled='cancelField(field)'/>
            </div>
          </div><!-- database-fields-tools -->
        </label>
      </div><!-- row -->
      <button @click='addFieldForm'>Add field</button>
      <button @click='submit'>Save</button>
    </div><!-- content -->
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
    mounted() {
      this.$refs.classNameInput.focus()
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
          useSoftDeleted: false,
          isNullable: false,
          isFillable: true
        }
        this.objectToCreate.databaseFields.push(newFieldObject)
      },
      setDisabled(bool) {
        this.isDisabled = bool
      },
      cancel() {
        this.$store.commit('setCreatingNewModel', false)
        this.$store.commit('addNotification', {
          type: 'success',
          message: 'New model canceled, nothing was saved.'
        })
      },
      submit() {
        if (this.objectToCreate.databaseColumnName.trim() === '') {
          return

        }
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
        this.$store.commit('addNotification', {
          type: 'success',
          message: 'Field canceled, nothing was saved.'
        })
      }
    }
  }
</script>

<style lang='scss' type='text/scss'>
  .add-new-area {
    background-color: #fff;
    position: relative;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);

    .content {
      position: relative;
      padding: 10px 20px;
      border-top: none;

      .cancel-button {
        position: absolute;
        top: 5px;
        right: 20px;
      }
    }

    h2 {
      font-size: 15px;
      padding: 5px 10px;
      background: #9fd5bd;
      color: #fff;
      margin: 0;
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

    .database-fields-tools {
      padding: 10px 0;
    }
  }
</style>
