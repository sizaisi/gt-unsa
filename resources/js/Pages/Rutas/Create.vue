<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Rutas</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nueva Ruta</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="registrar">
          <b-form-group id="input-group-1" label="Trámite:" label-for="input-1">
            <b-form-select
              v-model="ruta.idtramite"
              :options="tramites"
              id="input-1"
            >
              <template v-slot:first>
                <option :value="null" disabled>
                  -- Por favor seleccione una opción --
                </option>
              </template>
            </b-form-select>
            <div v-if="$page.errors.idtramite" class="text-danger">
              {{ $page.errors.idtramite[0] }}
            </div>
          </b-form-group>
          <b-form-group
            id="input-group-2"
            label="Procedimiento origen:"
            label-for="input-2"
          >
            <b-form-select
              v-model="ruta.idproc_origen"
              :options="procedimientos"
              id="input-2"
            >
              <template v-slot:first>
                <option :value="null" disabled>
                  -- Por favor seleccione una opción --
                </option>
              </template>
            </b-form-select>
            <div v-if="$page.errors.idproc_origen" class="text-danger">
              {{ $page.errors.idproc_origen[0] }}
            </div>
          </b-form-group>
          <b-form-group
            id="input-group-3"
            label="Procedimiento destino:"
            label-for="input-3"
          >
            <b-form-select
              v-model="ruta.idproc_destino"
              :options="procedimientos"
              id="input-3"
            >
              <template v-slot:first>
                <option :value="null" disabled>
                  -- Por favor seleccione una opción --
                </option>
              </template>
            </b-form-select>
            <div v-if="$page.errors.idproc_destino" class="text-danger">
              {{ $page.errors.idproc_destino[0] }}
            </div>
          </b-form-group>
          <b-form-group
            id="input-group-4"
            label="Etiqueta:"
            label-for="input-4"
          >
            <b-form-select
              v-model="ruta.etiqueta"
              :options="etiquetas"
              id="input-4"
            >
              <template v-slot:first>
                <option :value="null" disabled>
                  -- Por favor seleccione una opción --
                </option>
              </template>
            </b-form-select>
            <div v-if="$page.errors.etiqueta" class="text-danger">
              {{ $page.errors.etiqueta[0] }}
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
  name: "rutas.create",
  props: ["tramites"],
  components: {
    AppLayout,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      ruta: {
        idtramite: null,
        idproc_origen: null,
        idproc_destino: null,
        etiqueta: null,
      },
      procedimientos: [],
      etiquetas: [
        "iniciar",
        "enviar",
        "derivar",
        "cambiar",
        "aceptar",
        "aprobar",
        "informar",
        "cambiar",
        "devolver",
        "denegar",
        "observar",
        "rechazar",
        "finalizar",
      ],
    };
  },
  watch: {
    "ruta.idtramite": function (val) {
      this.ruta.idproc_origen = null;
      this.ruta.idproc_destino = null;

      axios
        .get(`${this.api_url}/rutas/getProcedimientos/${val}`)
        .then((response) => {
          this.procedimientos = response.data;
          this.procedimientos.unshift({ value: 0, text: "Inicio" });
          this.procedimientos.push({ value: 0, text: "Fin" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  methods: {
    registrar() {
      this.$inertia.post(`${this.api_url}/rutas`, this.ruta);
    },
  },
};
</script>
