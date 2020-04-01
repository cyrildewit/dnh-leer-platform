<template>
  <nav class="bg-white shadow">
    <div class="container mx-auto px-6">

      <div class="flex items-center justify-between h-20">
        <div class="flex-shrink-0">
          <div class="flex items-center">

            <nuxt-link to="/" class="flex flex-row items-center pr-3">
              <img src="~/assets/img/logo-icon-transparent-150x144.png" class="h-12" alt="Leer Platform Logo">
            </nuxt-link>

            <nuxt-link to="/catalog" class="flex flex-row items-center px-3 py-2 font-medium rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
              Catalogus
            </nuxt-link>

            <nuxt-link to="/subjects" class="flex flex-row items-center px-3 py-2 font-medium rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
              Onderwerpen
            </nuxt-link>

          </div>
        </div>

        <div class="flex items-center">

          <template v-if="! $auth.loggedIn">
            <nuxt-link to="/login" class="flex flex-row items-center px-3 py-2 font-medium rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
              Inloggen
            </nuxt-link>

            <nuxt-link to="/register" class="flex flex-row items-center px-3 py-2 font-medium rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
              Registreren
            </nuxt-link>
          </template>

        </div>

      </div>
    </div>
  </nav>
</template>

<script>
export default {
  //
}
</script>
