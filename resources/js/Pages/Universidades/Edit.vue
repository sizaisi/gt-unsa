<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Universidades</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Universidad</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="actualizar">
                    <b-form-group id="input-group-2" label="Codigo de la Universidad:" label-for="input-2">
                        <b-form-input
                        id="input-2"
                        v-model="universidad.cod_universidad"
                        placeholder="cod_universidad"
                        autocomplete="off"
                        ></b-form-input>
                        <div v-if="$page.errors.cod_universidad" class="text-danger">
                        {{ $page.errors.cod_universidad[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group id="input-group-3" label="Razón Social:" label-for="input-3">
                        <b-form-input
                        id="input-3"
                        v-model="universidad.razon_social"
                        placeholder="razón social"
                        autocomplete="off"
                        ></b-form-input>
                        <div v-if="$page.errors.razon_social" class="text-danger">
                        {{ $page.errors.razon_social[0] }}
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
    name: "universidades.edit",
    props: ["universidad"],
    components: {
        AppLayout
    },
    data() {
        return {
            api_url: this.$root.api_url,
        };
    },
    methods: {
        actualizar() {
            this.$inertia.post(`${this.api_url}/universidades/${this.universidad.id}`, this.universidad);
        }
    }
};
</script>
