<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Autoridades</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nueva Autoridad</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="autoridad.nombre"
              placeholder="Nombre de la autoridad"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.nombre" class="text-danger">
              {{ $page.errors.nombre[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Grado:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="autoridad.grado"
              placeholder="Grado de la autoridad"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.grado" class="text-danger">
              {{ $page.errors.grado[0] }}
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
  name: "autoridades.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      autoridad: {
        nombre: "",
        grado: "",
      },
    };
  },
  methods: {
    registrar() {
      this.$inertia.post(`${this.api_url}/autoridades`, this.autoridad);
    },
  },
};
</script>
