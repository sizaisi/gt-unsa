<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Cargos</template>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Cargos</h3>
                <jet-nav-link
                    class="btn btn-success float-right"
                    :href="`${api_url}/cargos/create`"
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
                    :items="cargos"
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
                            :href="`${api_url}/cargos/${row.item.id}`"
                            type="button"
                            ><b-icon icon="eye"></b-icon
                        ></jet-nav-link>
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-warning btn-sm"
                            :href="`${api_url}/cargos/${row.item.id}/edit`"
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
    name: "cargos.index",
    props: ["cargos"],
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
                {
                    key: "codigo",
                    label: "Codigo",
                    sortable: true,
                    class: "text-center"
                },
                { key: "nombre", label: "Nombre", sortable: true },
                { key: "condicion", label: "Condición", class: "text-center" },
                { key: "acciones", label: "Acciones", class: "text-center" }
            ],
            dismissCountDown: 5
        };
    },
    methods: {
        eliminar(cargo) {
            if (!confirm("Estas seguro de querer eliminar este cargo?")) return;
            this.$inertia.delete(`${this.api_url}/cargos/${cargo.id}`);
        },
        restaurar(cargo) {
            if (!confirm("Estas seguro de querer restaurar este cargo?"))
                return;
            this.$inertia.post(`${this.api_url}/cargos/${cargo.id}/restore`);
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        }
    }
};
</script>
