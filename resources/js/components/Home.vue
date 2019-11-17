<template>
  <div class="back">
    <v-app id="inspire">
      <v-container fluid>
        <section class="CardContainer" align="center">
          <v-row>
            <!-- Menu -->
            <v-col cols="12" sm="6" md="6" lg="4">
              <router-link to="/menu" exact>
                <v-card>
                  <v-img
                    class="white--text"
                    height="180px"
                    src="https://cdn.pixabay.com/photo/2014/10/19/20/59/hamburger-494706_960_720.jpg"
                  />
                  <v-card-text>
                    <span class="title">Menú</span>
                    <br />
                  </v-card-text>
                </v-card>
              </router-link>
            </v-col>

            <!-- Generar cuenta -->
            <v-col cols="12" sm="6" md="6" lg="4">
              <v-card>
                <v-img
                  class="white--text"
                  height="180px"
                  src="https://cdn.pixabay.com/photo/2016/07/15/21/07/credit-card-1520400_960_720.jpg"
                />
                <v-card-text>
                  <span class="title">Generar cuenta</span>
                  <br />
                </v-card-text>
              </v-card>
            </v-col>

            <!-- Asignar mesero -->
            <v-col cols="12" sm="6" md="6" lg="4">
              <v-card>
                <v-img
                  class="white--text"
                  height="180px"
                  src="https://cdn.pixabay.com/photo/2017/06/06/09/22/waitress-2376728_960_720.jpg"
                />
                <v-card-text>
                  <span class="title">Asignar mesero</span>
                  <br />
                </v-card-text>
              </v-card>
            </v-col>

            <!-- Proveedores -->
            <v-col cols="12" sm="6" md="6" lg="4">
              <v-card>
                <v-img
                  class="white--text"
                  height="180px"
                  src="https://cdn.pixabay.com/photo/2017/05/23/22/36/vegetables-2338824_960_720.jpg"
                />
                <v-card-text>
                  <span class="title">Proveedores</span>
                  <br />
                </v-card-text>
              </v-card>
            </v-col>

            <!-- Stock -->
            <v-col cols="12" sm="6" md="6" lg="4">
              <router-link to="/inventario" exact>
              <v-card>
                <v-img
                  class="white--text"
                  height="180px"
                  src="https://cdn.pixabay.com/photo/2018/02/24/07/48/food-3177460_960_720.jpg"
                />
                <v-card-text>
                  <span class="title">Stock</span>
                  <br />
                </v-card-text>
              </v-card>
              </router-link>
            </v-col>

            <!-- Efectivo total -->
            <v-col cols="12" sm="6" md="6" lg="4">
              <v-card>
                <v-img
                  class="white--text"
                  height="180px"
                  src="https://cdn.pixabay.com/photo/2014/10/23/10/10/dollar-499481_960_720.jpg"
                />
                <v-card-text>
                  <span class="title">Efectivo total</span>
                  <br />
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
          <!--<router-link to="/menu" exact>
              <div>
                <CardIn
                  title="Menu"
                  source="https://cdn.pixabay.com/photo/2014/10/19/20/59/hamburger-494706_960_720.jpg"
                />
              </div>
            </router-link>

            <div>
              <CardIn
                title="Generar cuenta"
                source="https://cdn.pixabay.com/photo/2016/07/15/21/07/credit-card-1520400_960_720.jpg"
              />
            </div>
            <div>
              <CardIn
                title="Asignar mesero"
                source="https://cdn.pixabay.com/photo/2017/06/06/09/22/waitress-2376728_960_720.jpg"
              />
            </div>
            <div>
              <CardIn
                title="Proveedores"
                source="https://cdn.pixabay.com/photo/2017/05/23/22/36/vegetables-2338824_960_720.jpg"
              />
            </div>
            <div>
              <CardIn
                title="Stock"
                source="https://cdn.pixabay.com/photo/2018/02/24/07/48/food-3177460_960_720.jpg"
              />
            </div>
            <div>
              <CardIn
                title="Efectivo total"
                source="https://cdn.pixabay.com/photo/2014/10/23/10/10/dollar-499481_960_720.jpg"
              />
          </div>-->
        </section>
      </v-container>
    </v-app>
  </div>
</template>

<script>
//import CardIn from "./CardIndex";

export default {
  name: "home",

  data: function() {
    return {};
  },
  /*components: {
    CardIn
  },*/
  mounted() {},
  methods: {}
};
</script>

<style>
.back {
  background: url("./public/img/back.jpeg");
  background-size: cover;
}
#inspire {
  background: none;
}
/*.CardContainer div {
  display: inline-block;
  margin-right: 12px;
  margin-bottom: 12px;
}*/
</style>
