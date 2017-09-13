<template>
  <div class='field-wrapper'>
    <div class='col'>
      <label>
        Database column name
        <input type='text' v-model='container.databaseColumnName' placeholder='phoneNumber' ref='nameInput'/>
      </label>
    </div><!-- col -->
    <div class='col'>
      <label>
        Database column type
        <select v-model='container.databaseColumnType'>
          <option v-for='type in possibleTypes' :value='type'>{{ type }}</option>
        </select>
      </label>
    </div><!-- col -->
    <div class='col'>
      <label>
        Index
        <input type='checkbox' value='index' v-model='container.isIndex'/>
      </label>
    </div><!-- col -->
    <a href='#' @click.prevent='cancel' class='cancel-button'>Cancel</a>
  </div>
</template>

<script>
  export default{
    mounted() {
      this.$refs.nameInput.focus()
    },
    props: ['container'],
    data() {
      return {
        possibleTypes: [
          'bigIncrements',
          'bigInteger',
          'binary',
          'boolean',
          'char',
          'date',
          'dateTime',
          'dateTimeTz',
          'decimal',
          'double',
          'enum',
          'float',
          'increments',
          'integer',
          'ipAddress',
          'json',
          'jsonb',
          'longText',
          'macAddress',
          'mediumIncrements',
          'mediumInteger',
          'mediumText',
          'morphs',
          'nullableMorphs',
          'nullableTimestamps',
          'rememberToken',
          'smallIncrements',
          'smallInteger',
          'softDeletes',
          'string',
          'string',
          'text',
          'time',
          'timeTz',
          'tinyInteger',
          'timestamp',
          'timestampTz',
          'timestamps',
          'timestampsTz',
          'unsignedBigInteger',
          'unsignedInteger',
          'unsignedMediumInteger',
          'unsignedSmallInteger',
          'unsignedTinyInteger',
          'uuid',
        ]
      }
    },
    methods: {
      cancel() {
        this.$emit('canceled')
      }
    }
  }
</script>

<style scoped>
  .field-wrapper {
    position: relative;
    margin: 2px 0;
  }

  .col {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 5px 10px;
    display: inline-block;
    margin-right: 1px;
  }

  .cancel-button {
    text-decoration: none;
    font-size: 11px;
    position: absolute;
    top: 3px;
    right: 5px;
  }
</style>
