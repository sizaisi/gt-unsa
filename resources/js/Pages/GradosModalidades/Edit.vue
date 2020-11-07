<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados-Modalidades</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Editar Grado-Modalidad</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="actualizar">
          <b-form-group id="input-group-2" label="Tipo:" label-for="input-2">
            <b-form-select 
              v-model="gradomodalidad.tipo"
              :options="tipos"
              id="input-4"
            >
            </b-form-select>
            <div v-if="$page.errors.tipo" class="text-danger">
              {{ $page.errors.tipo[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Grado:" label-for="input-3">
            <b-form-select 
              v-model="gradomodalidad.idgrado"
              :options="select_grados"
              id="input-3"
            >
            </b-form-select>
            <div v-if="$page.errors.idgrado" class="text-danger">
              {{ $page.errors.idgrado[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-4" label="Modalidad:" label-for="input-4">
            <b-form-select 
              v-model="gradomodalidad.idmodalidad"
              :options="select_modalidades"
              id="input-4"
            >
            </b-form-select>
            <div v-if="$page.errors.idmodalidad" class="text-danger">
              {{ $page.errors.idmodalidad[0] }}
            </div>
          </b-form-group>
          <b-button type="submit" variant="success">Actualizar</b-button>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  name: "gradosmodalidades.edit",
  props: ["gradomodalidad"],
  components: {
    AppLayout,
  },
  data() {
    return {
      array_grados : [],
      select_grados: [],
      array_modalidades : [],
      select_modalidades: [],
      tipos: [
        { value: 'Interno', text: 'Interno' },
        { value: 'Externo', text: 'Externo' },
      ],
    };
  },
  created: function () {
    this.getAllGrados();
    this.getAllModalidades();
  },
  methods: {
    actualizar() {
      this.$inertia.put(`/gradosmodalidades/${this.gradomodalidad.id}`, this.gradomodalidad);
    },
    getAllGrados() {
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
    getAllModalidades() {
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
