<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Grados-Modalidades</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Grado-Modalidad</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="actualizar">
                    <b-form-group
                        id="input-group-1"
                        label="Grado:"
                        label-for="input-1"
                    >
                        <b-form-select
                            v-model="gradomodalidad.idgrado"
                            :options="grados"
                            id="input-1"
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
                        id="input-group-2"
                        label="Modalidad:"
                        label-for="input-2"
                    >
                        <b-form-select
                            v-model="gradomodalidad.idmodalidad"
                            :options="modalidades"
                            id="input-2"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div v-if="$page.errors.idmodalidad" class="text-danger">
                            {{ $page.errors.idmodalidad[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group id="input-group-3" label="Componente:" label-for="input-3">
                        <b-form-input
                            id="input-3"
                            v-model="gradomodalidad.componente"
                            placeholder="Nombre de componente"
                            autocomplete="off"
                        ></b-form-input>
                        <div v-if="$page.errors.componente" class="text-danger">
                            {{ $page.errors.componente[0] }}
                        </div>
                    </b-form-group>
                    <b-button type="submit" variant="success">Actualizar</b-button>
                </b-form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    name: "gradosmodalidades.edit",
    props: ["gradomodalidad", "grados", "modalidades"],
    components: {
        AppLayout
    },
    data() {
        return {
            api_url: this.$root.api_url            
        };
    },
    methods: {
        actualizar() {
            this.$inertia.post(`${this.api_url}/gradosmodalidades/${this.gradomodalidad.id}`, this.gradomodalidad);
        }
    }
};
</script>
