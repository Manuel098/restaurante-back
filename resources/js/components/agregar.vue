<template>
    <div class="text-center">
        <v-dialog
        v-model="dialog"
        width="400"
        persistent
        >
            <v-card>
                <v-card-title
                class="center light-green accent-2"
                primary-title
                >
                {{titulo}}
                </v-card-title>

                <v-card-text class="text-center title">
                Cantidad:
                <div xs2>
                    <v-btn class="mx-2" fab dark small color="red" @click="restar()">
                        <v-icon dark>mdi-minus</v-icon>
                    </v-btn>
                        <input type="text" v-model="cantidad" class="text-center headline col-3">
                    <v-btn class="mx-2" fab dark small color="green">
                        <v-icon dark @click="cantidad += 1">mdi-plus</v-icon>
                    </v-btn>
                </div>
                </v-card-text>
                <v-divider></v-divider>

                <v-card-actions center>
                    <div class="flex-grow-1"></div>
                    <v-btn
                        class="text-left"
                        color="red"
                        text
                        @click="cancelar()"
                    >
                        Cancelar
                    </v-btn>
                    <spacer/>
                    <v-btn
                        color="green"
                        text
                        @click="aceptar()"
                    >
                        Aceptar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
  export default {
    props:["titulo","precio","dialog"],
    data () {
      return {
        cantidad:1
      }
    },
    methods:{
        aceptar(){
            var total=(this.cantidad*this.precio);
            alert('Producto ('+this.titulo+') \n Precio total: '+total);
            this.cantidad=1;
            this.$parent.modal_agregar=false;
        },
        cancelar(){
            this.cantidad=1;
            this.$parent.modal_agregar=false;
        },
        restar(){
            if(this.cantidad>1){
                this.cantidad -= 1;
            }
        }
    }
  }
</script>