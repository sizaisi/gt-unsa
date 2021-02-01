<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Colaciones Expedientes</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Nueva Colación - Expediente</h3>
      </div>
      <div class="card-body">
        <b-form @submit.prevent="updateexpedientes">
          <div>
            <b-form-group
              id="input-group-2"
              label="Colación:"
              label-for="input-2"
            >
              <b-form-select
                v-model="colacionexpediente.idcolacion"
                :options="colaciones"
                id="input-2"
              >
                <template v-slot:first>
                  <option :value="null" disabled>
                    -- Por favor seleccione una opción --
                  </option>
                </template>
              </b-form-select>
              <div v-if="$page.errors.idcolacion" class="text-danger">
                {{ $page.errors.idcolacion[0] }}
              </div>
            </b-form-group>
            <p>
              <b-button size="sm" @click="selectAllRows">Seleccionar Todos</b-button>
              <b-button size="sm" @click="clearSelected">Ninguno</b-button>
            </p>
            <b-table
              :items="expedientes"
              :fields="fields2"
              :select-mode="selectMode"
              responsive="sm"
              ref="selectableTable"
              selectable
              @row-selected="onRowSelected"
            >
              <!-- Example scoped slot for select state illustrative purposes -->
              <template #cell(selected)="{ rowSelected }">
                <template v-if="rowSelected">
                  <span aria-hidden="true">&check;</span>
                  <span class="sr-only">Selected</span>
                </template>
                <template v-else>
                  <span aria-hidden="true">&nbsp;</span>
                  <span class="sr-only">Not selected</span>
                </template>
              </template>
            </b-table>

            <p>
              ID Expedientes Seleccionados:<br />
              {{ colacionexpediente.idexpediente }}
            </p>
          </div>
          <b-button type="submit" variant="success">Registrar</b-button>
        </b-form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  name: "colacionesexpedientes.updateexpedientes",
  props: ["colaciones", "expedientes"],
  components: {
    AppLayout,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      colacionexpediente: {
        idcolacion: null,
        idexpediente: [],
      },
      fields2: [
        {
          key: "selected",
          label: "Seleccionado",
          sortable: true,
          class: "text-center",
        },
        { key: "id", label: "ID", sortable: true, class: "text-center" },
        { key: "nues", label: "Escuela", sortable: true },
        { key: "espe", label: "Especialidad", sortable: true },
        {
          key: "codigo",
          label: "Codigo",
          sortable: true,
          class: "text-center",
        },
        {
          key: "fecha_sesion_jurado",
          label: "Fecha Sesion Jurado",
          sortable: true,
          class: "text-center",
        },
        {
          key: "fecha_sustentacion",
          label: "Fecha Sustentacion",
          sortable: true,
          class: "text-center",
        },
      ],
      selected: [],
      selectMode: "multi",
    };
  },
  created() {},
  methods: {
    updateexpedientes() {
      this.$inertia.post(
        `${this.api_url}/updateexpedientes`,
        this.colacionexpediente
      );
    },
    onRowSelected(items) {
      this.colacionexpediente.idexpediente = items.map((d) => d.id);
    },
    selectAllRows() {
      this.$refs.selectableTable.selectAllRows();
    },
    clearSelected() {
      this.$refs.selectableTable.clearSelected();
    },
  },
};
</script>