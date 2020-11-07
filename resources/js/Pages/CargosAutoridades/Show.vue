<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Cargos-Autoridades</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Cargo-Autoridad</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Cargo:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="cargoautoridad.idcargo"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Autoridad:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="cargoautoridad.idautoridad"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-4" label="Fecha de Inicio:" label-for="input-4">
            <b-form-input
              id="input-4"
              v-model="cargoautoridad.fecha_inicio"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-5" label="Fecha de Fin:" label-for="input-5">
            <b-form-input
              id="input-5"
              v-model="cargoautoridad.fecha_fin"
              readonly
            ></b-form-input>
          </b-form-group>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  name: "cargosautoridades.show",
  props: ["cargoautoridad"],
  components: {
    AppLayout,
  },
};
</script>
