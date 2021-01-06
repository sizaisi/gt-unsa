<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Rutas</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mostrar Ruta</h3>
            </div>
            <div class="card-body">
                <b-form>
                    <b-form-group
                        id="input-group-1"
                        label="Grado-Modalidad:"
                        label-for="input-1"
                    >
                        <b-form-input
                            id="input-1"
                            v-model="ruta.grado_modalidad"
                            readonly
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        id="input-group-2"
                        label="Procedimiento origen:"
                        label-for="input-2"
                    >
                        <b-form-input
                            id="input-2"
                            v-model="ruta.proc_origen"
                            readonly
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        id="input-group-3"
                        label="Procedimiento destino:"
                        label-for="input-3"
                    >
                        <b-form-input
                            id="input-3"
                            v-model="ruta.proc_destino"
                            readonly
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        id="input-group-4"
                        label="Etiqueta:"
                        label-for="input-4"
                    >
                        <b-form-input
                            id="input-4"
                            v-model="ruta.etiqueta"
                            readonly
                        ></b-form-input>
                    </b-form-group>
                </b-form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    name: "rutas.show",
    props: ["ruta"],
    components: {
        AppLayout
    }
};
</script>
