<template>
  <div class='structure-display'>
    <section>
      <h2>Controllers</h2>
      <ul>
        <li v-for='data in this.$store.state.structure.controllers'>
          <h4>{{ data.className }}</h4>
          <ul>
            <li v-for='method in data.methods'>
              <h5>
                <small>{{ method.modifiers[0] }}</small>
                {{ method.name }}
              </h5>
            </li>
          </ul>
        </li>
      </ul>
    </section>
    <section>
      <h2>Models</h2>
      <ul>
        <li v-for='data in this.$store.state.structure.models'>
          <h4>{{ data.className }}</h4>
          <ul>
            <li v-for='method in data.methods'>
              <h5>
                <small>{{ method.modifiers[0] }}</small>
                {{ method.name }}
              </h5>
            </li>
          </ul>
        </li>
      </ul>
      <transition name="fade" mode="out-in">
        <CreateModelForm v-if='this.$store.state.creatingNewModel'/>
        <button v-else @click.prevent='createNew("model")'>Create new Model</button>
      </transition>
    </section>
  </div><!-- structure-display -->
</template>

<script>
  import CreateModelForm from './CreateModelForm.vue'

  export default{
    components: {
      CreateModelForm,
    },
    methods: {
      createNew(type) {
        this.$store.commit('setCreatingNewModel', true)
      },
      submit() {
        console.log('Submit!')
      }
    }
  }
</script>

<style lang='scss' type='text/scss' scoped>
  .structure-display {
    text-align: left;
  }

  section {
    margin-bottom: 3vh;
    background-color: rgba(255, 2555, 255, 0.3);
    padding: 30px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  }

  small {
    opacity: 0.5;
  }
</style>
