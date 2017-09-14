<template>
  <transition name="fade">
    <div class='notification' :class='notification.type' @click.prevent='close'>
      {{ notification.message }}
    </div>
  </transition>
</template>

<script>
  export default{
    props: ['notification'],
    mounted() {
      const ttl = (this.notification.ttl || 5) * 1000
      setTimeout(() => {
        this.close()
      }, ttl)
    },
    methods: {
      close() {
        this.$store.commit('removeNotification', this.notification)
      }
    }
  }
</script>

<style lang='scss' type='text/scss' scoped>
  .fade-enter-active, .fade-leave-active {
    transition: opacity .2s
  }

  .fade-enter, .fade-leave-to {
    opacity: 0
  }
</style>
