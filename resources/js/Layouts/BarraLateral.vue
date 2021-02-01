<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../dashboard" class="brand-link">
      <img
        :src="`${api_url}/img/logounsablanco.png`"
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
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    ADMINISTRACIÓN
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <jet-nav-link
                      :href="`${api_url}/usuarios`"
                      type="link"
                      :active="$page.currentRouteName == 'usuarios.index'"
                      ><i class="nav-icon fas fa-users"></i> Usuarios</jet-nav-link
                    >
                </li>
                <li class="nav-item">
                    <jet-nav-link
                      :href="`${api_url}/universidades`"
                      type="link"
                      :active="$page.currentRouteName == 'universidades.index'"
                      ><i class="nav-icon fas fa-users"></i> Universidades</jet-nav-link
                    >
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    GRADOS Y TÍTULOS
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/colaciones`"
                  type="link"
                  :active="$page.currentRouteName == 'colaciones.index'"
                  ><i class="nav-icon fab fa-leanpub"></i> Colaciones
                </jet-nav-link>
              </li>
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/expedientes`"
                  type="link"
                  :active="$page.currentRouteName == 'expedientes.index'"
                  ><i class="nav-icon fas fa-check-double"></i> Revisión de
                  Expediente
                </jet-nav-link>
              </li>
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/colacionesexpedientes`"
                  type="link"
                  :active="$page.currentRouteName == 'colacionesexpedientes.index'"
                  ><i class="nav-icon fas fa-object-group"></i>
                  Colaciones-Expedientes
                </jet-nav-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                    MANTENIMIENTO
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <jet-nav-link
                    :href="`${api_url}/autoridades`"
                    type="link"
                    :active="$page.currentRouteName == 'autoridades.index'"
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
                  :href="`${api_url}/cargosautoridades`"
                  type="link"
                  :active="$page.currentRouteName == 'cargosautoridades.index'"
                  ><i class="nav-icon fas fa-crosshairs"></i>
                  Cargo-Autoridad
                </jet-nav-link>
              </li>
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/cargosautoridades`"
                  type="link"
                  :active="$page.currentRouteName == 'cargosautoridades.index'"
                  ><i class="nav-icon fas fa-crosshairs"></i>
                  Programas Acreditados
                </jet-nav-link>
              </li>
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/cargosautoridades`"
                  type="link"
                  :active="$page.currentRouteName == 'cargosautoridades.index'"
                  ><i class="nav-icon fas fa-crosshairs"></i>
                  Denominaciones
                </jet-nav-link>
              </li>
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/tramites/`"
                  type="link"
                  :active="$page.currentRouteName == 'tramites.index'"
                  ><i class="nav-icon fas fa-align-left"></i>
                  Trámites
                </jet-nav-link>
              </li>
              <li class="nav-item">
                <jet-nav-link
                  :href="`${api_url}/procedimientos`"
                  type="link"
                  :active="$page.currentRouteName == 'procedimientos.index'"
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
    JetNavLink,
  },
  data() {
    return {
      api_url: this.$root.api_url,
    };
  },
};
</script>
