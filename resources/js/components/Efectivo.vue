<template>
    <v-container>
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
            :sort-by="fecha"
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
            headers:[
                {text:"Concepto",align:"left",value:"concepto"},
                {text:"Fecha",value:"fecha"},
                {text:"Hora",value:"hora"},
                {text:"Cantidad",value:"cantidad"}
            ],
            datos:[
                {concepto:"Compra de frutas",fecha:"12-12-2019",hora:"14:02",cantidad:-1000},
                {concepto:"Venta",fecha:"",hora:"",cantidad:3500},
                {concepto:"Venta",fecha:"",hora:"",cantidad:500},
                {concepto:"Pago de salario",fecha:"",hora:"",cantidad:-1000},
                {concepto:"Gastos",fecha:"", hora:"", cantidad:-5000}
            ]

        }
    },
    methods:{
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