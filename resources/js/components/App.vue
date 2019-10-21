/* eslint-disable */
<template>
  <v-app>
    <v-toolbar app fixed>
      <v-toolbar-title>FOOD FOLKS</v-toolbar-title>
      <div class="flex-grow-1"></div>
      <v-toolbar-items>
        <v-btn @click="changeDialog()" text>Log in</v-btn>
        <v-btn text>Sign in</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <Home :dialog="this.dialogIn"/>
  </v-app>
</template>

<script>
import Home from './Home';
export default {
  name: 'App',
  components: {
    Home,
  },
  data: () => ({  
    dialogIn: true
  }),
  methods: {
    changeDialog(){
      this.dialog=true;
    }
  },
  mounted(){
},
};
</script>