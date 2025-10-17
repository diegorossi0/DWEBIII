<script setup>
  import menuApp from './components/menuApp.vue';
  import {RouterView} from 'vue-router';
  import rodapeApp from './components/rodapeApp.vue';
</script>

<template>
  <v-app>
    <menuApp />
    <v-main>
      <RouterView/>
    </v-main>
    <rodapeApp/>
  </v-app>
</template>

<style scoped></style>
