<template>
  <div class="py-8">
    <div class="container mx-auto px-6">

      <div class="w-md mx-auto">
        <h1>Register</h1>

        <!-- <form @submit.prevent="login">
          <input v-model="form.email" class="bg-gray-300" />
          <br>
          <input v-model="form.password" class="bg-gray-300" />

          <button>Login</button>
        </form> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Register',

  // auth: 'guest',

  layout: 'BrandDefault',

  data: () => ({
    form: {
      // email: 'cyril@example.com',
      // password: 'secret',
    },
  }),

  methods: {
    // async login() {
    //   this.$auth.loginWith('userApi', {
    //     data: {
    //       email: this.form.email,
    //       password: this.form.password,
    //     },
    //   })
    // }
  },
}
</script>
