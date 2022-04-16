<template>
  <Head title="Permissions" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Permissions
      </h2>
    </template>

    <div class="card shadow-sm">
      <div class="card-body">
        You're logged in as {{ auth.user.name }}, with {{ roles.join(', ') }} roles. You are permitted to {{ permissions.join(', ') }}.
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  props: {
	auth: Object,
	roles: Array,
	permissions: Array,
  }
}
</script>
