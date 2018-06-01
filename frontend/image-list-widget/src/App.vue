<template>
  <div id="app">
    <image-list></image-list>
  </div>
</template>

<script>
import ImagesList from './components/ImagesList.vue'

export default {
  name: 'app',
  components: {
      'image-list': ImagesList
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /*color: #2c3e50;*/
}
</style>
