<template>
  <Head title="Email Verification" />

  <div class="card-body">
    <div class="mb-3 small text-muted">
      Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>

    <div class="alert alert-success" role="alert" v-if="verificationLinkSent" >
      A new verification link has been sent to the email address you provided during registration.
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 d-flex justify-content-between">
        <breeze-button :class="{ 'text-white-50': form.processing }" :disabled="form.processing">
          <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
            
          Resend Verification Email
        </breeze-button>

        <Link :href="route('logout')" method="post" as="button" class="btn btn-link">Log out</Link>
      </div>
    </form>
  </div>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeGuestLayout from "@/Layouts/Guest.vue"
    import { Head, Link } from '@inertiajs/inertia-vue3'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            Head,
            Link,
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form()
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('verification.send'))
            },
        },

        computed: {
            verificationLinkSent() {
                return this.status === 'verification-link-sent';
            }
        }
    }
</script>
