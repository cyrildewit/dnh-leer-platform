<template>
  <footer>
     <div class="mt-4 border-t border-gray-400 flex flex-col items-center">
      <div class="container mx-auto px-6">
        <p class="py-6 text-sm text-center">&copy; {{ (new Date()).getFullYear() }} {{ $t('BrandDefault.footer.copyright') }}</p>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  //
}
</script>
