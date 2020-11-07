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
          href="/cargosautoridades/create"
          >Crear</jet-nav-link
        >
      </div>
      <div class="card-body">
        <hr class="bg-secondary" />
        <flash-alert />
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
          empty-text="No hay registros para mostrar"
        >
          <template v-slot:cell(condicion)="row">
            <b-badge v-if="row.item.condicion == 1" variant="success"
              >Activo</b-badge
            >
            <b-badge v-else variant="secondary">Inactivo</b-badge>
          </template>
          <template v-slot:cell(acciones)="row">
            <jet-nav-link
              class="btn btn-primary btn-sm"
              :href="`/cargosautoridades/${row.item.id}`"
              type="button"
              ><b-icon icon="eye"></b-icon
            ></jet-nav-link>
            <jet-nav-link
              class="btn btn-warning btn-sm"
              :href="`/cargosautoridades/${row.item.id}/edit`"
              type="button"
              ><b-icon icon="pencil-square"></b-icon
            ></jet-nav-link>
            <b-button
              variant="danger"
              size="sm"
              title="Eliminar"
              @click="eliminar(row.item)"
            >
              <b-icon icon="trash"></b-icon>
            </b-button>
          </template>
        </b-table>
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
      fields: [
        { key: "id", label: "ID", sortable: true },
        { key: "idcargo", label: "Cargo", sortable: true },
        { key: "idautoridad", label: "Autoridad", sortable: true },
        { key: "fecha_inicio", label: "Fecha Inicio", sortable: true },
        { key: "fecha_fin", label: "Fecha Fin", sortable: true },
        { key: "condicion", label: "Condición", class: "text-center" },
        { key: "acciones", label: "Acciones", class: "text-center" },
      ],
      dismissCountDown: 5,
    };
  },
  methods: {
    eliminar(grado) {
      if (!confirm("Estas seguro de querer eliminar?")) return;
      this.$inertia.delete(`/cargosautoridades/${cargoautoridad.id}`);
    },
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
  },
};
</script>
