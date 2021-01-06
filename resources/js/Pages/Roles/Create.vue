<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Roles</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo Rol</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="rol.nombre"
              placeholder="Nombre de rol"
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
  name: "roles.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      rol: {
        nombre: "",
      },
    };
  },
  methods: {
    registrar() {
      this.$inertia.post(`${this.api_url}/roles`, this.rol);
    },
  },
};
</script>
