<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Trámites</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo Trámite</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-1" label="Nombre:" label-for="input-1">
            <b-form-input
              id="input-1"
              v-model="tramite.nombre"
              placeholder="Nombre del trámite"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.nombre" class="text-danger">
              {{ $page.errors.nombre[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-2" label="Código:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="tramite.codigo"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.codigo" class="text-danger">
              {{ $page.errors.codigo[0] }}
            </div>
          </b-form-group>
          <b-form-group
            id="input-group-3"
            label="Componente:"
            label-for="input-3"
          >
            <b-form-input
              id="input-3"
              v-model="tramite.componente"
              placeholder="Nombre de componente"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.componente" class="text-danger">
              {{ $page.errors.componente[0] }}
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
  name: "tramites.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      tramite: {
        nombre: "",
        codigo: "",
        componente: "",
      },
    };
  },
  methods: {
    registrar() {
      this.$inertia.post(`${this.api_url}/tramites`, this.tramite);
    },
  },
};
</script>
