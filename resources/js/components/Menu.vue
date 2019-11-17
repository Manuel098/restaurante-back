<template>
 <v-container class="stlAll">
   <v-flex>
     <div v-for="tipos in menu" :key="tipos.id">
       <p class="display-1">{{tipos.nombre}}</p>
       <hr style="margin-left: 1%; margin-right: 1%;" />
       <br />
       <v-container class="row">
         <div v-for="comida in tipos.info_platillo" :key="comida.id" class="pa-2">
           <v-card max-width="350px" height="300px" @click="agregar(comida.nombre,comida.precio)">
             <v-img
               class="white--text align-end"
               height="200px"
               :src="comida.URL"
               :alt="comida.alt"
             >
               <v-card-title class="stlName">{{comida.nombre}}</v-card-title>
             </v-img>
             <v-card-subtitle class="headline">${{comida.precio}}</v-card-subtitle>
             <v-card-text>{{comida.tipo}}</v-card-text>
           </v-card>
         </div>
       </v-container>
     </div>
   </v-flex>
   <div>
     <c-agregar :titulo="nombre" :precio="precio" :dialog="modal_agregar"></c-agregar>
   </div>
 </v-container>
</template>
<script>
import axios from "axios";
import agregar from "./agregar";
export default {
 name: "menu",
 data() {
   return {
     menu:[],
     modal_agregar: false,
     nombre: "",
     precio: 0
   };
 },
 components: {
   "c-agregar": agregar
 },
 methods: {
   agregar(nombre, precio) {
     this.modal_agregar = true;
     this.nombre = nombre;
     this.precio = precio;
   },
   getPlatillos: function() {
       axios
       .get("/api/platillos")
       .then(response => {
           this.menu=response.data;
       })
       .catch(function(error) {
           console.log("Error: " + error);
       });
   },
 },
 created(){
   this.getPlatillos();
 }
};
</script>
<style scoped>
.stlName {
 font-size: 28px;
 text-shadow: 1px 1px 0px #000000;
}
</style>