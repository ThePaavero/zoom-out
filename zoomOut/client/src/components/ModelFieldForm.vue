<template>
  <div>
    <div class='col'>
      <label>
        Database column name
        <input type='text' v-model='container.databaseColumnName' placeholder='phoneNumber'/>
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
  </div>
</template>

<script>
  export default{
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
    }
  }
</script>

<style scoped>
</style>
