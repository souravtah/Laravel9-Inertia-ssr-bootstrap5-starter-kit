<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
      <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
          <Link :href="route('dashboard')">
            <breeze-application-logo width="36" />
          </Link>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
            <breeze-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
              Dashboard
            </breeze-nav-link>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav align-items-baseline">
            <!-- Authentication Links -->
            <breeze-dropdown id="settingsDropdown">
              <template #trigger>
                {{ $page.props.auth.user.name }}

                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </template>

              <template #content>
                <!-- Authentication -->
                <breeze-dropdown-link @click="logout" as="button">
                  Log Out
                </breeze-dropdown-link>
              </template>
            </breeze-dropdown>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Heading -->
    <header class="d-flex py-3 bg-white shadow-sm border-bottom">
      <div class="container">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <main class="container my-5">
      <slot />
    </main>
  </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    BreezeApplicationLogo,
    BreezeDropdown,
    BreezeDropdownLink,
    BreezeNavLink,
    Link,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    }
  },

  methods: {
    logout() {
      Inertia.post(route("logout"));
    }
  },
}
</script>
