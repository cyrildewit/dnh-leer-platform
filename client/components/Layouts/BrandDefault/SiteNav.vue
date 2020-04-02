<template>
  <nav class="bg-white shadow relative z-40">
    <div class="container mx-auto px-6">

      <div class="flex items-center justify-between h-20">
        <div class="flex-shrink-0">
          <div class="flex items-center">

            <nuxt-link :to="localePath('/')" class="flex flex-row items-center pr-3">
              <img src="~/assets/img/logo-icon-transparent-150x144.png" class="h-12" alt="Leer Platform Logo">
            </nuxt-link>

            <nuxt-link :to="localePath('catalog')" class="flex flex-row items-center px-3 py-2 font-medium rounded-md hover:text-gray-600 focus:outline-none focus:text-gray-800">
              {{ $t('BrandDefault.nav.catalog') }}
            </nuxt-link>

            <nuxt-link :to="localePath('topics')" class="flex flex-row items-center px-3 py-2 font-medium rounded-md hover:text-gray-600 focus:outline-none focus:text-gray-800">
              {{ $t('BrandDefault.nav.topics') }}
            </nuxt-link>

          </div>
        </div>

        <div class="flex items-center">

        <div class="flex items-center ml-2">
            <div class="relative ml-3">
              <button @click="navigation.local.open = !navigation.local.open " class="flex items-center max-w-xs font-medium focus:outline-none focus:shadow-solid" aria-label="User menu" aria-haspopup="true">
                <span class="hover:text-gray-600 focus:outline-none focus:text-gray-800"><font-awesome-icon icon="flag" size="sm" /> {{ $i18n.locale.toUpperCase() }}</span>
              </button>

              <div v-show="navigation.local.open" class="absolute right-0 w-40 mt-2 origin-top-right rounded-md shadow-lg">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <nuxt-link v-for="locale in availableLocales" :key="locale.code" :to="switchLocalePath(locale.code)" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    <span class="ml-2">{{ locale.name }}</span>
                  </nuxt-link>
                </div>
              </div>
            </div>
          </div>

          <template v-if="! $auth.loggedIn">
            <nuxt-link :to="localePath('login')" class="flex flex-row items-center px-3 py-2 font-medium rounded-md hover:text-gray-600 focus:outline-none focus:text-gray-800">
              {{ $t('BrandDefault.nav.login') }}
            </nuxt-link>

            <nuxt-link :to="localePath('register')" class="flex flex-row items-center px-3 py-2 font-medium rounded-md hover:text-gray-600 focus:outline-none focus:text-gray-800">
              {{ $t('BrandDefault.nav.register') }}
            </nuxt-link>
          </template>

          <template v-else>
            <div class="flex items-center ml-2">
              <div class="relative ml-3">
                <div>
                  <button @click="navigation.profile.open = !navigation.profile.open " class="flex items-center max-w-xs font-medium focus:outline-none focus:shadow-solid" aria-label="User menu" aria-haspopup="true">
                    <span class="mr-3 hover:text-gray-600 focus:outline-none focus:text-gray-800">{{ $auth.user.name }}</span>

                    <img class="w-10 h-10 rounded-full" :src="$auth.user.avatar" alt="Profile Picture" />
                  </button>
                </div>

                <div v-show="navigation.profile.open" class="absolute right-0 w-48 mt-2 origin-top-right rounded-md shadow-lg">
                  <div class="py-1 bg-white rounded-md shadow-xs">
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                      <span class="ml-2">{{ $t('BrandDefault.nav.your_profile') }}</span>
                    </a>

                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                      <span class="ml-2">{{ $t('BrandDefault.nav.settings') }}</span>
                    </a>

                    <a @click="logout" href="#" class="w-100 flex flex-row items-center px-4 py-2 text-sm text-red-500 hover:text-red-700 hover:bg-red-100 focus:outline-none focus:text-red-700 focus:bg-red-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                      <span class="ml-2">{{ $t('BrandDefault.nav.logout') }}</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </template>

        </div>

      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data: () => ({
    navigation: {
      profile: {
        open: false,
      },
      local: {
        open: false,
      }
    },
  }),

  computed: {
    availableLocales () {
      return this.$i18n.locales.filter(i => i.code !== this.$i18n.locale)
    },
  },

  methods: {
    logout() {
      this.$auth.logout();
    }
  },
}
</script>
