<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Colaciones</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nueva Colación</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Fecha de la colación:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="colacion.fecha"
              placeholder="Fecha de la colación"
              autocomplete="off"
              type="date"
            ></b-form-input>
            <div v-if="$page.errors.fecha" class="text-danger">
              {{ $page.errors.fecha[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Hora de Inicio:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="colacion.horainicio"
              placeholder="Hora de Inicio de la Colación"
              autocomplete="off"
              type="time"
            ></b-form-input>
            <div v-if="$page.errors.horainicio" class="text-danger">
              {{ $page.errors.horainicio[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Hora de Fin:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="colacion.horafin"
              placeholder="Hora de Fin de la Colación"
              autocomplete="off"
              type="time"
            ></b-form-input>
            <div v-if="$page.errors.horafin" class="text-danger">
              {{ $page.errors.horafin[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Maxima capacidad de colación:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="colacion.maximo"
              placeholder="Maxima capacidad de colación"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.maximo" class="text-danger">
              {{ $page.errors.maximo[0] }}
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
  name: "colaciones.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      colacion: {
        fecha: "",
        horainicio: "",
        horafin: "",
        cantidad: "",
        maximo: "",
      },
    };
  },
  methods: {
    registrar() {
      this.$inertia.post(`${this.api_url}/colaciones`, this.colacion);
    },
  },
};
</script>