<template>
  <div class="">
    <SiteNav />

    <Nuxt />

    <SiteFooter />
  </div>
</template>

<script>
import SiteNav from '~/components/Layouts/BrandDefault/SiteNav';
import SiteHeader from '~/components/Layouts/BrandDefault/SiteHeader';
import SiteFooter from '~/components/Layouts/BrandDefault/SiteFooter';

export default {
  components: {
    SiteNav,
    SiteHeader,
    SiteFooter,
  },

  head: {
    bodyAttrs: {
      class: 'bg-gray-100 text-gray-900 leading-normal',
    },
  },
}
</script>
