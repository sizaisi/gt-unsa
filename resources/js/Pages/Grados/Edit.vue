<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados/Títulos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Editar Grado/Título</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="actualizar">
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="grado.nombre"
              placeholder="Nombre del Grado/Título"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.nombre" class="text-danger">
              {{ $page.errors.nombre[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Nive:" label-for="input-3">
            <b-form-select 
              v-model="grado.nive"
              :options="nives"
              id="input-4"
              placeholder="Codigo del Grado/Título"
            >
            </b-form-select>
            <div v-if="$page.errors.nive" class="text-danger">
              {{ $page.errors.nivel[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-4" label="Código:" label-for="input-4">
            <b-form-select 
              v-model="grado.codigo"
              :options="codigos"
              id="input-4"
              placeholder="Codigo del Grado/Título"
            >
            </b-form-select>
            <div v-if="$page.errors.codigo" class="text-danger">
              {{ $page.errors.codigo[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-5" label="prerequisito:" label-for="input-5">
            <b-form-select 
              v-model="grado.prerequisito"
              :options="select_grado_titulo"
              id="input-5"
              placeholder="Prerequisito del Grado/Título"
            >
            </b-form-select>
            <div v-if="$page.errors.prerequisito" class="text-danger">
              {{ $page.errors.prerequisito[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-6" label="Descripción:" label-for="input-6">
            <b-form-input
              id="input-6"
              v-model="grado.descripcion"
              placeholder="Descripción de Grado/Título"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.descripcion" class="text-danger">
              {{ $page.errors.descripcion[0] }}
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
  name: "grados.edit",
  props: ["grado"],
  components: {
    AppLayout,
  },
  data() {
    return {
      array_grado_titulo : [],
      select_grado_titulo: [],
      nives: [
          { value: 'W', text: 'W' },
          { value: 'X', text: 'X' },
          { value: 'Y', text: 'Y' },
          { value: 'Z', text: 'Z' },
      ],
      codigos: [
          { value: '1', text: '1' },
          { value: '2', text: '2' },
          { value: '3', text: '3' },
          { value: '4', text: '4' },
      ],
    };
  },
  created: function () {
    this.getAllGrados();
  },
  methods: {
    actualizar() {
      this.$inertia.put(`/grados/${this.grado.id}`, this.grado);
    },
    getAllGrados() {
      axios.get(`/getgrados`)
        .then(response => {
        console.log(response.data);
          this.array_grado_titulo = response.data;
          if (this.select_grado_titulo.length == 0) {
            this.select_grado_titulo.push({value: 0, text: 'Sin Pre-requisito'});
            for(var gt of this.array_grado_titulo){
              this.select_grado_titulo.push({value: gt.id, text: gt.nombre});
            }
          }       
      })
    },
  },
};
</script>
