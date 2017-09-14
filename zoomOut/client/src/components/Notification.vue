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
      const ttl = typeof this.notification.ttl === 'undefined' ? -1 : (Number(this.notification.ttl) * 1000)
      if (ttl < 0) {
        return
      }
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
