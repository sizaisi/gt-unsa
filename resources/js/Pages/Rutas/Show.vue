<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados-Modalidades</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Grado-Modalidad</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Tipo:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="gradomodalidad.tipo"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Grado:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="gradomodalidad.idgrado"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-4" label="Modalidad:" label-for="input-4">
            <b-form-input
              id="input-4"
              v-model="gradomodalidad.idmodalidad"
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
  name: "gradosmodalidades.show",
  props: ["gradomodalidad"],
  components: {
    AppLayout,
  },
};
</script>
