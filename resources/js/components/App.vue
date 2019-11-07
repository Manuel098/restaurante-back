<template>
  <v-layout>
    <v-flex xs12>
      <Login :dialogShared="initialDialog" @log="setInitial" />
      <Signin :signShared="initialSign" @sign="setSign" />
      <v-toolbar dark fixed>
        <router-link to="/" exact tag="h1">
          <v-toolbar-title>FOOD FOLKS</v-toolbar-title>
        </router-link>
        <div class="flex-grow-1"></div>
        <v-toolbar-items>
          <v-btn text @click="handleLogin()">Log in</v-btn>
          <v-btn text @click="handleSignin()">Sign in</v-btn>
        </v-toolbar-items>
      </v-toolbar>
      <router-view></router-view>
      <!--<home></home>-->
    </v-flex>
  </v-layout>
</template>

<script>
import Home from './Home';
import Login from "./Login";
import Signin from "./Signin";
export default {
  name: "app",
  components: {
    Home,
    Login,
    Signin
  },
  data: () => ({
    initialDialog: false,
    initialSign: false
  }),
  methods: {
    handleLogin() {
      this.initialDialog = true;
    },
    handleSignin() {
      this.initialSign = true;
    },
    setInitial(log) {
      this.initialDialog = log;
    },
    setSign(sign) {
      this.initialSign = sign;
    }
  },
  mounted() {}
};
</script>