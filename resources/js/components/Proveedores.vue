<template>
  <v-layout>
    <v-flex>
      <p>{{ itemId }}</p>
      <p>{{ proveedores }}</p>
      <v-container class="text-center display-1">
        Proveedores
        <hr style="border-color:orange; width:90px; margin-left:auto; margin-right:auto; border-bottom-width:3px;"/>
      </v-container>
      <!-- Dialog agregar provedor-->
      <v-row justify="center">
        <v-dialog v-model="addEditDialog" max-width="600px">
          <v-card>
            <v-card-title>
              <span v-if="create==true" class="headline">Agregar provedor</span>
              <span v-if="create==false" class="headline">Editar provedor</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-form v-model="isFormValid">
                  <v-row>
                    <v-col cols="12" sm="6" md="6" lg="6">
                      <v-text-field
                        v-model="selectedItem.nombre"
                        clearable
                        :rules="[rules.required]"
                        label="Nombre"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6" lg="6">
                      <v-text-field
                        v-model="selectedItem.descripcion"
                        clearable
                        :rules="[rules.required]"
                        label="Descripción"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6" lg="6">
                      <v-text-field
                        v-model="selectedItem.telefono"
                        clearable
                        type="text"
                        v-mask="mask"
                        :rules="[rules.required,rules.counter]"
                        label="Teléfono"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6" lg="6">
                      <v-text-field
                        v-model="selectedItem.email"
                        clearable
                        :rules="[rules.required, rules.email]"
                        label="E-mail"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-form>
              </v-container>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                v-if="create==true"
                color="primary"
                :disabled="!isFormValid"
                text
                @click="addProv()"
              >Aceptar</v-btn>
              <v-btn
                v-if="create==false"
                color="primary"
                :disabled="!isFormValid"
                text
                @click="editProv()"
              >Aceptar</v-btn>
              <v-btn text @click="addEditDialog = false">Cancelar</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>

      <!-- Dialog borrar tarea-->
      <v-dialog v-model="deleteDialog" width="500">
        <v-card>
          <v-card-title class="headline grey lighten-2" primary-title>Advertencia</v-card-title>
          <v-card-text>¿Esta seguro de que desea borrar el provedor?</v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" text @click="deleteDialog = false">Aceptar</v-btn>
            <v-btn text @click="deleteDialog = false">Cancelar</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <!-- Boton agregar provedor -->
      <v-container class="text-right">
        <v-btn @click="dialogAdd()" color="primary">
          <v-icon left>mdi-plus</v-icon>Agregar Provedor
        </v-btn>
      </v-container>

      <!-- Cards de proveedores -->
      <v-container>
        <v-row>
          <v-col v-for="(item,index,i) in proveedores" :key="i" cols="12" sm="12" md="6" lg="3">
            <v-card class="mx-auto" max-width="500">
              <!--<v-img :src="item.foto"></v-img>-->
              <v-card-title>{{item.nombre}}</v-card-title>

              <v-card-text class="text--primary">
                <div>{{item.descripcion}}</div>
                <div>{{item.telefono}}</div>
                <div>{{item.email}}</div>
              </v-card-text>
              <br />

              <v-card-actions>
                <v-btn color="primary" @click="dialogEdit(item);itemId=item.id" text>Editar</v-btn>

                <v-btn color="error" @click="dialogDelete()" text>Eliminar</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-flex>
  </v-layout>
</template>

<script>
import axios from "axios";
import { mask } from "vue-the-mask";
export default {
  name: "proveedores",
  directives: {
    mask
  },
  data() {
    return {
      itemId:0,
      proveedores:[],
      mask: "##########",
      rules: {
        required: value => !!value || "Campo requerido.",
        counter: value => value.length == 10 || "Numero de telefono incorrecto",
        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value) || "E-mail invalido.";
        }
      },
      selectedItem: {
        nombre: "",
        descripcion: "",
        telefono: "",
        email: ""
      },
      isFormValid: false,
      create: true,
      addEditDialog: false,
      deleteDialog: false,
    };
  },
  mounted(){
    this.initialize();
  },
  methods: {
    initialize() {
      axios
        .get("/api/proveedores")
        .then(response => (this.proveedores = response["data"]));
    },

    dialogAdd() {
      this.create = true;
      this.addEditDialog = true;
      this.selectedItem.nombre = "";
      this.selectedItem.descripcion = "";
      this.selectedItem.telefono = "";
      this.selectedItem.email = "";
    },
    dialogEdit(item) {
      this.create = false;
      this.addEditDialog = true;
      this.selectedItem.nombre = item.nombre;
      this.selectedItem.descripcion = item.descripcion;
      this.selectedItem.telefono = item.telefono;
      this.selectedItem.email = item.email;
    },
    dialogDelete() {
      this.deleteDialog = true;
    },
    addProv() {
      axios.post("/api/proveedores", {
        nombre: this.selectedItem.nombre,
        descripcion: this.selectedItem.descripcion,
        telefono: this.selectedItem.telefono,
        email: this.selectedItem.email
      });
      this.addEditDialog = false;
    },
    editProv() {

      this.addEditDialog = false;
    },
    deleteProv() {}
  }
};
</script>