<template>
  <Component
    :is="link.url ? 'Link' : 'span'"
    v-for="(link, index) in links"
    :key="index"
    v-html="link.label"
    class="px-1"
    :href="link.url"
  />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: { Link },
  props: { links: Array },
};
</script>
