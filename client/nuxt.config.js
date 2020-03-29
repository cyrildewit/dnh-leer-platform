
export default {
  mode: 'spa',

  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      // { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },

  /*
  ** Global CSS
  */
  css: [
  ],

  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/font-awesome',
    '~/plugins/vee-validate',
  ],

  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    '@nuxtjs/moment',
    '@nuxtjs/tailwindcss',
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    'nuxt-i18n',
    '@nuxtjs/axios',
    '@nuxtjs/dotenv',
    '@nuxtjs/auth',
    'nuxt-validate',
  ],

  moment: {
    defaultLocale: 'nl',
    locales: ['nl'],
  },

  i18n: {
    locales: [
      {
        name: 'Dutch',
        code: 'nl',
        iso: 'nl-NL',
        file: 'nl-NL.js',
      },
      {
        name: 'English',
        code: 'en',
        iso: 'en-GB',
        file: 'en-GB.js',
      },
    ],
    defaultLocale: 'nl',
    lazy: true,
    langDir: 'locales/',
    detectBrowserLanguage: {
      useCookie: true,
      cookieKey: 'i18n_redirected',
    },
    vueI18n: {
      fallbackLocale: 'nl',
    }
  },

  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
  },

  nuxtValidate: {
    lang: 'nl',
    nuxti18n: {
      locale: {
        'nl-NL': 'nl_NL',
      }
    }
  },

  /*
  ** Build configuration
  */
  build: {
    postcss: {
      plugins: {
        'postcss-import': {},
        'postcss-url': {},
        'postcss-nested': {},
        'postcss-simple-vars': {},
      },
    },

    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  }
}
