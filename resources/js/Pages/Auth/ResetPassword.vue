<template>
  <Head title="Reset Password" />

  <div class="card-body">

    <breeze-validation-errors class="mb-3" />

    <form @submit.prevent="submit">
      <div class="mb-3">
        <breeze-label for="email" value="Email" />
        <breeze-input id="email" type="email" v-model="form.email" required autofocus />
      </div>

      <div class="mb-3">
        <breeze-label for="password" value="Password" />
        <breeze-input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
      </div>

      <div class="mb-3">
        <breeze-label for="password_confirmation" value="Confirm Password" />
        <breeze-input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
      </div>

      <div class="mb-0">
        <div class="d-flex justify-content-end">
          <breeze-button :class="{ 'text-white-50': form.processing }" :disabled="form.processing">
            <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            
            Reset Password
          </breeze-button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from "@/Layouts/Guest.vue"
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head } from '@inertiajs/inertia-vue3'

export default {
  layout: BreezeGuestLayout,

  components: {
    Head,
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
  },

  props: {
    email: String,
    token: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: '',
        password_confirmation: '',
      })
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.update'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    }
  }
}
</script>
