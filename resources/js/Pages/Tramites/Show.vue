<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Trámites</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Trámite</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-1" label="Nombre:" label-for="input-1">
            <b-form-input
              id="input-1"
              v-model="tramite.nombre"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-2" label="Código:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="tramite.codigo"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group
            id="input-group-3"
            label="Componente:"
            label-for="input-3"
          >
            <b-form-input
              id="input-3"
              v-model="tramite.componente"
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
  name: "tramites.show",
  props: ["tramite"],
  components: {
    AppLayout,
  },
};
</script>
