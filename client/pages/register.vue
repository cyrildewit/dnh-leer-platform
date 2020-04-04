<template>
  <div class="py-8 bg-gray-100">

    <div class="w-full max-w-xs mx-auto">
      <ValidationObserver ref="formValidationObserver" v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(createAccount)" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <ValidationProvider name="name" rules="required" v-slot="{ errors }">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Naam
              </label>
              <input name="name" :class="{ 'border-red-500': errors.length > 0 }" v-model="form.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Naam">
            </div>
          </ValidationProvider>

          <ValidationProvider name="email" rules="required" v-slot="{ errors }">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email
              </label>
              <input name="email" :class="{ 'border-red-500': errors.length > 0 }" v-model="form.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
            </div>
          </ValidationProvider>

          <ValidationProvider name="password" rules="required" v-slot="{ errors }">
            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
              </label>
              <input name="password" :class="{ 'border-red-500': errors.length > 0 }" v-model="form.password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
              <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
            </div>
          </ValidationProvider>

          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              {{ $t('loginPage.loginButton') }}
            </button>
          </div>
        </form>
      </ValidationObserver>
    </div>

  </div>
</template>

<script>
import axios from 'axios'
import { ValidationProvider, ValidationObserver } from 'vee-validate'

export default {
  name: 'Register',

  layout: 'BrandDefault',

  components: {
    ValidationProvider,
    ValidationObserver,
  },

  data: () => ({
    form: {
      name: 'John Doe',
      email: 'test@example.com',
      username: 'johndoe',
      password: '123456789',
      password_confirmation: '123456789',
    },
  }),

  methods: {
    async createAccount() {
      try {
        // Create user account
        const { data } = await axios.post('http://dnh-leer-platform.test/api/v1/auth/register', this.form)
      } catch (error) {
        if (error.response.data.errors) {
          this.$refs.formValidationObserver.setErrors(error.response.data.errors)
        }

        return;
      }

      // Log in the user
      this.$auth.loginWith('userApi', {
          data: {
              email: this.form.email,
              password: this.form.password,
          },
      })

      // Redirect to next step
      this.$router.push(this.localePath({ path: 'catalog' }))
    }
  },
}
</script>
