<template>
  <div>
    <b-alert
      v-if="$page.flash.successMessage"
      :show="dismissCountDown"
      dismissible
      variant="success"
      @dismissed="dismissCountDown = 0"
      @dismiss-count-down="countDownChanged"
    >
      {{ $page.flash.successMessage }}
    </b-alert>
    <b-alert
      v-else-if="$page.flash.errorMessage"
      :show="dismissCountDown"
      dismissible
      variant="danger"
      @dismissed="dismissCountDown = 0"
      @dismiss-count-down="countDownChanged"
    >
      {{ $page.flash.errorMessage }}
    </b-alert>
  </div>
</template>
<script>
export default {
  name: "flash-alert",
  data() {
    return {
      dismissCountDown: 5,
    };
  },
  methods: {
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
  },
};
</script>
