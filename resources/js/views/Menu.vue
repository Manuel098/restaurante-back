<template>
    <v-container class="stlAll">
        <v-flex>

            <div v-for="tipos in menu" :key="tipos">
                <p
                class="display-1 "
                >{{tipos.nombre}}</p>
                <hr style="margin-left: 1%; margin-right: 1%;">
                <br>
                <v-container class="row">
                    <div v-for="comida in tipos.datos" :key="comida" class="pa-2">
                        <v-card
                        max-width="350px"
                        height="300px"
                        @click="agregar(comida.nombre,comida.precio)"
                        >
                            <v-img
                            class="white--text align-end"
                            height="200px"
                            :src="comida.imagen"
                            :alt="comida.alt"
                            >
                                <v-card-title class="stlName">{{comida.nombre}}</v-card-title>
                            </v-img>
                                <v-card-subtitle
                                class="headline"
                                >${{comida.precio}}</v-card-subtitle>
                                <v-card-text>{{comida.descripcion}}</v-card-text>
                        </v-card>
                    </div>
                </v-container>
            </div>    
        </v-flex>
        <div>
            <c-agregar 
            :titulo="nombre"
            :precio="precio"
            :dialog="modal_agregar"
            ></c-agregar>
        </div>
    </v-container>
</template>

<script>
import agregar from '../components/agregar'
export default {
    name: 'menu',
    data() {
        return {
            menu:[
                {nombre:"Mexicana",datos:[
                    {nombre:"Tacos",precio:50,descripcion:"Tacos al pastor con piña",imagen:"https://www.seriouseats.com/recipes/images/2013/04/20130427-tacos-al-pastor-new-01.jpg"},
                    {nombre:"Enchiladas",precio:70,descripcion:"Tortillas de maiz rellenas de queso y bañadas en salsa dulce",imagen:"https://www.simplyrecipes.com/wp-content/uploads/2006/04/red-chili-chicken-enchiladas-horiz-b-1700.jpg"},
                ]},
                {nombre:"Comida chilanga",datos:[
                    {nombre:"Quesadillas sin queso",precio:35,descripcion:"Platillo tradicional chilango",imagen:"https://www.carlosandcharlies.com/wp-content/uploads/2019/07/IMG_3301-1.jpg"},
                    {nombre:"Guajolota",precio:20,descripcion:"Tamal dentro de un bolillo",imagen:"https://upload.wikimedia.org/wikipedia/commons/2/2c/Guajolota.jpg"},
                    {nombre:"Bolillo al cuadrado",precio:10,descripcion:"Bolillo dentro de un bolillo",imagen:"https://foodandtravel.mx/wp-content/uploads/2017/08/bolillobrotchen.jpg"},
                ]},
                {nombre:"Postres",datos:[
                    {nombre:"Flan",precio:50,descripcion:"Flan de leche con caramelo",imagen:"https://www.tasteofhome.com/wp-content/uploads/2017/10/Creamy-Caramel-Flan_exps2197_GPW2337930A12_09_2bC_RMS-1.jpg"}
                ]},
                {nombre:"Bebidas",datos:[
                    {nombre:"Cafe",precio:30,descripcion:"Cafe tipo americano",imagen:"https://www.elfinanciero.com.mx/uploads/2018/04/09/ce840aa9581523317353_standard_desktop_medium_retina.png"},
                    {nombre:"Long island",precio:50,descripcion:"Mezcla de licores con sabor tropical",imagen:"https://food.fnr.sndimg.com/content/dam/images/food/fullset/2011/4/25/0/CCWM_Long-Island-Ice-Tea_s3x4.jpg.rend.hgtvcom.826.620.suffix/1384263309789.jpeg"},
                    {nombre:"Agua mineral",precio:50,descripcion:"Agua mineralizada",imagen:"https://cadenaser00.epimg.net/ser/imagenes/2015/11/30/sociedad/1448885562_761820_1448885853_noticia_normal.jpg"}
                ]}
            ],
            modal_agregar:false,
            nombre:"",
            precio:0,
        }
    },
    components:{
        'c-agregar':agregar
    },
    methods:{
        agregar(nombre,precio){
            this.modal_agregar=true;
            this.nombre=nombre;
            this.precio=precio;
        }
    }
}
</script>
<style scoped>
    .stlName{
        font-size: 28px;
        text-shadow: 1px 1px 0px #000000;
    }
</style>