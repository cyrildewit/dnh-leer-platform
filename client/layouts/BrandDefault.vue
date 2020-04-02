<template>
  <div class="">
    <SiteNav />

    <Nuxt />

    <SiteFooter />
  </div>
</template>

<script>
import SiteNav from '~/components/Layouts/BrandDefault/SiteNav';
import SiteFooter from '~/components/Layouts/BrandDefault/SiteFooter';

export default {
  components: {
    SiteNav,
    SiteFooter,
  },

  head: {
    bodyAttrs: {
      class: 'text-gray-900 leading-normal',
    },
  },
}
</script>
