<template>
  <div class='structure-display'>
    <!--<pre>{{ this.$store.state.structure }}</pre>-->
    <section>
      <h2>Controllers</h2>
      <ul>
        <li v-for='data in this.$store.state.structure.controllers'>
          {{ data }}
        </li>
      </ul>
    </section>
    <!-- -->
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
</style>
