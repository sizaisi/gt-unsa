<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados/Títulos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Grado/Título</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="grado.nombre"
              placeholder="Nombre de Grado/Título"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Nive:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="grado.nive"
              placeholder="Nive de Grado/Título"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-4" label="Código:" label-for="input-4">
            <b-form-input
              id="input-4"
              v-model="grado.codigo"
              placeholder="Codigo de Grado/Título"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-5" label="Prerequisito:" label-for="input-5">
            <b-form-input
              id="input-5"
              v-model="grado.prerequisito"
              placeholder="Prerequisito de Grado/Título"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-6" label="Descripción:" label-for="input-6">
            <b-form-input
              id="input-6"
              v-model="grado.descripcion"
              placeholder="Descripción de Grado/Título"
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
  name: "grados.show",
  props: ["grado"],
  components: {
    AppLayout,
  },
};
</script>
