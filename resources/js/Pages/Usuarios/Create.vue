<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-users fa-fw"></i>
    </template>
    <template #title>Usuarios</template>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nuevo usuario</h3>

        <div class="card-tools">
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
            data-toggle="tooltip"
            title="Collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="remove"
            data-toggle="tooltip"
            title="Remove"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <b-form-group
          id="input-group-2"
          label="Nombres completos:"
          label-for="input-2"
        >
          <b-form-input
            id="input-2"
            v-model="form.name"
            required
            placeholder="Datos de usuario"
          ></b-form-input>
        </b-form-group>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
          <b-form-group
            id="input-group-1"
            label="Correo eletrónico:"
            label-for="input-1"
            description="We'll never share your email with anyone else."
          >
            <b-form-input
              id="input-1"
              v-model="form.email"
              type="text"
              required
              placeholder="Correo electrónico de acceso"
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Rol:" label-for="input-3">
            <b-form-select
              id="input-3"
              v-model="form.food"
              :options="foods"
              required
            ></b-form-select>
          </b-form-group>

          <b-button type="submit" variant="success">Registrar</b-button>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import JetNavLink from "./../../Jetstream/NavLink";

export default {
  name: "usuarios.index",
  props: ["users"],
  components: {
    AppLayout,
    JetNavLink,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      form: {
        email: "",
        name: "",
        food: null,
        checked: [],
      },
      foods: [
        { text: "Seleccione rol...", value: null },
        "Administrador",
        "Vendedor",
        "Cajero",
        "Almacenero",
      ],
      show: true,
    };
  },
  created() {},
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.email = "";
      this.form.name = "";
      this.form.food = null;
      this.form.checked = [];
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
};
</script>
