<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Colacion - Expediente</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Colaciones - Expedientes</h3>
                <jet-nav-link
                    class="btn btn-success float-right"
                    :href="`${api_url}/colacionesexpedientes/create`"
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
                    :items="expedientes"
                    :fields="fields"
                    empty-text="No hay registros para mostrar"
                >
                    <template v-slot:cell(condicion)="row">
                        <b-badge
                            v-if="row.item.deleted_at == null"
                            variant="success"
                            >Activo</b-badge
                        >
                        <b-badge v-else variant="secondary">Inactivo</b-badge>
                    </template>
                    <template v-slot:cell(acciones)="row">
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-primary btn-sm"
                            :href="`${api_url}/verexpedientes/${row.item.id}`"
                            type="button"
                            ><b-icon icon="eye"></b-icon
                        ></jet-nav-link>
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-primary btn-sm"
                            :href="`${api_url}/colacionesexpedientes/${row.item.id}`"
                            type="button"
                            ><b-icon icon="eye"></b-icon
                        ></jet-nav-link>
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-warning btn-sm"
                            :href="`${api_url}/colacionesexpedientes/${row.item.id}/edit`"
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
                        <b-button size="sm" @click="row.toggleDetails" class="mr-2">
                        {{ row.detailsShowing ? 'Ocultar' : 'Mostrar'}} Expedientes
                        </b-button>
                    </template>
                    <template #row-details>
                        <b-card>
                            <b-table
                                show-empty
                                striped
                                hover
                                bordered
                                small
                                responsive
                                stacked="md"
                                :items="expedientes"
                                :fields="fields2"
                                empty-text="No hay registros para mostrar"
                            >
                            </b-table>
                        </b-card>
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
    name: "colacionesexpedientes.verexpedientes",
    props: ["expedientes"],
    components: {
        AppLayout,
        JetNavLink,
        FlashAlert
    },
    data() {
        return {
            api_url: this.$root.api_url,
            fields:[
                { key: "id", label: "ID", sortable: true, class: "text-center" },
                { key: "nues", label: "Escuela", sortable: true },
                { key: "espe", label: "Especialidad", sortable: true },
                { key: "codigo", label: "Codigo", sortable: true, class: "text-center" },
                { key: "fecha_sesion_jurado", label: "Fecha Sesion Jurado", sortable: true, class: "text-center" },
                { key: "fecha_sustentacion", label: "Fecha Sustentacion", sortable: true, class: "text-center" },
                { key: "condicion", label: "Condición", class: "text-center" },
                { key: "acciones", label: "Acciones", class: "text-center" }
            ],
            dismissCountDown: 5
        };
    },
    methods: {
        eliminar(colacionexpediente) {
            if (
                !confirm(
                    "Estas seguro de querer eliminar esta relación de Colacion - Expediente?"
                )
            )
                return;
            this.$inertia.delete(`${this.api_url}/colacionesexpedientes/${colacionexpediente.id}`);
        },
        restaurar(colacionexpediente) {
            if (
                !confirm(
                    "Estas seguro de querer restaurar esta relación de Colacion - Expediente?"
                )
            )
                return;
            this.$inertia.post(
                `${this.api_url}/colacionesexpedientes/${colacionexpediente.id}/restore`
            );
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        }
    }
};
</script>
