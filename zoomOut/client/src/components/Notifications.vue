<template>
  <div class='notifications-container'>
    <Notification v-for='notification in this.$store.state.notifications' :key='notification.message' :notification='notification'/>
  </div>
</template>

<script>
  import Notification from './Notification.vue'

  export default{
    props: [],
    components: {
      Notification,
    },
    data() {
      return {}
    },
    methods: {}
  }
</script>

<style lang='scss' type='text/scss' scoped>
  .notifications-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;

    .notification {
      display: block;
      position: relative;
      padding: 5px 10px;
      margin-bottom: 1px;
      color: #fff;
      cursor: pointer;

      &.success {
        background-color: #2ab27b;
      }
    }
  }
</style>
