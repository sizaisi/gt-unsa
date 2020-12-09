<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Grado-Procedimiento</template>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lista de Grados-Procedimientos</h3>
        <jet-nav-link
          class="btn btn-success float-right"
          href="/gradosprocedimientos/create"
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
          :items="gradosprocedimientos"
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
              :href="`/gradosprocedimientos/${row.item.id}`"
              type="button"
              ><b-icon icon="eye"></b-icon
            ></jet-nav-link>
            <jet-nav-link
              class="btn btn-warning btn-sm"
              :href="`/gradosprocedimientos/${row.item.id}/edit`"
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
  name: "gradosprocedimientos.index",
  props: ["gradosprocedimientos"],
  components: {
    AppLayout,
    JetNavLink,
    FlashAlert,
  },
  data() {
    return {
      fields: [
        { key: "id", label: "ID", sortable: true },
        { key: "idgradomodalidad", label: "Grado Modalidad", sortable: true },
        { key: "idprocedimiento", label: "Procedimiento", sortable: true },
        { key: "idrol", label: "Rol", sortable: true },
        { key: "tipo_rol", label: "Tipo", sortable: true },
        { key: "url_formulario", label: "Formulario", sortable: true },
        { key: "orden", label: "Orden", sortable: true },
        { key: "descripcion", label: "Descripción", sortable: true },
        { key: "condicion", label: "Condición", class: "text-center" },
        { key: "acciones", label: "Acciones", class: "text-center" },
      ],
      dismissCountDown: 5,
    };
  },
  methods: {
    eliminar(gradoprocedimiento) {
      if (!confirm("Estas seguro de querer eliminar?")) return;
      this.$inertia.delete(`/gradosprocedimientos/${gradoprocedimiento.id}`);
    },
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
  },
};
</script>
