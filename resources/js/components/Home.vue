<template>
  <div class="back">
    <v-app id="inspire">
      <v-content>
        <v-container fluid fill-height>
          <section class="CardContainer" align="center">
            <div>
            <CardIn title="Menu" 
            source="https://cdn.pixabay.com/photo/2014/10/19/20/59/hamburger-494706_960_720.jpg"/>
            </div>
            <div>
            <CardIn title="Generar cuenta" 
            source="https://cdn.pixabay.com/photo/2016/07/15/21/07/credit-card-1520400_960_720.jpg"/>
            </div>
            <div>
            <CardIn title="Asignar mesero" 
            source="https://cdn.pixabay.com/photo/2017/06/06/09/22/waitress-2376728_960_720.jpg"/>
            </div>
            <div>
            <CardIn title="Proveedores" 
            source="https://cdn.pixabay.com/photo/2017/05/23/22/36/vegetables-2338824_960_720.jpg"/>
            </div>
            <div>
            <CardIn title="Stock" 
            source="https://cdn.pixabay.com/photo/2018/02/24/07/48/food-3177460_960_720.jpg"/>
            </div>
            <div>
            <CardIn title="Efectivo total" 
            source="https://cdn.pixabay.com/photo/2014/10/23/10/10/dollar-499481_960_720.jpg"/>
            </div>
          </section>
        </v-container>
      </v-content>
      <Login :dial="this.dialog2" />
    <!--<Signin />-->
    </v-app>
  </div>
</template>

<script>
import CardIn from './CardIndex';
import Login from './Login';
import Signin from './Signin';
export default {
  name: 'Home',
  props: ['dialog'],
  data: function(){
    return {
      dialog2: this.dialog
      
      
}
  },
  components: {
    CardIn,
    Login,
    Signin
  },
  mounted(){
  console.log(this.dialog)
  },
  methods: {
    
  },
};
</script>

<style>
.back {
  background: url("../public/img/back.jpeg");
  background-size: cover;
}
#inspire{
  background: none;
}
.CardContainer  div{
  display: inline-block;
  margin-right: 12px;
  margin-bottom: 12px;
  
}
</style>