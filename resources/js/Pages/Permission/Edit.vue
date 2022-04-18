<template>
  <Head title="Permission Edit" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Edit permission
      </h2>

    </template>

    <div class="card shadow-sm">
      <div class="card-body">
        <form @submit.prevent="form.put(route('permissions.update', form.id))">
			<div class="row mb-4">
				<div class="col">
				  <div class="form-outline">
					<label class="form-label" for="permission_name">Permission name</label>
					<input type="text" name="permission_name" id="permission_name" class="form-control" v-model="form.permission_name"/>
                    <div class="text-danger">{{ errors.permission_name }}</div>
                  </div>
				</div>
			</div>
		  <!-- Submit button -->
		  <button type="submit" :disabled="form.processing" class="btn btn-primary btn-block my-4">Save permission</button>

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
    permission: Object,
    errors: Object
  },
  setup(props) {
	const form = useForm({
        id: props.permission.id,
		permission_name: props.permission.name,
	})
	return { form }
  }
}
</script>
