<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Cargos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Cargo</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Codigo:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="cargo.codigo"
              placeholder="Codigo"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Nombre:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="cargo.nombre"
              placeholder="Nombre"
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
  name: "cargos.show",
  props: ["cargo"],
  components: {
    AppLayout,
  },
};
</script>
