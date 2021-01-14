<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Expediente</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Expedientes</h3>
                <jet-nav-link
                    class="btn btn-success float-right"
                    :href="`${api_url}/expedientes/create`"
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
                    stacked="md"
                    :items="expedientes"
                    :fields="fields"
                    empty-text="No hay registros para mostrar"
                    responsive="sm"
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
                            :href="`${api_url}/expedientes/${row.item.id}`"
                            type="button"
                            ><b-icon icon="eye"></b-icon
                        ></jet-nav-link>
                        <jet-nav-link
                            v-if="row.item.deleted_at == null"
                            class="btn btn-warning btn-sm"
                            :href="`${api_url}/expedientes/${row.item.id}/edit`"
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
                            {{ row.detailsShowing ? 'Ocultar' : 'Mostrar'}} Detalles 
                        </b-button>
                    </template>
                    <template #row-details="row">
                        <b-card>

                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Codigo Expediente:</b></b-col>
                                <b-col>{{ row.item.codigo }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de SesiÃ³n de Jurado:</b></b-col>
                                <b-col>{{ row.item.fecha_sesion_jurado }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Grado - Modalidad de obtenciÃ³n:</b></b-col>
                                <b-col>{{ row.item.modalidadobtencion }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Procedimiento actual del Expediente:</b></b-col>
                                <b-col>{{ row.item.procedimiento }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Rol Actual del Expediente:</b></b-col>
                                <b-col>{{ row.item.rol }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Escuela del Graduando:</b></b-col>
                                <b-col>{{ row.item.escuela }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de Sustentación:</b></b-col>
                                <b-col>{{ row.item.fecha_sustentacion }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Link de Repositorio:</b></b-col>
                                <b-col>{{ row.item.url_repo }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>TÃ­tulo Tesis:</b></b-col>
                                <b-col>{{ row.item.titulo }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Hora de Sustentación:</b></b-col>
                                <b-col>{{ row.item.hora_sustentacion }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Estado de Expediente:</b></b-col>
                                <b-col>{{ row.item.estado }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de Colación:</b></b-col>
                                <b-col>{{ row.item.fecha_colacion }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>CUI:</b></b-col>
                                <b-col>{{ row.item.cui }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de Sesión de Jurado:</b></b-col>
                                <b-col>{{ row.item.fecha_sesion_jurado }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Correo Graduando:</b></b-col>
                                <b-col>{{ row.item.email }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Nombre Graduando:</b></b-col>
                                <b-col>{{ row.item.nombre }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Celular Graduando:</b></b-col>
                                <b-col>{{ row.item.celular }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Dirección Graduando:</b></b-col>
                                <b-col>{{ row.item.direccion }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Fecha Inicio de Trámite:</b></b-col>
                                <b-col>{{ row.item.fing }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de Primera Matricula:</b></b-col>
                                <b-col>{{ row.item.primeramatricula }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Fecha Egreso:</b></b-col>
                                <b-col>{{ row.item.fecha_egreso }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Procedencia Bachiller:</b></b-col>
                                <b-col>{{ row.item.procedencia }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>NÃºmero Créditos:</b></b-col>
                                <b-col>{{ row.item.creditos }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Modalidad de Estudios:</b></b-col>
                                <b-col>{{ row.item.modalidadestudios }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de Inicio Acreditación de Escuela:</b></b-col>
                                <b-col>{{ row.item.acreditacioninicio }}</b-col>
                                <b-col sm="3" class="text-sm-right"><b>Fecha de Fin Acreditación de Escuela:</b></b-col>
                                <b-col>{{ row.item.acreditacionfin }}</b-col>
                            </b-row>
                            <b-row>
                                <b-col sm="3" class="text-sm-right"><b>Modalidad de Sustentación:</b></b-col>
                                <b-col>{{ row.item.modalidadsustentacion }}</b-col>
                            </b-row>
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
    name: "expedientes.index",
    props: ["expedientes"],
    components: {
        AppLayout,
        JetNavLink,
        FlashAlert
    },
    data() {
        return {
            api_url: this.$root.api_url,
            fields: [
                { key: "codigo", label: "Codigo Expediente", sortable: true },
                { key: "nombre", label: "Nombre Graduando", sortable: true },
                { key: "fecha_sesion_jurado", label: "Fecha sesiÃ³n de jurado", sortable: true },
                { key: "fecha_sustentacion", label: "Fecha sustentaciÃ³n", sortable: true },
                { key: "hora_sustentacion", label: "Hora SustentaciÃ³n", sortable: true },
                { key: "condicion", label: "CondiciÃ³n", class: "text-center" },
                { key: "acciones", label: "Acciones", class: "text-center" }
            ],
            dismissCountDown: 5
        };
    },
    methods: {
        eliminar(expediente) {
            if (
                !confirm(
                    "Estas seguro de querer eliminar esta relaciÃ³n de cargo-autoridad?"
                )
            )
                return;
            this.$inertia.delete(`${this.api_url}/expedientes/${expediente.id}`);
        },
        restaurar(expediente) {
            if (
                !confirm(
                    "Estas seguro de querer restaurar esta relaciÃ³n de cargo-autoridad?"
                )
            )
                return;
            this.$inertia.post(
                `${this.api_url}/expedientes/${expediente.id}/restore`
            );
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        },
    }
};
</script>