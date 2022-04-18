<template>
  <Head title="Permissions List" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Permissions <Link :href="route('permissions.create')" type="button" class="ml-5 btn btn-primary">Create new permission</Link>
      </h2>

    </template>

    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Permission name</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<tr v-for="permission in permissions" :key="permission.id">
			  <th scope="row">{{ permission.id }}</th>
			  <td>{{ permission.name }}</td>
			  <td>
				<div class="btn-group btn-group-sm" role="group" aria-label="CRUD">
				  <Link :href="route('permissions.show', permission.id)" type="button" class="btn btn-info">View</Link>
				  <Link :href="route('permissions.edit', permission.id)" type="button" class="btn btn-success">Edit</Link>
				  <button @click="destroy(permission.id)" type="button" class="btn btn-warning">Delete</button>
				</div>
			  </td>
			</tr>
		  </tbody>
		</table>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
	Link
  },
  props: {
	permissions: Array
  },
  setup() {
      const destroy = (id) => {
          if (confirm("Are you sure?")) {
              Inertia.delete(route('permissions.destroy', id))
          }
      }
      return {destroy}
  }
}
</script>
