<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Grado-Modalidad</template>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Grados-Modalidades</h3>
                <jet-nav-link
                    class="btn btn-success float-right"
                    :href="`${api_url}/gradosmodalidades/create`"
                    >Crear</jet-nav-link
                >
            </div>
            <div class="card-body">
                <flash-alert />
                <b-table
                    show-empty
                    striped
                    hover
                    bordered
                    small
                    responsive
                    stacked="md"
                    :items="gradosmodalidades"
                    :fields="fields"
                    empty-text="No hay registros para mostrar"
                >
                    <template v-slot:cell(condicion)="row">
                        <b-badge v-if="row.item.deleted_at == null" variant="success">
                            Activo
                        </b-badge>
                        <b-badge v-else variant="secondary">Inactivo</b-badge>
                    </template>
                    <template v-slot:cell(acciones)="row">
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-primary btn-sm"
                            :href="`${api_url}/gradosmodalidades/${row.item.id}`"
                            type="button"
                            ><b-icon icon="eye"></b-icon
                        ></jet-nav-link>
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-warning btn-sm"
                            :href="`${api_url}/gradosmodalidades/${row.item.id}/edit`"
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
    name: "gradosmodalidades.index",
    props: ["gradosmodalidades"],
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
                { key: "grado", label: "Grado", sortable: true },
                { key: "modalidad", label: "Modalidad", sortable: true },
                { key: "componente", label: "Componente", sortable: true },
                { key: "condicion", label: "Condición", class: "text-center" },
                { key: "acciones", label: "Acciones", class: "text-center" }
            ],
            dismissCountDown: 5
        };
    },
    methods: {
        eliminar(gradomodalidad) {            
            if (!confirm("Estas seguro de querer eliminar este grado-modalidad?"))
                return;

            this.$inertia.delete(`${this.api_url}/gradosmodalidades/${gradomodalidad.id}`);
        },
        restaurar(gradomodalidad) {
            if (!confirm("Estas seguro de querer restaurar este grado-modalidad?"))
                return;

            this.$inertia.post(`${this.api_url}/gradosmodalidades/${gradomodalidad.id}/restore`);
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        }
    }
};
</script>
