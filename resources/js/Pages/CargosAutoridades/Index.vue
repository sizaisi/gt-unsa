<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Cargo-Autoridad</template>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lista de Cargos-Autoridades</h3>
        <jet-nav-link
          class="btn btn-success float-right"
          :href="`${api_url}/cargosautoridades/create`"
          >Crear</jet-nav-link
        >
      </div>
      <div class="card-body">
        <flash-alert />
        <b-row>
          <b-col sm="12" md="4" lg="4" class="my-1">
            <b-form-group
              label="Registros por página: "
              label-cols-sm="6"
              label-align-sm="right"
              label-size="sm"
              label-for="perPageSelect"
              class="mb-0"
            >
              <b-form-select
                v-model="perPage"
                id="perPageSelect"
                size="sm"
                :options="pageOptions"
              ></b-form-select>
            </b-form-group>
          </b-col>
          <b-col sm="12" offset-md="3" md="5" lg="5" class="my-1">
            <b-form-group
              label="Buscar: "
              label-cols-sm="3"
              label-align-sm="right"
              label-size="sm"
              label-for="filterInput"
              class="mb-0"
            >
              <b-input-group size="sm">
                <b-form-input
                  v-model="filter"
                  type="search"
                  id="filterInput"
                  placeholder="Escriba el texto a buscar..."
                ></b-form-input>
                <b-input-group-append>
                  <b-button :disabled="!filter" @click="filter = ''"
                    >Limpiar</b-button
                  >
                </b-input-group-append>
              </b-input-group>
            </b-form-group>
          </b-col>
        </b-row>
        <b-table
          show-empty
          striped
          hover
          bordered
          small
          responsive
          stacked="md"
          :items="cargosautoridades"
          :fields="fields"
          :current-page="currentPage"
          :per-page="perPage"
          :filter="filter"
          :sort-by.sync="sortBy"
          :sort-desc.sync="sortDesc"
          :sort-direction="sortDirection"
          @filtered="onFiltered"
          empty-text="No hay registros para mostrar"
          empty-filtered-text="No hay registros que coincidan con su búsqueda."
        >
          <template v-slot:cell(condicion)="row">
            <b-badge v-if="row.item.deleted_at == null" variant="success"
              >Activo</b-badge
            >
            <b-badge v-else variant="secondary">Inactivo</b-badge>
          </template>
          <template v-slot:cell(acciones)="row">
            <jet-nav-link
              v-if="row.item.deleted_at == null"
              class="btn btn-info btn-sm"
              :href="`${api_url}/cargosautoridades/${row.item.id}`"
              type="button"
              ><b-icon icon="eye"></b-icon
            ></jet-nav-link>
            <jet-nav-link
              v-if="row.item.deleted_at == null"
              class="btn btn-warning btn-sm"
              :href="`${api_url}/cargosautoridades/${row.item.id}/edit`"
              type="button"
              ><b-icon icon="pencil-square"></b-icon
            ></jet-nav-link>
            <b-button
              v-if="row.item.deleted_at == null"
              variant="danger"
              size="sm"
              title="Eliminar"
              @click="eliminar(row.item)"
            >
              <b-icon icon="trash"></b-icon>
            </b-button>
            <b-button
              v-else
              variant="success"
              size="sm"
              title="Restaurar"
              @click="restaurar(row.item)"
            >
              <b-icon icon="check"></b-icon>
            </b-button>
          </template>
        </b-table>
        <b-row>
          <b-col offset-md="8" md="4" class="my-1">
            <b-pagination
              v-model="currentPage"
              :total-rows="totalRows"
              :per-page="perPage"
              align="fill"
              size="sm"
              class="my-0"
            ></b-pagination>
          </b-col>
        </b-row>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import JetNavLink from "./../../Jetstream/NavLink";
import FlashAlert from "./../../components/FlashAlert";

export default {
  name: "cargosautoridades.index",
  props: ["cargosautoridades"],
  components: {
    AppLayout,
    JetNavLink,
    FlashAlert,
  },
  data() {
    return {
      api_url: this.$root.api_url,
      fields: [
        {
          key: "id",
          label: "ID",
          sortable: true,
          class: "text-center",
        },
        { key: "cargo", label: "Cargo", sortable: true },
        { key: "autoridad", label: "Autoridad", sortable: true },
        {
          key: "fecha_inicio",
          label: "Fecha Inicio",
          sortable: true,
          class: "text-center",
        },
        {
          key: "fecha_fin",
          label: "Fecha Fin",
          sortable: true,
          class: "text-center",
        },
        { key: "condicion", label: "Condición", class: "text-center" },
        { key: "acciones", label: "Acciones", class: "text-center" },
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 5,
      pageOptions: [5, 10, 15],
      sortBy: "",
      sortDesc: false,
      sortDirection: "asc",
      filter: null,
    };
  },
  created() {
    this.totalRows = this.cargosautoridades.length;
  },
  methods: {
    eliminar(cargoautoridad) {
      if (
        !confirm(
          "Estas seguro de querer eliminar esta relación de cargo-autoridad?"
        )
      )
        return;
      this.$inertia.delete(
        `${this.api_url}/cargosautoridades/${cargoautoridad.id}`
      );
    },
    restaurar(cargoautoridad) {
      if (
        !confirm(
          "Estas seguro de querer restaurar esta relación de cargo-autoridad?"
        )
      )
        return;
      this.$inertia.post(
        `${this.api_url}/cargosautoridades/${cargoautoridad.id}/restore`
      );
    },
    onFiltered(filteredItems) {
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
  },
};
</script>
