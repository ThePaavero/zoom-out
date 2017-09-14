<template>
  <div class='field-wrapper'>
    <form @keyup='validateState' @change='validateState'>
      <div class='col active'>
        <label>
          Database column name
          <input type='text' v-model='container.databaseColumnName' placeholder='phoneNumber' ref='nameInput'/>
        </label>
      </div><!-- col -->
      <div class='col active'>
        <label>
          Database column type
          <select v-model='container.databaseColumnType'>
            <option v-for='type in possibleTypes' :value='type'>{{ type }}</option>
          </select>
        </label>
      </div><!-- col -->
      <div class='col' :class='{ active: indexingAllowed }'>
        <label>
          Index
          <input type='checkbox' value='index' v-model='container.isIndex'/>
        </label>
      </div><!-- col -->
      <div class='col' :class='{ active: nullableAllowed }'>
        <label>
          Nullable
          <input type='checkbox' value='nullable' v-model='container.isNullable'/>
        </label>
      </div><!-- col -->
      <a href='#' @click.prevent='cancel' class='cancel-button'>Cancel</a>
    </form>
  </div>
</template>

<script>
  export default{
    mounted() {
      this.$refs.nameInput.focus()
      this.validateState()
    },
    props: ['container'],
    data() {
      return {
        indexingAllowed: false,
        nullableAllowed: false,
        possibleTypes: [
          'string',
          'text',
          'boolean',
          'dateTime',
          'float',
          'integer',
          'enum',
          'json',
          'longText',
        ],
        indexableTypes: [
          'string',
          'boolean',
          'dateTime',
          'float',
          'integer',
          'enum',
        ]
      }
    },
    methods: {
      validateState() {
        this.validateIndexable()
        this.validateNullable()
      },
      cancel() {
        this.$emit('canceled')
      },
      validateIndexable() {
        let bool = this.indexableTypes.indexOf(this.container.databaseColumnType) > -1
        if (this.container.isNullable) {
          bool = false
        }
        this.setIndexingAllowed(bool)
        if (bool === false && this.container.isIndex) {
          this.container.isIndex = false
        }
      },
      setIndexingAllowed(bool) {
        this.indexingAllowed = bool
      },
      validateNullable() {
        const bool = !this.container.isIndex
        this.setNullableAllowed(bool)
        if (!bool) {
          this.container.isNullable = false
        }
      },
      setNullableAllowed(bool) {
        this.nullableAllowed = bool
      }
    }
  }
</script>

<style lang='scss' type='text/scss' scoped>
  .field-wrapper {
    position: relative;
    margin: 2px 0;
  }

  .col {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 5px 10px;
    display: inline-block;
    margin-right: 1px;
    opacity: 0.3;
    transition: opacity 0.15s;

    &.active {
      opacity: 1;
    }
  }

  .cancel-button {
    text-decoration: none;
    font-size: 11px;
    position: absolute;
    top: 3px;
    right: 5px;
  }
</style>
