<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="login">
      <input v-model="form.email" class="bg-gray-300" />
      <br>
      <input v-model="form.password" class="bg-gray-300" />

      <button>Login</button>
    </form>
  </div>
</template>

<script>
export default {
  // middleware: 'guest',

  data: () => ({
    form: {
      email: 'cyril@example.com',
      password: 'secret',
    },
    remember: false,
  }),

  methods: {
    async login() {
      this.$auth.loginWith('userApi', {
        data: {
          email: this.form.email,
          password: this.form.password,
        },
      })
    }
  },
}
</script>
