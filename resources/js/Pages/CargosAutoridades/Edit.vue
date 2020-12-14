<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Cargos-Autoridades</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Cargo-Autoridad</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="actualizar">
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
                        >Actualizar</b-button
                    >
                </b-form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    name: "cargosautoridades.edit",
    props: ["cargoautoridad", "cargos", "autoridades"],
    components: {
        AppLayout
    },
    methods: {
        actualizar() {
            this.$inertia.post(
                `/cargosautoridades/${this.cargoautoridad.id}`,
                this.cargoautoridad
            );
        }
    }
};
</script>
