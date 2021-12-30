<template>
  <Nav />
  <div class="row">
    <slot />
  </div>
</template>
<script>
import Nav from "./Nav";
export default {
  components: {
    Nav,
  },
};
</script>