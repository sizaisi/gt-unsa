<template>
  <app-layout>
    <template #icon_title>
      <i class="fa fa-sm fa-fw fa-home"></i>
    </template>
    <template #title>Inicio</template>

    <div class="card">
      <b-img-lazy
        v-bind="{ width: 800, height: 1000 }"
        :src="`${api_url}/img/dashboardsisgrad.png`"
        center
        alt="Center image"
      ></b-img-lazy>
      <!--<div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
            data-toggle="tooltip"
            title="Collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="remove"
            data-toggle="tooltip"
            title="Remove"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">Start creating your amazing application!</div>
      <div class="card-footer">Footer</div>-->
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
  data() {
    return {
      api_url: this.$root.api_url,
    };
  },
};
</script>
