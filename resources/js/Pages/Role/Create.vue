<template>
  <Head title="Roles Create" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Create role
      </h2>

    </template>

    <div class="card shadow-sm">
      <div class="card-body">
        <form @submit.prevent="form.post(route('roles.store'))">
			<div class="row mb-4">
				<div class="col">
				  <div class="form-outline">
					<label class="form-label" for="role_name">Role name</label>
					<input type="text" name="role_name" id="role_name" class="form-control" v-model="form.role_name"/>
				  </div>
				</div>
			</div>

			<label class="form-label" for="permission_list">Assign one/multiple permissions to this role:</label>
			<br />
			<!-- Checkbox -->
			<div id="permission_list" v-for="permission in permission_list" :key="permission.id" class="form-check form-check-inline">

			  <input class="form-check-input" :value=permission.name type="checkbox" id="inlineCheckbox{{ permission.id }}" v-model="form.selectedPermissions"/>

			  <label class="form-check-label" for="inlineCheckbox{{ permission.id }}">{{ permission.name }}</label>
			</div>
			<br />
		  <!-- Submit button -->
		  <button type="submit" :disabled="form.processing" class="btn btn-primary btn-block my-4">Save Role</button>
		</form>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
	Link
  },
  props: {
	permission_list: Array
  },
  setup() {
	const form = useForm({
		role_name: "",
		selectedPermissions: [],
	})
	return { form }
  }
}
</script>
