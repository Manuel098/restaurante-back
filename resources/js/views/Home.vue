<template>

<v-app>
  <v-banner single-line>
    Setup del proyecto, todo listo para empezar el desarrollo!
    <template v-slot:actions>
      <v-btn
        @click="showCard()"
        text
        color="deep-purple accent-4"
      >
        Show card
      </v-btn>

    </template>
  </v-banner>

  <v-card
    max-width="344"
    class="mx-auto"
    v-if="flag==true"
  >

        <v-card-title>Title</v-card-title>
        <v-card-text>Text text text text text text text text text text</v-card-text>
        <v-card-actions>
          <v-btn text @click="hideCard()">Dismiss</v-btn>
        </v-card-actions>
      </v-card>
</v-app>
  
</template>

<script>


export default {
  data: function(){
    return {
      flag: false
    }
  },
  components: {
    
  },
  mounted(){
  
  },
  methods: {

    showCard: function(){
      this.flag=true;
    },
    hideCard: function(){
      this.flag=false;
    }

  },
};
</script>
