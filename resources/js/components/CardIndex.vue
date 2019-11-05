<template>
  <v-layout>
    <v-flex xs12>
      <v-card class="mx-auto" max-width="400px">
        <v-img class="white--text" height="180px" v-bind:src="sourceImg" />
        <v-card-text>
          <span class="title">{{titulo}}</span>
          <br />
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template> 

<script>
export default {
  name: "CardIn",
  props: ["title", "source"],
  data: function() {
    return {
      titulo: this.title,
      sourceImg: this.source
    };
  },
  methods: {},
  mounted() {}
};
</script>
<style>
</style>

