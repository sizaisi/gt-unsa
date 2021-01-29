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
                        <b-button
                            v-if="row.item.deleted_at == null"
                            variant="success"
                            size="sm"
                            title="Revisado"
                            @click="revisado(row.item)"
                        >
                            <b-icon icon="check"></b-icon>
                        </b-button>
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
                            <!--{{ row.detailsShowing ? 'Ocultar' : 'Mostrar'}} -->
                            Detalles
                        </b-button>
                    </template>
                    <template #row-details="row">
                        <b-card>
                            <fieldset>
                                <legend><center>INFORMACIÓN DE LA UNIVERSIDAD</center></legend>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Codigo de la Universidad:</b></b-col>
                                    <b-col>091</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Razón social de la Universidad:</b></b-col>
                                    <b-col>UNIVERSIDAD NACIONAL DE SAN AGUSTIN</b-col>
                                </b-row>
                            </fieldset>
                            <fieldset>
                                <legend><center>INFORMACIÓN PERSONAL</center></legend>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Apellido Paterno:</b></b-col>
                                    <b-col>{{ row.item.apepat }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Apellido Materno:</b></b-col>
                                    <b-col>{{ row.item.apemat }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Nombre Graduando:</b></b-col>
                                    <b-col>{{ row.item.nombregrad }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Sexo Graduando:</b></b-col>
                                    <b-col>{{ row.item.sexo }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Tipo Documento:</b></b-col>
                                    <b-col>{{ row.item.tipo_doc }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Número de Documento:</b></b-col>
                                    <b-col>{{ row.item.docu_num }}</b-col>
                                </b-row>
                            </fieldset>
                            <fieldset>
                                <legend><center>INFORMACIÓN ACADÉMICA</center></legend>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Primera Matrícula:</b></b-col>
                                    <b-col>{{ row.item.fecmat }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Nombre de la Facultad:</b></b-col>
                                    <b-col>{{ row.item.facultad }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Carrera/Escuela/Programa:</b></b-col>
                                    <b-col>{{ row.item.escuela }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Egreso:</b></b-col>
                                    <b-col>{{ row.item.fecegr }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Número de Créditos:</b></b-col>
                                    <b-col>{{ row.item.creditos }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Nombre de Programa de Estudios:</b></b-col>
                                    <b-col>{{ row.item.nompro }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Modalidad de Estudios:</b></b-col>
                                    <b-col>{{ row.item.modest }}</b-col>
                                </b-row>
                            </fieldset>
                            <fieldset>
                                <legend><center>INFORMACIÓN DEL EXPEDIENTE</center></legend>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Código del Expediente:</b></b-col>
                                    <b-col>{{ row.item.codigo }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>URL del Trabajo de Investigación:</b></b-col>
                                    <b-col>{{ row.item.url }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Procedencia del Bachiller:</b></b-col>
                                    <b-col>{{ row.item.probac }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Grado Académico o Título Profesional:</b></b-col>
                                    <b-col>{{ row.item.gratit }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Nombre completo del Trabajo de Investigación / Tesis / Trabajo de Suficiencia Profesional / Trabajo Académico:</b></b-col>
                                    <b-col>{{ row.item.titulo }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Modalidad de Obtención del Grado o Título:</b></b-col>
                                    <b-col>{{ row.item.modalidad }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Solicitud del Inicio del Trámite:</b></b-col>
                                    <b-col>{{ row.item.fectra }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Sustentación / Aprobación del Grado o Título:</b></b-col>
                                    <b-col>{{ row.item.fecsus }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Originalidad de la Investigación:</b></b-col>
                                    <b-col>{{ row.item.oriinv }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Abreviatura Grado / título:</b></b-col>
                                    <b-col>{{ row.item.abrtit }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Número de Resolución:</b></b-col>
                                    <b-col>{{ row.item.numres }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Resolución de Consejo Universitario:</b></b-col>
                                    <b-col>{{ row.item.fecrescon }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha Diploma Original:</b></b-col>
                                    <b-col>{{ row.item.fecdip }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Número Diploma:</b></b-col>
                                    <b-col>{{ row.item.numdip }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Tipo de Emisión del Diploma:</b></b-col>
                                    <b-col>{{ row.item.fecdip }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Libro:</b></b-col>
                                    <b-col>{{ row.item.lib }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Folio:</b></b-col>
                                    <b-col>{{ row.item.fol }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Registro:</b></b-col>
                                    <b-col>{{ row.item.reg }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Cargo1:</b></b-col>
                                    <b-col>{{ row.item.car1 }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Autoridad1:</b></b-col>
                                    <b-col>{{ row.item.aut1 }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Cargo2:</b></b-col>
                                    <b-col>{{ row.item.car2 }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Autoridad2:</b></b-col>
                                    <b-col>{{ row.item.aut2 }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Cargo3:</b></b-col>
                                    <b-col>{{ row.item.car3 }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Autoridad3:</b></b-col>
                                    <b-col>{{ row.item.aut3 }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Oficio:</b></b-col>
                                    <b-col>{{ row.item.ofi }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Modalidad de Sustentación de la Tesis:</b></b-col>
                                    <b-col>{{ row.item.modsus }}</b-col>
                                </b-row>
                            </fieldset>
                            <fieldset>
                                <legend><center>INFORMACIÓN DE ACREDITACIÓN</center></legend>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Programa Acreditado ante SINEACE:</b></b-col>
                                    <b-col>{{ row.item.proacr }}</b-col>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Inicio de la Acreditación del Programa Académico:</b></b-col>
                                    <b-col>{{ row.item.feciniacr }}</b-col>
                                </b-row>
                                <b-row>
                                    <b-col sm="3" class="text-sm-right"><b>Fecha de Fin de la Acreditación del Programa Académico:</b></b-col>
                                    <b-col>{{ row.item.fecfinacr }}</b-col>
                                </b-row>
                            </fieldset>
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
                { key: "fecha_sesion_jurado", label: "Fecha sesión de jurado", sortable: true },
                { key: "fecha_sustentacion", label: "Fecha sustentación", sortable: true },
                { key: "hora_sustentacion", label: "Hora Sustentación", sortable: true },
                { key: "condicion", label: "Condición", class: "text-center" },
                { key: "acciones", label: "Acciones", class: "text-center" }
            ],
            dismissCountDown: 5,

        };
    },
    methods: {
        eliminar(expediente) {
            if (
                !confirm(
                    "Estas seguro de querer eliminar esta relación de cargo-autoridad?"
                )
            )
                return;
            this.$inertia.delete(`${this.api_url}/expedientes/${expediente.id}`);
        },
        restaurar(expediente) {
            if (
                !confirm(
                    "Estas seguro de querer restaurar esta relación de cargo-autoridad?"
                )
            )
                return;
            this.$inertia.post(
                `${this.api_url}/expedientes/${expediente.id}/restore`
            );
        },
        revisado(expediente) {
            if (
                !confirm(
                    "Estas seguro que el expediente fue revisado correctamente?"
                )
            )
                return;
            this.$inertia.post(
                `${this.api_url}/expedientes/${expediente.id}/update`
            );
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        },
    }
};
</script>