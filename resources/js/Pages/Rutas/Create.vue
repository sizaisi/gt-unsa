<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Rutas</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo Grado-Modalidad</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Grado Modalidad:" label-for="input-2">
            <b-form-select 
              v-model="ruta.idgradomodalidad"
              :options="tipos"
              id="input-4"
            >
            </b-form-select>
            <div v-if="$page.errors.idgradomodalidad" class="text-danger">
              {{ $page.errors.idgradomodalidad[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Grado:" label-for="input-3">
            <b-form-select 
              v-model="ruta.idgradoprocedimiento_origen"
              :options="select_grados"
              id="input-3"
            >
            </b-form-select>
            <div v-if="$page.errors.idgradoprocedimiento_origen" class="text-danger">
              {{ $page.errors.idgradoprocedimiento_origen[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-4" label="Modalidad:" label-for="input-4">
            <b-form-select 
              v-model="ruta.idgradoprocedimiento_destino"
              :options="select_modalidades"
              id="input-4"
            >
            </b-form-select>
            <div v-if="$page.errors.idgradoprocedimiento_destino" class="text-danger">
              {{ $page.errors.idgradoprocedimiento_destino[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-4" label="Modalidad:" label-for="input-4">
            <b-form-select 
              v-model="ruta.etiqueta"
              :options="select_modalidades"
              id="input-4"
            >
            </b-form-select>
            <div v-if="$page.errors.etiqueta" class="text-danger">
              {{ $page.errors.etiqueta[0] }}
            </div>
          </b-form-group>
          <b-button type="submit" variant="success">Registrar</b-button>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  name: "rutas.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      ruta: {
        idgradomodalidad: "",
        idgradoprocedimiento_origen: "",
        idgradoprocedimiento_destino: "",
        etiqueta: "",
      },
      array_gradomodalidad : [],
      select_gradomodalidad: [],
      array_gradoprocedimiento_origen : [],
      select_gradoprocedimiento_origen: [],
      array_gradoprocedimiento_destino : [],
      select_gradoprocedimiento_destino: [],
      etiquetas : ['iniciar', 
                  'enviar',
                  'derivar',
                  'cambiar', 
                  'aceptar',
                  'aprobar',
                  'devolver',                          
                  'denegar',
                  'observar',
                  'rechazar',                                                  
                  'finalizar'],
    };
  },
  created: function () {
    this.getAllGradosModalidades();
    this.getAllGradosProcedimientosOrigen();
    this.getAllGradosProcedimientosDestino();
  },
  methods: {
    registrar() {
      this.$inertia.post(`/rutas`, this.ruta);
    },
    getAllGradosModalidades() {
      axios.get(`/getgrados`)
        .then(response => {
        console.log(response.data);
          this.array_grados = response.data;
          if (this.select_grados.length == 0) {
            this.select_grados.push({value: 0, text: 'Sin Grado'});
            for(var gt of this.array_grados){
              this.select_grados.push({value: gt.id, text: gt.nombre});
            }
          }       
      })
    },
    getAllGradosProcedimientosOrigen() {
      axios.get(`/getgrados`)
        .then(response => {
        console.log(response.data);
          this.array_grados = response.data;
          if (this.select_grados.length == 0) {
            this.select_grados.push({value: 0, text: 'Sin Grado'});
            for(var gt of this.array_grados){
              this.select_grados.push({value: gt.id, text: gt.nombre});
            }
          }       
      })
    },
    getAllGradosProcedimientosDestino() {
      axios.get(`/getmodalidades`)
        .then(response => {
        console.log(response.data);
          this.array_modalidades = response.data;
          if (this.select_modalidades.length == 0) {
            this.select_modalidades.push({value: 0, text: 'Sin Modadlidad'});
            for(var gt of this.array_modalidades){
              this.select_modalidades.push({value: gt.id, text: gt.nombre});
            }
          }       
      })
    },
  },
};
</script>
