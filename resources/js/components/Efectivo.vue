<template>
    <v-container>
        <v-btn @click="getPlatillos()" >Click</v-btn>
        <v-flex class="text-center display-1">
            Efectivo Total
            <hr style="border-color:orange; width:210px; margin-left:auto; margin-right:auto; border-bottom-width:3px;"/>
        </v-flex>
        <br>
        <v-flex v-if="totalGlobal()>=0">
            <p class="text-center headline success--text">${{totalGlobal()}}</p>
        </v-flex>
        <v-flex v-else>
            <p class="text-center headline red--text">${{totalGlobal()}}</p>
        </v-flex>
        <br>
        <v-flex>
            <v-data-table
            :headers="headers"
            :items="datos"
            sort-by="mesa"
            >
            <template v-slot:item.cantidad="{ item }">
                <p v-if="item.cantidad>=0" class="success--text">{{item.cantidad}}</p>
                <p v-else class="red--text">{{item.cantidad}}</p>
            </template>
            </v-data-table>
        </v-flex>
    </v-container>
</template>
<script>
export default {
    data(){
        return{
            mesa1:0,mesa2:0,mesa3:0,mesa4:0,mesa5:0,mesa6:0,
            efectivo:[],
            headers:[
                {text:"Mesa",align:"left",value:"mesa"},
                {text:"Cantidad",value:"cantidad"}
            ],
            datos:[
                {mesa:"Mesa 1",cantidad:0},
                {mesa:"Mesa 2",cantidad:0},
                {mesa:"Mesa 3",cantidad:0},
                {mesa:"Mesa 4",cantidad:0},
                {mesa:"Mesa 5",cantidad:0},
                {mesa:"Mesa 6",cantidad:0}
            ]

        }
    },
    mounted(){
        this.initialize();
    },
    methods:{
        initialize() {
            axios
                .get("/api/platillomesa")
                .then(response => (this.efectivo = response["data"]));
        },
        getPlatillos(){
            this.datos[0].cantidad = 0;
            this.datos[1].cantidad = 0;
            this.datos[2].cantidad = 0;
            this.datos[3].cantidad = 0;
            this.datos[4].cantidad = 0;
            this.datos[5].cantidad = 0;
            for(var i=0;i<this.efectivo[0].platillos.length;i++){
                this.mesa1 = this.mesa1 + this.efectivo[0].platillos[i].info_platillo[0].precio;
            }
            for(var i=0;i<this.efectivo[1].platillos.length;i++){;
                this.mesa2 = this.mesa2 + this.efectivo[1].platillos[i].info_platillo[0].precio;
            }
            for(var i=0;i<this.efectivo[2].platillos.length;i++){
                this.mesa3 = this.mesa3 + this.efectivo[2].platillos[i].info_platillo[0].precio;
            }
            for(var i=0;i<this.efectivo[3].platillos.length;i++){
                this.mesa4 = this.mesa4 + this.efectivo[3].platillos[i].info_platillo[0].precio;
            }
            for(var i=0;i<this.efectivo[4].platillos.length;i++){
                this.mesa5 = this.mesa5 + this.efectivo[4].platillos[i].info_platillo[0].precio;
            }
            for(var i=0;i<this.efectivo[5].platillos.length;i++){
                this.mesa6 = this.mesa6 + this.efectivo[5].platillos[i].info_platillo[0].precio;
            }

            this.datos[0].cantidad = this.mesa1;
            this.datos[1].cantidad = this.mesa2;
            this.datos[2].cantidad = this.mesa3;
            this.datos[3].cantidad = this.mesa4;
            this.datos[4].cantidad = this.mesa5;
            this.datos[5].cantidad = this.mesa6;
        },
        totalGlobal(){
            var global=0;
            for(var i=0;i<this.datos.length;i++){
                global=(global+this.datos[i].cantidad);
            }
            return global;
        }
    }
}
</script>