<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Programas de Estudio</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo Programa de Estudio</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="programa.nombre"
              placeholder="Nombre del programa"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.nombre" class="text-danger">
              {{ $page.errors.nombre[0] }}
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
  name: "programas.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      programa: {
        nombre: "",
      },
    };
  },
  methods: {
    registrar() {
      this.$inertia.post(`/programas`, this.programa);
    },
  },
};
</script>
