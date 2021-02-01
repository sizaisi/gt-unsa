<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Expedientes</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Expediente</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="actualizar">
                    <b-form-group
                        id="input-group-4"
                        label="Fecha1:"
                        label-for="input-4"
                    >
                        <b-form-input
                            id="input-4"
                            v-model="expediente.fecha1"
                            placeholder="Ingrese Fecha"
                            autocomplete="off"
                            type="date"
                        ></b-form-input>
                        <div
                            v-if="$page.errors.fecha1"
                            class="text-danger"
                        >
                            {{ $page.errors.fecha1[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-5"
                        label="Fecha2:"
                        label-for="input-5"
                    >
                        <b-form-input
                            id="input-5"
                            v-model="expediente.fecha2"
                            placeholder="Ingrese Fecha"
                            autocomplete="off"
                            type="date"
                        ></b-form-input>
                        <div v-if="$page.errors.fecha2" class="text-danger">
                            {{ $page.errors.fecha2[0] }}
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
    name: "expedientes.edit",
    props: ["expediente"],
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
            this.$inertia.post(`${this.api_url}/expedientes/${this.expediente.id}`, this.expediente);
        }
    }
};
</script>