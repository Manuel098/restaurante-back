<template>
    <v-card class="mx-auto" max-width="400px">
    <v-img class="white--text" height="180px" v-bind:src="source" />
    <v-card-text>
      <span class="title">{{titulo}}</span><br>
      
    </v-card-text>
    </v-card>
</template> 

<script>
export default {
    name: 'CardIn',
    props:["title", "source"],
    data: function(){
      return {
        titulo: this.title,
        source: this.source
      }
    },
    methods: {
      hola() {
        console.log(source)
      }
    },
    mounted() {
    }
    
}
</script>
<style>
 
</style>

/* eslint-disable */