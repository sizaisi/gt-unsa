<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Autoridades</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Autoridad</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Codigo de la Universidad:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="universidad.cod_universidad"
              placeholder="cod_universidad"
              readonly
            ></b-form-input>
            <div v-if="$page.errors.cod_universidad" class="text-danger">
              {{ $page.errors.cod_universidad[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Razón Social:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="universidad.razon_social"
              placeholder="razón social"
              readonly
            ></b-form-input>
            <div v-if="$page.errors.razon_social" class="text-danger">
              {{ $page.errors.razon_social[0] }}
            </div>
          </b-form-group>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  name: "universidades.show",
  props: ["universidad"],
  components: {
    AppLayout,
  },
};
</script>
