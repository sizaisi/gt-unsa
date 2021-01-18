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
            <b-badge v-if="row.item.deleted_at == null" variant="success"
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
                @click="mostrarDocumento(row.item.idrecurso)"
                >
          <b-icon icon="eye"></b-icon>
        </b-button>
            <jet-nav-link
                v-if="row.item.deleted_at == null"
                class="btn btn-primary btn-sm"
                :href="`${api_url}/expedientes/mostrar/${row.item.idrecurso}`"
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
    props: ["expedientes"],
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
