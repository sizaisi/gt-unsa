<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grados-Procedimientos</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo Grado-Procedimiento</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-2" label="Grado-Modalidad:" label-for="input-2">
            <b-form-select 
              v-model="gradoprocedimiento.idgradomodalidad"
              :options="select_modalidades"
              id="input-2"
            >
            </b-form-select>
            <div v-if="$page.errors.idgradomodalidad" class="text-danger">
              {{ $page.errors.idgradomodalidad[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-3" label="Procedimiento:" label-for="input-3">
            <b-form-select 
              v-model="gradoprocedimiento.idprocedimiento"
              :options="select_procedimientos"
              id="input-3"
            >
            </b-form-select>
            <div v-if="$page.errors.idprocedimiento" class="text-danger">
              {{ $page.errors.idprocedimiento[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-4" label="Rol:" label-for="input-4">
            <b-form-select 
              v-model="gradoprocedimiento.idrol"
              :options="select_roles"
              id="input-4"
            >
            </b-form-select>
            <div v-if="$page.errors.idrol" class="text-danger">
              {{ $page.errors.idrol[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-5" label="Tipo Rol:" label-for="input-5">
            <b-form-input
              id="input-5"
              v-model="gradoprocedimiento.tipo_rol"
              placeholder="Tipo de Rol"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.tipo_rol" class="text-danger">
              {{ $page.errors.tipo_rol[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-7" label="Url formulario:" label-for="input-7">
            <b-form-input
              id="input-7"
              v-model="gradoprocedimiento.url_formulario"
              placeholder="Url del Formulario"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.url_formulario" class="text-danger">
              {{ $page.errors.url_formulario[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-8" label="Orden:" label-for="input-8">
            <b-form-input
              id="input-8"
              v-model="gradoprocedimiento.orden"
              placeholder="Orden"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.orden" class="text-danger">
              {{ $page.errors.orden[0] }}
            </div>
          </b-form-group>
          <b-form-group id="input-group-9" label="Descripción:" label-for="input-9">
            <b-form-input
              id="input-9"
              v-model="gradoprocedimiento.descripcion"
              placeholder="Descripción"
              autocomplete="off"
            ></b-form-input>
            <div v-if="$page.errors.descripcion" class="text-danger">
              {{ $page.errors.descripcion[0] }}
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
  name: "gradosprocedimientos.create",
  components: {
    AppLayout,
  },
  data() {
    return {
      gradoprocedimiento: {
        idgradomodalidad: "",
        idprocedimiento: "",
        idrol: "",
        tipo_rol: "",
        url_formulario: "",
        orden: "",
        descripcion: "",
      },
      modalidades : [],
      select_modalidades : [],
      procedimientos: [],
      select_procedimientos: [],
      roles : [],
      select_roles : [],
    };
  },
  created: function () {
    this.getAllProcedimientos();
    this.getAllModalidades();
    this.getAllRoles();
  },
  methods: {
    registrar() {
      this.$inertia.post(`/gradosmodalidades`, this.gradomodalidad);
    },
    getAllProcedimientos() {
      axios.get(`/getprocedimientos`)
        .then(response => {
        console.log(response.data);
          this.procedimientos = response.data;
          if (this.select_procedimientos.length == 0) {
            this.select_procedimientos.push({value: 0, text: 'Sin Procedimientos'});
            for(var gt of this.procedimientos){
              this.select_procedimientos.push({value: gt.id, text: gt.nombre});
            }
          }       
      })
    },
    getAllModalidades() {
      axios.get(`/getgradosmodalidades`)
        .then(response => {
        console.log(response.data);
          this.modalidades = response.data;
          if (this.select_modalidades.length == 0) {
            this.select_modalidades.push({value: 0, text: 'Sin Modadlidad'});
            for(var gt of this.modalidades){
              this.select_modalidades.push({value: gt.id, text: gt.idmodalidad});
            }
          }       
      })
    },
    getAllRoles() {
      axios.get(`/getroles`)
        .then(response => {
        console.log(response.data);
          this.roles = response.data;
          if (this.select_roles.length == 0) {
            this.select_roles.push({value: 0, text: 'Sin Rol'});
            for(var gt of this.roles){
              this.select_roles.push({value: gt.id, text: gt.nombre});
            }
          }       
      })
    },
  },
};
</script>
