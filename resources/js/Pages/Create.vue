<template>
  <Head title="User create" />
  <div class="row">
    <h5 class="text-center font-weight-bold my-2">Create a new user</h5>
    <div class="container">
      <form @submit.prevent="submit">
        <div class="col-12 my-2">
          <label for="name">Name</label>
          <input
            type="text"
            v-model="form.name"
            class="form-control form-control-sm"
          />
        </div>
        <div class="col-12 my-2">
          <label for="email">E-mail</label>
          <input
            v-model="form.email"
            type="email"
            id="email"
            class="form-control form-control-sm"
          />
        </div>
        <div class="col-12 my-2">
          <label for="password">Passwotd</label>
          <input
            v-model="form.password"
            type="password"
            id="password"
            class="form-control form-control-sm"
          />
        </div>
        <div class="col-12 my-2">
          <button class="btn btn-sm btn-outline-primary" :disabled="form.processing">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
let form = useForm({
  name: "",
  email: "",
  password: "",
});

let submit = () => {
  form.post("/users", form);
};
</script>
