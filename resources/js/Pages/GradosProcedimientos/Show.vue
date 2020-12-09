<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados-Procedimientos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Grado-Procedimientos</h3>
      </div>
      <div class="card-body">
        <b-form>
          <b-form-group id="input-group-2" label="Modalidad:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="gradoprocedimiento.idgradomodalidad"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="PRocedimiento:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="gradoprocedimiento.idprocedimiento"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-4" label="Rol:" label-for="input-4">
            <b-form-input
              id="input-4"
              v-model="gradoprocedimiento.idrol"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-5" label="Tipo de Rol:" label-for="input-5">
            <b-form-input
              id="input-5"
              v-model="gradoprocedimiento.tipo_rol"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-6" label="Url formulario:" label-for="input-6">
            <b-form-input
              id="input-6"
              v-model="gradoprocedimiento.url_formulario"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-7" label="Orden:" label-for="input-7">
            <b-form-input
              id="input-7"
              v-model="gradoprocedimiento.orden"
              readonly
            ></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-7" label="Descripción:" label-for="input-7">
            <b-form-input
              id="input-7"
              v-model="gradoprocedimiento.descripcion"
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
  name: "gradosprocedimientos.show",
  props: ["gradoprocedimiento"],
  components: {
    AppLayout,
  },
};
</script>
