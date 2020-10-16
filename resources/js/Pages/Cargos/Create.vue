<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Cargos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo Cargo</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Codigo:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="cargo.codigo"
              placeholder="Ingresar Codigo"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.codigo" class="text-danger">
              {{ $page.errors.codigo[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Nombre:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="cargo.nombre"
              placeholder="Ingrese Nombre"
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
  name: "cargos.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      cargo: {
        codigo: "",
        nombre: "",
      },
    };
  },
  methods: {
    registrar() {
      this.$inertia.post(`/cargos`, this.cargo);
    },
  },
};
</script>
