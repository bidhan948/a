<template>
  <h1 class="text-center my-4">hello {{ $page.props.auth.user.username }}</h1>
  <div class="table-responsive">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-3 my-2">
              <input
                v-model="search"
                type="text"
                class="form-control form-control-sm"
                placeholder="search"
              />
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">S.no</th>
                  <th scope="col">Name</th>
                  <th scope="col">E-mail</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(user, key) in users.data" :key="user.id">
                  <td class="text-cen">{{ key + 1 }}</td>
                  <td class="text-cen">{{ user.name }}</td>
                  <td class="text-cen">{{ user.email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <Paginator :links="users.links" class="mt-3" />
        </div>
      </div>
    </div>
  </div>
  <p style="margin-top: 600px" class="text-center">
    the current time is : {{ time }}
    <!-- <Link href="/" class="btn btn-sm btn-primary">Refresh</Link> -->
  </p>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { ref } from "@vue/reactivity";
import { watch } from "@vue/runtime-core";
import Paginator from "../Shared/Paginator.vue";
defineProps({ users: Object, time: String });
let search = ref("");
watch(search, (value) => {
  Inertia.get("/", { search: value }, { preserveState: true });
});
</script>