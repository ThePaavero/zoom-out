<template>
  <div class='structure-display'>
    <Notifications/>
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
      <CreateModelForm v-if='this.$store.state.creatingNewModel'/>
      <button v-else @click.prevent='createNew("model")'>Create new Model</button>
    </section>
    <!--<button @click='submit'>Submit project structure</button>-->
  </div><!-- structure-display -->
</template>

<script>
  import Notifications from './Notifications.vue'
  import CreateModelForm from './CreateModelForm.vue'

  export default{
    components: {
      Notifications,
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

<style scoped>
  .structure-display {
    text-align: left;
  }

  small {
    opacity: 0.5;
  }
</style>
