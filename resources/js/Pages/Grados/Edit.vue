<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados - Títulos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Editar Grado</h3>
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
          <b-form-group id="input-group-3" label="Nivel:" label-for="input-3">
            <b-form-select 
              v-model="grado.nive"
              :options="niveles"
              id="input-4"              
            >
              <template v-slot:first>
                <option :value="null" disabled>
                    -- Por favor seleccione una opción --
                </option>
              </template>
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
            >
              <template v-slot:first>
                <option :value="null" disabled>
                    -- Por favor seleccione una opción --
                </option>
              </template>
            </b-form-select>
            <div v-if="$page.errors.codigo" class="text-danger">
              {{ $page.errors.codigo[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-5" label="Pre-requisito:" label-for="input-5">
            <b-form-select 
              v-model="grado.prerequisito"
              :options="grados"
              id="input-5"              
            >
              <template v-slot:first>
                <option :value="null">
                    Sin Pre-requisito
                </option>
              </template>
            </b-form-select>            
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
  props: ["grado", "grados"],
  components: {
    AppLayout,
  },
  data() {
    return {    
      api_url: this.$root.api_url,  
      niveles: [
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
  methods: {
    actualizar() {
      this.$inertia.post(`${this.api_url}/grados/${this.grado.id}`, this.grado);
    }    
  },
};
</script>
