<template>
  <div>
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
    <a href='#' @click.prevent='cancel'>Cancel</a>
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
</style>
