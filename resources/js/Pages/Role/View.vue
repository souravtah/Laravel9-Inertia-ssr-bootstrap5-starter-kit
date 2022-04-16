<template>
  <Head title="Roles View" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Role name : {{ role_name }}
      </h2>

    </template>

    <div class="card">
    <h5 class="card-header">This role can do the followings:</h5>
    <div class="card-body">
        <h5 class="card-title">{{ role_name }}</h5>
        <p class="card-text">{{ permissions.join(', ') }}</p>
        <Link :href="route('roles.index')" class="btn btn-primary">Back</Link>
    </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
	Link
  },
  props: {
	role_name: String,
    permissions: Array
  }
}
</script>
