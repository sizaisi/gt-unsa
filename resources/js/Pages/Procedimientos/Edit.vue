<template>
    <app-layout>
        <template #icon_title>
            <i class="fa fa-box fa-fw"></i>
        </template>
        <template #title>Procedimientos</template>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Procedimiento</h3>
            </div>
            <div class="card-body">
                <b-form @submit.prevent="actualizar">
                    <b-form-group
                        id="input-group-1"
                        label="Nombre:"
                        label-for="input-1"
                    >
                        <b-form-input
                            id="input-1"
                            v-model="procedimiento.nombre"
                            placeholder="Nombre del procedimiento"
                            autocomplete="off"
                        ></b-form-input>
                        <div v-if="$page.errors.nombre" class="text-danger">
                            {{ $page.errors.nombre[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-2"
                        label="Grado-Modalidad:"
                        label-for="input-2"
                    >
                        <b-form-select
                            v-model="procedimiento.idgradomodalidad"
                            :options="gradosmodalidades"
                            id="input-2"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div
                            v-if="$page.errors.idgradomodalidad"
                            class="text-danger"
                        >
                            {{ $page.errors.idgradomodalidad[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-4"
                        label="Rol:"
                        label-for="input-4"
                    >
                        <b-form-select
                            v-model="procedimiento.idrol"
                            :options="roles"
                            id="input-4"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div v-if="$page.errors.idrol" class="text-danger">
                            {{ $page.errors.idrol[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-5"
                        label="Tipo-Rol:"
                        label-for="input-5"
                        v-if="procedimiento.idrol == 4"
                    >
                        <b-form-select
                            v-model="procedimiento.tipo_rol"
                            :options="['asesor', 'jurado']"
                            id="input-5"
                        >
                            <template v-slot:first>
                                <option :value="null" disabled>
                                    -- Por favor seleccione una opción --
                                </option>
                            </template>
                        </b-form-select>
                        <div v-if="$page.errors.tipo_rol" class="text-danger">
                            {{ $page.errors.tipo_rol[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-7"
                        label="Componente:"
                        label-for="input-7"
                    >
                        <b-form-input
                            id="input-7"
                            v-model="procedimiento.componente"
                            placeholder="Url del Formulario"
                            autocomplete="off"
                        ></b-form-input>
                        <div
                            v-if="$page.errors.componente"
                            class="text-danger"
                        >
                            {{ $page.errors.componente[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-8"
                        label="Orden:"
                        label-for="input-8"
                    >
                        <b-form-input
                            id="input-8"
                            v-model="procedimiento.orden"
                            placeholder="Orden"
                            autocomplete="off"
                        ></b-form-input>
                        <div v-if="$page.errors.orden" class="text-danger">
                            {{ $page.errors.orden[0] }}
                        </div>
                    </b-form-group>
                    <b-form-group
                        id="input-group-9"
                        label="Descripción:"
                        label-for="input-9"
                    >
                        <b-form-input
                            id="input-9"
                            v-model="procedimiento.descripcion"
                            placeholder="Descripción"
                            autocomplete="off"
                        ></b-form-input>
                        <div
                            v-if="$page.errors.descripcion"
                            class="text-danger"
                        >
                            {{ $page.errors.descripcion[0] }}
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
    name: "procedimientos.edit",
    props: ["procedimiento", "gradosmodalidades", "roles"],
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
            this.$inertia.post(
                `${this.api_url}/procedimientos/${this.procedimiento.id}`,
                this.procedimiento
            );
        }
    }
};
</script>
