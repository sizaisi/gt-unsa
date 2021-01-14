<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Colaciones</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Colacion</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Fecha:" label-for="input-2">
              <b-form-input
              id="input-2"
              v-model="colacion.fecha"
              readonly
              ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Hora de Inicio:" label-for="input-3">
              <b-form-input
              id="input-3"
              v-model="colacion.horainicio"
              readonly
              ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Hora de Fin:" label-for="input-3">
              <b-form-input
              id="input-3"
              v-model="colacion.horafin"
              readonly
              ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Cantidad de colados:" label-for="input-3">
              <b-form-input
              id="input-3"
              v-model="colacion.cantidad"
              readonly
              ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Maxima capacidad de colaciÃ³n:" label-for="input-3">
              <b-form-input
              id="input-3"
              v-model="colacion.maximo"
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
  name: "colaciones.show",
  props: ["colacion"],
  components: {
    AppLayout,
  },
};
</script>