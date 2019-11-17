<template>
    <v-container>
        <v-flex class="text-center display-1">
            Cuenta
        </v-flex>
        <hr style="border-color:orange; width:90px; margin-left:auto; margin-right:auto; border-bottom-width:3px;"/>
        <br>
        <v-flex>
            <v-data-table
            :headers="headers"
            :items="cuenta"
            :sort-by="producto"
            :sort-desc="true"
            disable-pagination
            >
            <template v-slot:item.total="{ item }">
                <p>{{precio(item.cantidad,item.precio)}}</p>
            </template>
            </v-data-table>
            <v-flex>
                <br>
                <v-flex row>
                    <v-flex><p>Subtotal</p></v-flex>
                    <v-flex class="justify-end text-end">{{subtotal()}}</v-flex>
                </v-flex>
                <hr>
                <v-flex row>
                    <v-flex><p>Descuentos</p></v-flex>
                    <v-flex class="justify-end text-end">0</v-flex>
                </v-flex>
                <hr>
                <v-flex row>
                    <v-flex><p>Total</p></v-flex>
                    <v-flex class="justify-end text-end">{{totalFinal()}}</v-flex>
                </v-flex>
            </v-flex>
        </v-flex>
        <br>
        <v-flex row>
            <v-flex class="">
                <v-btn
                block
                color="success" 
                rounded
                dark 
                large 
                bottom
                @click="terminar()"
                >Terminar</v-btn>
            </v-flex>
        </v-flex>
    </v-container>
</template>
<script>
import jsPDF from "jspdf"
export default {
    name: "generar cuenta",
    data(){
        return{
            headers:[
                {text:"Producto",align:"left",value:"producto"},
                {text:"Precio Unitario",sortable:false,value:"precio"},
                {text:"Cantidad",sortable:false,value:"cantidad"},
                {text:"Precio",sortable:false,value:"total"}
            ],
            cuenta:[
                {producto:"Flan",precio:30,cantidad:1},
                {producto:"Tacos",precio:60,cantidad:2},
                {producto:"Agua",precio:12,cantidad:3},
                {producto:"Pastel",precio:25,cantidad:5}
            ]
        }
    },
    methods:{
        precio(num1,num2){
            var total=(num1*num2);
            return total
        },
        subtotal(){
            window.subtotal=0;
            for(var i=0;i<this.cuenta.length;i++){
                subtotal=subtotal+(this.cuenta[i].precio*this.cuenta[i].cantidad);
            }
            return subtotal;
        },
        totalFinal(){
            var total=(window.subtotal-0);
            return total;
        },
        terminar(){
            var doc = new jsPDF();
            
            //var img = new Image();
            //img.src = 'logo.jpeg';
            //doc.addImage(img, 'jpeg', 20, 20,185,120);

            var orden=20;
            doc.text(20,orden,"Durango,Dgo")
            var hoy=new Date();
            var fecha=String(hoy.getDate()+"/"+(hoy.getMonth()+1)+"/"+hoy.getFullYear());
            var hora=String(hoy.getHours()+":"+hoy.getMinutes());
            doc.text(100,orden,hora)
            doc.text(120,orden,fecha)
            orden=orden+10;
            doc.text(33,orden,"Calle Falsa #123 Col. Groove Street 34000")
            doc.setLineWidth(.5);
            var subtotal=0;
            orden=orden+3;
            doc.line(20, orden, 150, orden);
            var orden=orden+9;
            for(var i=0;i<this.cuenta.length;i++){
                doc.text(20,orden,this.cuenta[i].producto)
                var cantidad=String(this.cuenta[i].cantidad);
                doc.text(125,orden,"x"+cantidad)
                var precio=String(this.cuenta[i].precio);
                doc.text(110,orden,precio)
                var productoTotal=((this.cuenta[i].cantidad*this.cuenta[i].precio));
                var prodTotal=String(productoTotal);
                doc.text(140,orden,prodTotal)
                orden=orden+8;
                subtotal=subtotal+productoTotal;
            }
            orden=orden+40;
            var sub=String((subtotal*.84))
            doc.text(20,orden,"Subtotal")
            doc.text(130,orden,sub)
            orden=orden+8;
            doc.text(20,orden,"IVA")
            var iva=String(subtotal*.16)
            doc.text(130,orden,iva)
            orden=orden+8;
            doc.text(20,orden,"Propina")
            var propina=30;
            var prop=String(propina);
            doc.text(130,orden,prop)
            orden=orden+3;
            doc.line(20, orden, 150, orden);
            orden=orden+7;
            doc.text(20,orden,"Total")
            var total=String(subtotal+propina);
            doc.text(130,orden,total)
            orden=orden+8;
            doc.text(20, orden,"Gracias por su compra")
            doc.save("ticket.pdf");
        }
    }
}
</script>