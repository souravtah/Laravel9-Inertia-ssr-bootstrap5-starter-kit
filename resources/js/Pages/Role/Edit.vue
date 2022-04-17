<template>
  <Head title="Roles Edit" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Edit role
      </h2>

    </template>

    <div class="card shadow-sm">
      <div class="card-body">
        <form @submit.prevent="form.put(route('roles.update', form.id))">
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
			<div id="permission_list" v-for="(permission, index) in all_permissions" :key="permission._id" class="form-check form-check-inline">

                <input class="form-check-input"
                :value=permission
                type="checkbox"
                id="inlineCheckbox{{ index }}"
                v-model="form.selectedPermissions"
                v-if="granted_permission_list[index] === permission"
                checked
                >

                <input class="form-check-input"
                :value=permission
                type="checkbox"
                id="inlineCheckbox{{ index }}"
                v-model="form.selectedPermissions"
                v-else
                >

			  <label class="form-check-label" for="inlineCheckbox{{ index }}">{{ permission }}</label>
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
    role: Object,
	granted_permission_list: Object,
    all_permissions: Object
  },
  setup(props) {
	const form = useForm({
        id: props.role.id,
		role_name: props.role.name,
		selectedPermissions: []
	})
	return { form }
  }
}
</script>
