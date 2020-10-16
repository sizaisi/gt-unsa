<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Procedimientos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Editar Procedimiento</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="actualizar">
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="procedimiento.nombre"
              placeholder="Nombre del procedimiento"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.nombre" class="text-danger">
              {{ $page.errors.nombre[0] }}
            </div>
          </b-form-group>
          <b-button type="submit" variant="success">Actualizar</b-button>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  name: "procedimientos.edit",
  props: ["procedimiento"],
  components: {
    AppLayout,
  },
  data() {
    return {};
  },
  methods: {
    actualizar() {
      this.$inertia.put(`/procedimientos/${this.procedimiento.id}`, this.procedimiento);
    },
  },
};
</script>
