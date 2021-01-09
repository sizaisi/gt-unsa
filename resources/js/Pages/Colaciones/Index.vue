<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Colaciones</template>

        <div class="card">
            <b-card bg-variant="Light">
                <b-row align-h="center" align-content="center">
                <h2>Lista de Colaciones</h2>
                </b-row>
                <b-row align-h="center" align-content="center">
                <jet-nav-link
                    class="btn btn-success float-right"
                    :href="`${api_url}/colaciones/create`"
                    >Crear
                </jet-nav-link>
                </b-row>
            </b-card>
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
                    :items="colaciones"
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
                            :href="`${api_url}/colaciones/${row.item.id}`"
                            type="button"
                            ><b-icon icon="eye"></b-icon
                        ></jet-nav-link>
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-warning btn-sm"
                            :href="`${api_url}/colaciones/${row.item.id}/edit`"
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
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import JetNavLink from "./../../Jetstream/NavLink";
import FlashAlert from "./../../components/FlashAlert";

export default {
    name: "colaciones.index",
    props: ["colaciones"],
    components: {
        AppLayout,
        JetNavLink,
        FlashAlert
    },
    data() {
        return {
            api_url: this.$root.api_url,
            fields: [
                {
                    key: "id",
                    label: "ID",
                    sortable: true,
                    class: "text-center"
                },
                { key: "fecha", label: "fecha", sortable: true },
                { key: "horainicio", label: "Hora de Inicio", sortable: true },
                { key: "horafin", label: "Hora de fin", sortable: true },
                { key: "cantidad", label: "cantidad de colados", sortable: true },
                { key: "maximo", label: "Cantidad máxima por colación", sortable: true },
                { key: "condicion", label: "Condición", class: "text-center" },
                { key: "acciones", label: "Acciones", class: "text-center" }
            ],
            dismissCountDown: 5
        };
    },
    methods: {
        eliminar(colacion) {
            if (!confirm("Estas seguro de querer eliminar esta colacion?"))
                return;
            this.$inertia.delete(`${this.api_url}/colaciones/${colacion.id}`);
        },
        restaurar(colacion) {
            if (!confirm("Estas seguro de querer restaurar esta colacion?"))
                return;
            this.$inertia.post(`${this.api_url}/colaciones/${colacion.id}/restore`);
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        }
    }
};
</script>
