<template>
  <v-data-table
    :headers="headers"
    :items="productos"
    sort-by="calories"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>Inventario</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
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
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.nombre" label="Producto"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.cantidad" label="Cantidad"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancelar</v-btn>
              <v-btn color="blue darken-1" text @click="save">Guardar</v-btn>
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

import axios from "axios";
  export default {
      name: "DataInventario",
    data: () => ({
    
      productos: [],
      dialog: false,
      headers: [
        {
          text: 'Producto',
          align: 'left',
          sortable: true,
          value: 'id',
        },
        { text: 'Nombre', value: 'nombre' },
        { text: 'Cantidad', value: 'cantidad' },
        { text: 'Actions', value: 'action', sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        nombre: '',
        cantidad: 0
      },
      defaultItem: {
        nombre: '',
        cantidad: 0
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Nuevo producto' : 'Editar'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },
    mounted: {
        //getProducts();
    },

    created () {
        this.getProducts();
      this.initialize();
    },

    methods: {

    getProducts: function() {
        axios
        .get("/api/inventario")
        .then(response => {
            this.productos=response.data;
        })
        .catch(function(error) {
            console.log("Error: " + error);
        });
    },
    updateProducts() {
        axios({
            method: "put",
            url:
            ("/api/inventario/"+this.editedItem.id),
            data: {
                nombre: this.editedItem.nombre,
                cantidad: this.editedItem.cantidad
            }
        })
        .then(function(response){
            console.log(response);
        })
        .catch(function(error) {
            console.log("Error" + error);
        })
    },
    createProducts(){
        axios({
            method: "post",
            url:
            ("/api/inventario"),
            data: {
                nombre: this.editedItem.nombre,
                cantidad: this.editedItem.cantidad
            }
        })
        .then(function(response){
            console.log(response);
        })
        .catch(function(error) {
            console.log("Error" + error);
        })
    },
      initialize () {
        this.desserts = [
          
        ]
      },

      editItem (item) {
        this.editedIndex = this.productos.indexOf(item)
        this.editedItem = Object.assign({}, item)
        console.log(this.editedItem.id);
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.desserts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
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
            console.log("Nuewo prod")
            this.createProducts();

        } else {
          this.updateProducts();
          console.log("actualizar")

        }
        this.close()
      },
    },
  }
</script>