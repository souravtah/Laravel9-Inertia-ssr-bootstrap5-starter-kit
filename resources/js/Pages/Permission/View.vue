<template>
  <Head title="Permissions View" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Permission name : {{ permission.name }}
      </h2>

    </template>

    <div class="card">
    <h5 class="card-header">This permission details are as follows:</h5>
    <div class="card-body">
        <h5 class="card-title">{{ permission }}</h5>
        <Link :href="route('permissions.index')" class="btn btn-primary">Back</Link>
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
    permission: String
  }
}
</script>
