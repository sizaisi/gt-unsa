<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Grados-Modalidades</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nuevo Grado-Modalidad</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="registrar">
                    <b-form-group
                        id="input-group-3"
                        label="Grado:"
                        label-for="input-3"
                    >
                        <b-form-select
                            v-model="gradomodalidad.idgrado"
                            :options="grados"
                            id="input-3"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div v-if="$page.errors.idgrado" class="text-danger">
                            {{ $page.errors.idgrado[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-4"
                        label="Modalidad:"
                        label-for="input-4"
                    >
                        <b-form-select
                            v-model="gradomodalidad.idmodalidad"
                            :options="modalidades"
                            id="input-4"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div
                            v-if="$page.errors.idmodalidad"
                            class="text-danger"
                        >
                            {{ $page.errors.idmodalidad[0] }}
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
    name: "gradosmodalidades.create",
    props: ["grados", "modalidades"],
    components: {
        AppLayout
    },
    data() {
        return {
            gradomodalidad: {
                idgrado: null,
                idmodalidad: null
            }
        };
    },
    methods: {
        registrar() {
            this.$inertia.post(`/gradosmodalidades`, this.gradomodalidad);
        }
    }
};
</script>
