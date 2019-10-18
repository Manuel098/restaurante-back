<template>
  <v-app>
    <v-app-bar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>Restaurant</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
        text
        href="https://vuetifyjs.com/es-MX/getting-started/quick-start"
        target="_blank"
      >
        <span class="mr-2">Vuetify documentation</span>
      </v-btn>
      <v-btn
        text
        href="https://vuejs.org/v2/guide/"
        target="_blank"
      >
        <span class="mr-2">Vue.js documentation</span>
      </v-btn>
    </v-app-bar>

    <v-content>
      <Home />
    </v-content>
  </v-app>
</template>

<script>
import Home from './views/Home';

export default {
  name: 'App',
  components: {
    Home,
  },
  data: () => ({  
    //
  }),
};
</script>
