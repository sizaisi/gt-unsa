<template>
  <div class="wrapper">
    <menu-horizontal />
    <barra-lateral />

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) 
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                <slot name="icon_title"></slot> <slot name="title"></slot>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
              </ol>
            </div>
          </div>
        </div>
      </section>-->

      <!-- Page Content -->
      <main>
        <slot></slot>
      </main>
    </div>
    <!-- /.content-wrapper -->

    <pie-pagina></pie-pagina>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
</template>

<script>
import MenuHorizontal from "./MenuHorizontal";
import BarraLateral from "./BarraLateral";
import PiePagina from "./PiePagina";

export default {
  components: {
    MenuHorizontal,
    BarraLateral,
    PiePagina,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        "/current-team",
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      axios.post("/logout").then((response) => {
        window.location = "/";
      });
    },
  },

  computed: {
    path() {
      return window.location.pathname;
    },
  },
};
</script>
