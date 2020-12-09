<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Procedimientos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Procedimiento</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="procedimiento.nombre"
              placeholder="Nombre del Procedimiento"
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
  name: "procedimientos.show",
  props: ["procedimiento"],
  components: {
    AppLayout,
  },
};
</script>
