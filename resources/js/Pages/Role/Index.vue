<template>
  <Head title="Roles List" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Roles <Link :href="route('roles.create')" type="button" class="ml-5 btn btn-primary">Create new role</Link>
      </h2>

    </template>

    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Role name</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<tr v-for="role in roles" :key="role.id">
			  <th scope="row">{{ role.id }}</th>
			  <td>{{ role.name }}</td>
			  <td>
				<div class="btn-group btn-group-sm" role="group" aria-label="CRUD">
				  <Link :href="route('roles.show', [role.id])" type="button" class="btn btn-info">View</Link>
				  <Link :href="route('roles.edit', [role.id])" type="button" class="btn btn-success">Edit</Link>
				  <Link :href="route('roles.destroy', [role.id])" method="DELETE" type="button" class="btn btn-warning">Delete</Link>
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

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
	Link
  },
  props: {
	roles: Array
  }
}
</script>
