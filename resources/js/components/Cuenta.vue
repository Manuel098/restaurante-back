<template>
  <v-container>
    <v-flex class="text-center display-1">Cuenta</v-flex>
    <hr
      style="border-color:orange; width:90px; margin-left:auto; margin-right:auto; border-bottom-width:3px;"
    />
    <br />
      <v-container fluid grid-list-xl>
        <v-layout wrap align-center>
        <v-flex xs12 sm3 d-flex>
            <v-select
            :items="mesas"
            v-model="mesa_id"
            @change="getPlatilloMesaById"
            item-value="id"
            item-text="number"
            ></v-select>
        </v-flex>
        </v-layout>
    </v-container>
    <v-flex>
      <v-data-table
        :headers="headers"
        :items="cuenta"
        sort-by="producto"
        :sort-desc="true"
        disable-pagination
      >
        <template v-slot:item.total="{ item }">
          <p>{{precio(item.precio)}}</p>
        </template>
      </v-data-table>
      <v-flex>
        <br />
        <v-flex row>
          <v-flex>
            <p>Subtotal</p>
          </v-flex>
          <v-flex class="justify-end text-end">{{subtotal()}}</v-flex>
        </v-flex>
        <hr />
        <v-flex row>
          <v-flex>
            <p>Descuentos</p>
          </v-flex>
          <v-flex class="justify-end text-end">0</v-flex>
        </v-flex>
        <hr />
        <v-flex row>
          <v-flex>
            <p>Subotal (Sin IVA)</p>
          </v-flex>
          <v-flex class="justify-end text-end">{{totalFinal()}}</v-flex>
        </v-flex>
      </v-flex>
    </v-flex>
    <br />
    <v-flex row>
      <v-flex class>
        <v-btn block color="success" rounded dark large bottom @click="terminar()">Terminar</v-btn>
      </v-flex>
    </v-flex>
  </v-container>
</template>
<script>
import jsPDF from "jspdf";
export default {
  name: "generar cuenta",
  data() {
    return {
      mesa_id:[],
      mesas:[],
      cuenta:[],
      cuentaM:[],
      cuentaM1:[],
      btnColor:[{color:"success"},{color:""},{color:""},{color:""},{color:""},{color:""}],
      headers: [
        { text: "Producto", align: "left", value: "nombre" },
        { text: "Precio", sortable: false, value: "precio" },
        { text: "Tipo", sortable: false, value: "tipo" },
        { text: "Fehca", sortable: false, value: "created_at" }
      ],
      cuenta: [
      ],
      cuentaA:[],
      producto:[],
    };
  },
  mounted(){
    this.initialize();
    this.getMesas();
  },
  methods: {
    initialize() {
      axios
      .get(
        "/api/platillomesa"
        )
        .then(response =>(
          this.cuentaM1 = response["data"])
          );
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
    getPlatilloMesaById: function() {
      axios
        .get("/api/platillomesa/"+ this.mesa_id)
        .then(response => {
          //this.cuenta = response.data;
           response.data.forEach(item => {
            this.cuenta.push(item.info_platillo[0]);
          });
          console.log(this.cuenta);
        })
        .catch(function(error) {
          console.log("Error: " + error);
        });
    },
    precio(num1) {
      var total = num1 ;
      return total;
    },
    subtotal() {
      window.subtotal = 0;
      for (var i = 0; i < this.cuenta.length; i++) {
        subtotal = subtotal + this.cuenta[i].precio;
      }
      return subtotal;
    },
    totalFinal() {
      var total = window.subtotal - 0;
      return total;
    },
    terminar() {
      var doc = new jsPDF();

      //var img = new Image();
      //img.src = 'logo.jpeg';
      //doc.addImage(img, 'jpeg', 20, 20,185,120);

      var orden = 20;
      doc.text(20, orden, "Durango,Dgo");
      var hoy = new Date();
      var fecha = String(
        hoy.getDate() + "/" + (hoy.getMonth() + 1) + "/" + hoy.getFullYear()
      );
      var hora = String(hoy.getHours() + ":" + hoy.getMinutes());
      doc.text(100, orden, hora);
      doc.text(120, orden, fecha);
      orden = orden + 10;
      doc.text(33, orden, "Calle Falsa #123 Col. Groove Street 34000");
      doc.setLineWidth(0.5);
      var subtotal = 0;
      orden = orden + 3;
      doc.line(20, orden, 150, orden);
      var orden = orden + 9;
      for (var i = 0; i < this.cuenta.length; i++) {
        doc.text(20, orden, this.cuenta[i].nombre);
        //var cantidad = String(this.cuenta[i].cantidad);
        var cantidad ="1";
        //doc.text(125, orden, "x");
        var precio = String(this.cuenta[i].precio);
        doc.text(110, orden, precio);
        var productoTotal = this.cuenta[i].precio;
        var prodTotal = String(productoTotal);
        doc.text(140, orden, prodTotal);
        orden = orden + 8;
        subtotal = subtotal + productoTotal;
      }
      orden = orden + 40;
      var sub = String(subtotal * 0.84);
      doc.text(20, orden, "Subtotal");
      doc.text(130, orden, sub);
      orden = orden + 8;
      doc.text(20, orden, "IVA");
      var iva = String(subtotal * 0.16);
      doc.text(130, orden, iva);
      orden = orden + 8;
      doc.text(20, orden, "Propina");
      var propina = 30;
      var prop = String(propina);
      doc.text(130, orden, prop);
      orden = orden + 3;
      doc.line(20, orden, 150, orden);
      orden = orden + 7;
      doc.text(20, orden, "Total");
      var total = String(subtotal + propina);
      doc.text(130, orden, total);
      orden = orden + 8;
      doc.text(20, orden, "Gracias por su compra");
      doc.save("ticket.pdf");
    }
  }
};
</script>