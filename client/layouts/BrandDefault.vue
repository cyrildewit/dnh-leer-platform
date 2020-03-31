<template>
  <div class="font-body">
    <SiteHeader />

    <Nuxt />

    <SiteFooter />
  </div>
</template>

<script>
import SiteHeader from '~/components/Layouts/BrandDefault/SiteHeader';
import SiteFooter from '~/components/Layouts/BrandDefault/SiteFooter';

export default {
  components: {
    SiteHeader,
    SiteFooter,
  },
}
</script>
