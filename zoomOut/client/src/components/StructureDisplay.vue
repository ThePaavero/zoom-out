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
  </div><!-- structure-display -->
</template>

<script>
  export default{
    props: [],
    components: {},
    data() {
      return {}
    },
    methods: {}
  }
</script>

<!--<style lang='scss' type='text/scss' scoped>-->
<style scoped>
  .structure-display {
    text-align: left;
  }

  small {
    opacity: 0.5;
  }
</style>
