<template>
  <v-data-table
    :headers="headers"
    :items="mesa_meseros"
    sort-by="calories"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>Meseros</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-container fluid grid-list-xl>
            <v-layout wrap align-center>
            <v-flex xs12 sm3 d-flex>
                <v-select
                :items="meseros"
                v-model="mesero_id"
                @change="getMesaMeseroById"
                item-value="id"
                item-text="nombre"
                ></v-select>
            </v-flex>
            </v-layout>
        </v-container>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">Nuevo producto</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="6" >
                    <!-- <v-text-field v-model="editedItem.name" label="Dessert name"></v-text-field> -->
                    <v-container fluid grid-list-xl>
                      <v-layout wrap align-center>
                      <v-flex xs12 sm3 d-flex>
                          <v-select
                          label="Mesero"
                          :items="meseros"
                          v-model="editedItem.mesero_id"
                          item-value="id"
                          item-text="nombre"
                          ></v-select>
                      </v-flex>
                      </v-layout>
                  </v-container>
                  </v-col>
                  <v-col v-if="formTitle=='New Item'" cols="6" >
                    <!-- <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field> -->
                     <v-container fluid grid-list-xl>
                      <v-layout wrap align-center>
                      <v-flex xs12 sm3 d-flex>
                          <v-select
                          label="Mesa#"
                          :items="mesas"
                          v-model="editedItem.mesa_id"
                          item-value="id"
                          item-text="number"
                          ></v-select>
                      </v-flex>
                      </v-layout>
                  </v-container>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancelar</v-btn>
              <v-btn color="blue darken-1" text @click="save">Gueardar</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.action="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        edit
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        delete
      </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
  </v-data-table>
</template>
<script>
  export default {
    data: () => ({
      dialog: false,
      headers: [
        {
          text: 'Mesero',
          align: 'left',
          sortable: false,
          value: 'mesero_id',
        },
        { text: 'N#_Mesa', value: 'mesa_id' },
        { text: 'Fecha', value: 'created_at' },
        { text: 'Actions', value: 'action', sortable: false },
      ],
      meseros: [],
      mesero_id:null,
      mesa_meseros:[],
      mesas:[],
      editedIndex: -1,
      editedItem: {
        mesero_id: '',
        mesa_id: 0,
      },
      defaultItem: {
        mesa_meseros: '',
        mesa_id: 0,
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      this.initialize()
      this.getMesaMesero();
      this.getMesas();
    },

    methods: {
      initialize () {
        this.meseros = []
      },
     getMesaMesero: function() {
      axios
        .get("/api/mesamesero")
        .then(response => {
          this.meseros = response.data;
        })
        .catch(function(error) {
          console.log("Error: " + error);
        });
    },
    getMesas: function() {
      axios
        .get("/api/mesas")
        .then(response => {
          this.mesas = response.data;
        })
        .catch(function(error) {
          console.log("Error: " + error);
        });
    },
    getMesaMeseroById: function() {
      axios
        .get("/api/mesamesero/"+ this.mesero_id)
        .then(response => {
          this.mesa_meseros = response.data;     
        })
        .catch(function(error) {
          console.log("Error: " + error);
        });
    },
    updateMesaMeseros() {
      axios({
        method: "put",
        url: "/api/mesamesero/" + this.editedItem.id,
        data: {
          mesa_id: this.editedItem.mesa_id
        }
      })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log("Error" + error);
        });
            axios
        .get("/api/mesamesero")
        .then(response => {
          this.meseros = response.data;
        })
        .catch(function(error) {
          console.log("Error: " + error);
        });
    },
    deleteMesaMesero(item) {
      //confirm("¿Esta seguro de que desea borrar este campo?") &&
      axios({
        method: "delete",
        url: "/api/mesamesero/" + this.editedItem.id
      })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log("Error" + error);
        });
      axios
        .get("/api/mesamesero")
        .then(response => {
          this.meseros = response.data;
        })
        .catch(function(error) {
          console.log("Error: " + error);
        });
    },
    createMesaMesero() {
      axios({
        method: "post",
        url: "/api/mesamesero",
        data: {
          mesero_id: this.editedItem.mesero_id,
          mesa_id: this.editedItem.mesa_id
        }
      })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log("Error" + error);
        });
    },
      editItem (item) {
        this.editedIndex = this.meseros.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.meseros.indexOf(item)
        confirm('Desea quitarle esta mesa a este mesero?') && this.meseros.splice(index, 1)
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

      save () {
        if (this.editedIndex == -1) {
        console.log("Nuewo prod");
        this.createMesaMesero();
      } else {
        this.updateMesaMeseros();
        console.log("actualizar");
      }
      this.close();
      },
    },
  }
</script>