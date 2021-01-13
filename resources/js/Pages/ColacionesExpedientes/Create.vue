<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Colaciones - Expedientes</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nuevo Colaciones - Expedientes</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="registrar">
                    <div class="card-body">
                        <hr class="bg-secondary" />
                        <flash-alert />
                        <b-form-group
                        label="Selection mode:"
                        label-for="table-select-mode-select"
                        label-cols-md="4"
                        >
                        <b-form-select
                            id="table-select-mode-select"
                            v-model="selectMode"
                            :options="modes"
                            class="mb-3"
                        ></b-form-select>
                        </b-form-group>
                        <b-table
                        :items="expedientes"
                        :fields="fields"
                        :select-mode="multi"
                        responsive="sm"
                        ref="selectableTable"
                        selectable
                        @row-selected="onRowSelected"
                        >
                        Example scoped slot for select state illustrative purposes
                        <template #cell(selected)="{ rowSelected }">
                            <template v-if="rowSelected">
                            <span aria-hidden="true">&check;</span>
                            <span class="sr-only">Selected</span>
                            </template>
                            <template v-else>
                            <span aria-hidden="true">&nbsp;</span>
                            <span class="sr-only">Not selected</span>
                            </template>
                        </template>
                        </b-table>
                        <p>
                        <b-button size="sm" @click="selectAllRows">Select all</b-button>
                        <b-button size="sm" @click="clearSelected">Clear selected</b-button>
                        <b-button size="sm" @click="selectThirdRow">Select 3rd row</b-button>
                        <b-button size="sm" @click="unselectThirdRow">Unselect 3rd row</b-button>
                        </p>
                        <p>
                        Selected Rows:<br>
                        {{ selected }}
                        </p>
                    </div>
                    <b-form-group
                        id="input-group-2"
                        label="Cargo:"
                        label-for="input-2"
                    >
                        <b-form-select
                            v-model="cargoautoridad.idcargo"
                            :options="cargos"
                            id="input-2"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div v-if="$page.errors.idcargo" class="text-danger">
                            {{ $page.errors.idcargo[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-3"
                        label="Autoridad:"
                        label-for="input-3"
                    >
                        <b-form-select
                            v-model="cargoautoridad.idautoridad"
                            :options="autoridades"
                            id="input-3"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div
                            v-if="$page.errors.idautoridad"
                            class="text-danger"
                        >
                            {{ $page.errors.idautoridad[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-4"
                        label="Fecha de Inicio:"
                        label-for="input-4"
                    >
                        <b-form-input
                            id="input-4"
                            v-model="cargoautoridad.fecha_inicio"
                            placeholder="Ingrese Fecha"
                            autocomplete="off"
                            type="date"
                        ></b-form-input>
                        <div
                            v-if="$page.errors.fecha_inicio"
                            class="text-danger"
                        >
                            {{ $page.errors.fecha_inicio[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-5"
                        label="Fecha de Fin:"
                        label-for="input-5"
                    >
                        <b-form-input
                            id="input-5"
                            v-model="cargoautoridad.fecha_fin"
                            placeholder="Ingrese Fecha"
                            autocomplete="off"
                            type="date"
                        ></b-form-input>
                        <div v-if="$page.errors.fecha_fin" class="text-danger">
                            {{ $page.errors.fecha_fin[0] }}
                        </div>
                    </b-form-group>
                    <b-button type="submit" variant="success"
                        >Registrar</b-button
                    >
                </b-form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    name: "colacionesexpedientes.create",
    props: ["colaciones", "expedientes"],
    components: {
        AppLayout
    },
    data() {
        return {
            api_url: this.$root.api_url,
            colacionexpediente: {
                idcolacion: null,
                idexpediente: null,
            }
        };
    },
    methods: {
        registrar() {
            this.$inertia.post(`${this.api_url}/colacionesexpedientes`, this.colacionexpediente);
        }
    }
};
</script>
