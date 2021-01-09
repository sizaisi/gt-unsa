<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../dashboard" class="brand-link">
            <img
                src="/../img/logounsablanco.png"
                alt="AdminLTE Logo"
                class="brand-image elevation-3"
                style="opacity: 0.8"
            />
            <span class="brand-text font-weight-light">SISGRAD</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <li class="nav-header has-treeview">ADMINISTRACIÓN</li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/usuarios`"                            
                            type="link"
                            :active="$page.currentRouteName == 'usuarios.index'"
                            ><i class="nav-icon fas fa-users"></i>
                            Usuarios</jet-nav-link
                        >
                    </li>
                    <li class="nav-header has-treeview">OFICINA GRADOS Y TÍTULOS</li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/colaciones`"                            
                            type="link"
                            :active="
                                $page.currentRouteName == 'colaciones.index'
                            "
                            ><i class="nav-icon fas fa-bezier-curve"></i> Colaciones
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/expedientes`"                            
                            type="link"
                            :active="
                                $page.currentRouteName == 'expedientes.index'
                            "
                            ><i class="nav-icon fas fa-bezier-curve"></i> Revisión de Expediente
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/colacionesexpedientes`"                            
                            type="link"
                            :active="
                                $page.currentRouteName == 'colacionesexpedientes.index'
                            "
                            ><i class="nav-icon fas fa-bezier-curve"></i> Colaciones-Expedientes
                        </jet-nav-link>
                    </li>
                    <li class="nav-header has-treeview">MANTENIMIENTO</li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/modalidades`"                            
                            type="link"
                            :active="
                                $page.currentRouteName == 'modalidades.index'
                            "
                            ><i class="nav-icon fas fa-bezier-curve"></i> Modalidades
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/autoridades`"                            
                            type="link"
                            :active="
                                $page.currentRouteName == 'autoridades.index'
                            "
                            ><i class="nav-icon fas fa-user-secret"></i> Autoridades
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/cargos`"                         
                            type="link"
                            :active="$page.currentRouteName == 'cargos.index'"
                            ><i class="nav-icon fas fa-chalkboard-teacher"></i> Cargos
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/roles`"                            
                            type="link"
                            :active="$page.currentRouteName == 'roles.index'"
                            ><i class="nav-icon fas fa-user-tag"></i> Roles
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/grados`"                            
                            type="link"
                            :active="$page.currentRouteName == 'grados.index'"
                            ><i class="nav-icon fas fa-graduation-cap"></i>
                            Grados ó Títulos
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link                            
                            :href="`${api_url}/cargosautoridades`"
                            type="link"
                            :active="
                                $page.currentRouteName ==
                                    'cargosautoridades.index'
                            "
                            ><i class="nav-icon fas fa-crosshairs"></i>
                            Cargo-Autoridad
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/gradosmodalidades/`"                            
                            type="link"
                            :active="
                                $page.currentRouteName ==
                                    'gradosmodalidades.index'
                            "
                            ><i class="nav-icon fas fa-align-left"></i>
                            Grado-Modalidad
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/procedimientos`"                            
                            type="link"
                            :active="$page.currentRouteName == 'gradosprocedimientos.index'"
                            ><i class="nav-icon fas fa-microchip"></i>
                            Procedimientos
                        </jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <jet-nav-link
                            :href="`${api_url}/rutas`"                            
                            type="link"
                            :active="$page.currentRouteName == 'rutas.index'"
                            ><i class="nav-icon fas fa-route"></i> Rutas
                        </jet-nav-link>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
<script>
import JetNavLink from "./../Jetstream/NavLink";

export default {
    components: {
        JetNavLink
    },
    data() {
        return {
            api_url: this.$root.api_url,
        };
    },
};
</script>
