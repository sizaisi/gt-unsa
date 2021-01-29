<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-box fa-fw"></i>
    </template>
    <template #title>Documentos Expediente</template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lista de Documentos del Expediente</h3>
      </div>
      <div class="card-body">
        <flash-alert />
        <b-card no-body class="mb-1">
          <b-card-header header-tag="header" class="p-1" role="tab">
            <b-button block v-b-toggle.accordion-1 variant="info">Documentos del Expediente</b-button>
          </b-card-header>
          <b-collapse id="accordion-1" accordion="my-accordion" role="tabpanel">
            <b-card-body>
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
                  striped
                  bordered
                  small
                  show-empty
                  empty-text="No hay documentos que mostrar."
                  primary-key="id"
                  :busy="estaOcupado"
                  hover
                  responsive
                  stacked="md"
                  :items="expedientes"
                  :fields="fields"
                  :current-page="currentPage"
                  :per-page="perPage"
                  :filter="filter"
                  :sort-by.sync="sortBy"
                  :sort-desc.sync="sortDesc"
                  :sort-direction="sortDirection"
                  @filtered="onFiltered"
                  empty-filtered-text="No hay registros que coincidan con su búsqueda."
              >
                <template v-slot:cell(condicion)="row">
                  <b-badge v-if="expedientes.deleted_at == null" variant="success"
                    >Activo</b-badge
                  >
                  <b-badge v-else variant="secondary">Inactivo</b-badge>
                </template>
                <template v-slot:cell(acciones)="row">
                  <b-button
                      variant="warning"
                      size="sm"
                      title="Visualizar"          
                      class="mr-1"
                      @click="mostrarDocumento(expedientes.idrecurso)"
                      >
                <b-icon icon="eye"></b-icon>
              </b-button>
                  <jet-nav-link
                      v-if="expedientes.deleted_at == null"
                      class="btn btn-primary btn-sm"
                      :href="`${api_url}/expedientes/mostrar/${expedientes.idrecurso}`"
                      type="button"
                      ><b-icon icon="eye"></b-icon
                  ></jet-nav-link> 
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
            </b-card-body>
          </b-collapse>
        </b-card>
        <b-card no-body class="mb-1">
          <b-card-header header-tag="header" class="p-1" role="tab">
            <b-button block v-b-toggle.accordion-2 variant="info">Información del Expediente</b-button>
          </b-card-header>
          <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
            <b-card-body>
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
                      <b-col>{{ expedientes2.apepat }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Apellido Materno:</b></b-col>
                      <b-col>{{ expedientes2.apemat }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Nombre Graduando:</b></b-col>
                      <b-col>{{ expedientes2.nombregrad }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Sexo Graduando:</b></b-col>
                      <b-col>{{ expedientes2.sexo }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Tipo Documento:</b></b-col>
                      <b-col>{{ expedientes2.tipo_doc }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Número de Documento:</b></b-col>
                      <b-col>{{ expedientes2.docu_num }}</b-col>
                  </b-row>
              </fieldset>
              <fieldset>
                  <legend><center>INFORMACIÓN ACADÉMICA</center></legend>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Primera Matrícula:</b></b-col>
                      <b-col>{{ expedientes2.fecmat }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Nombre de la Facultad:</b></b-col>
                      <b-col>{{ expedientes2.facultad }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Carrera/Escuela/Programa:</b></b-col>
                      <b-col>{{ expedientes2.escuela }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Egreso:</b></b-col>
                      <b-col>{{ expedientes2.fecegr }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Número de Créditos:</b></b-col>
                      <b-col>{{ expedientes2.creditos }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Nombre de Programa de Estudios:</b></b-col>
                      <b-col>{{ expedientes2.nompro }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Modalidad de Estudios:</b></b-col>
                      <b-col>{{ expedientes2.modest }}</b-col>
                  </b-row>
              </fieldset>
              <fieldset>
                  <legend><center>INFORMACIÓN DEL EXPEDIENTE</center></legend>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Código del Expediente:</b></b-col>
                      <b-col>{{ expedientes2.codigo }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>URL del Trabajo de Investigación:</b></b-col>
                      <b-col>{{ expedientes2.url }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Procedencia del Bachiller:</b></b-col>
                      <b-col>{{ expedientes2.probac }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Grado Académico o Título Profesional:</b></b-col>
                      <b-col>{{ expedientes2.gratit }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Nombre completo del Trabajo de Investigación / Tesis / Trabajo de Suficiencia Profesional / Trabajo Académico:</b></b-col>
                      <b-col>{{ expedientes2.titulo }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Modalidad de Obtención del Grado o Título:</b></b-col>
                      <b-col>{{ expedientes2.modalidad }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Solicitud del Inicio del Trámite:</b></b-col>
                      <b-col>{{ expedientes2.fectra }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Sustentación / Aprobación del Grado o Título:</b></b-col>
                      <b-col>{{ expedientes2.fecsus }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Originalidad de la Investigación:</b></b-col>
                      <b-col>{{ expedientes2.oriinv }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Abreviatura Grado / título:</b></b-col>
                      <b-col>{{ expedientes2.abrtit }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Número de Resolución:</b></b-col>
                      <b-col>{{ expedientes.numres }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Resolución de Consejo Universitario:</b></b-col>
                      <b-col>{{ expedientes2.fecrescon }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Fecha Diploma Original:</b></b-col>
                      <b-col>{{ expedientes2.fecdip }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Número Diploma:</b></b-col>
                      <b-col>{{ expedientes2.numdip }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Tipo de Emisión del Diploma:</b></b-col>
                      <b-col>{{ expedientes2.fecdip }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Libro:</b></b-col>
                      <b-col>{{ expedientes2.lib }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Folio:</b></b-col>
                      <b-col>{{ expedientes2.fol }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Registro:</b></b-col>
                      <b-col>{{ expedientes2.reg }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Cargo1:</b></b-col>
                      <b-col>{{ expedientes2.car1 }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Autoridad1:</b></b-col>
                      <b-col>{{ expedientes2.aut1 }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Cargo2:</b></b-col>
                      <b-col>{{ expedientes2.car2 }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Autoridad2:</b></b-col>
                      <b-col>{{ expedientes2.aut2 }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Cargo3:</b></b-col>
                      <b-col>{{ expedientes2.car3 }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Autoridad3:</b></b-col>
                      <b-col>{{ expedientes2.aut3 }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Oficio:</b></b-col>
                      <b-col>{{ expedientes2.ofi }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Modalidad de Sustentación de la Tesis:</b></b-col>
                      <b-col>{{ expedientes2.modsus }}</b-col>
                  </b-row>
              </fieldset>
              <fieldset>
                  <legend><center>INFORMACIÓN DE ACREDITACIÓN</center></legend>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Programa Acreditado ante SINEACE:</b></b-col>
                      <b-col>{{ expedientes2.proacr }}</b-col>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Inicio de la Acreditación del Programa Académico:</b></b-col>
                      <b-col>{{ expedientes2.feciniacr }}</b-col>
                  </b-row>
                  <b-row>
                      <b-col sm="3" class="text-sm-right"><b>Fecha de Fin de la Acreditación del Programa Académico:</b></b-col>
                      <b-col>{{ expedientes2.fecfinacr }}</b-col>
                  </b-row>
              </fieldset>
            </b-card-body>
          </b-collapse>
        </b-card>
      </div>
    </div>
  </app-layout>
</template>

<script>
    import AppLayout from "./../../Layouts/AppLayout";
    import JetNavLink from "./../../Jetstream/NavLink";
    import FlashAlert from "./../../components/FlashAlert";

    export default {
    name: "expedientes.show",
    props: ["expedientes","expedientes2"],
    components: {
        AppLayout,
        JetNavLink,
        FlashAlert,
    },
    data() {
        return {
        api_url: this.$root.api_url,
        fields: [
            { key: "idrecurso", label: "Nombre", sortable: true },
            { key: "nombre_asignado", label: "Grado", sortable: true },
            { key: "nombre_archivo", label: "Grado", sortable: true },
            { key: "mime", label: "Grado", sortable: true },
            { key: "condicion", label: "Condición", class: "text-center" },
            { key: "acciones", label: "Acciones", class: "text-center" },
        ],
        estaOcupado: false,
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
        this.totalRows = this.expedientes.length;
    },
    methods: {
        onFiltered(filteredItems) {
        this.totalRows = filteredItems.length;
        this.currentPage = 1;
        },
    },
        getB64Str(buffer) {
        let binary = '';
        let bytes = new Uint8Array(buffer);
        let len = bytes.byteLength;
        
        for (let i = 0; i < len; i++) {
            binary += String.fromCharCode(bytes[i]);
        }

        return window.btoa(binary);
        },     
        resetearValores() {
        this.file = null;      
        this.opcion_documento = null;
        this.estaOcupado = false;
        this.resetParent();
        }, 
        resetParent() {
        this.$emit('reset');
        },
        mostrarDocumento: function (idrecurso){
        window.open(`${this.api_url}/expedientes/mostrar/${idrecurso}`,'_blank');     
        } 
    };
</script>
<style>
.custom-file-input:lang(es) ~ .custom-file-label::after {
  content: "Elegir";
}
</style>
