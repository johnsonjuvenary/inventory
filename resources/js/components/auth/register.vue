<template>
  <div class="row justify-content-center">
    <div class="col-xl-4 col-lg-4 col-md-4">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                </div>
                <form class="user" @submit.prevent="register">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputFirstName"
                      placeholder="Enter Full Name"
                      v-model="form.name"
                    />
                    <small class="text-danger" v-if="errors.name">{{
                      errors.name[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Enter Email Address"
                      v-model="form.email"
                    />
                    <small class="text-danger" v-if="errors.email">{{
                      errors.email[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword"
                      placeholder="Password"
                      v-model="form.password"
                    />
                    <small class="text-danger" v-if="errors.password">{{
                      errors.password[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPasswordRepeat"
                      placeholder="Confirm Password"
                      v-model="form.password_confirmation"
                    />
                    <small
                      class="text-danger"
                      v-if="errors.password_confirmation"
                      >{{ errors.password_confirmation[0] }}</small
                    >
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Create Account
                    </button>
                  </div>
                </form>
                <hr />
                <div class="text-center">
                  <router-link class="small" to="/"
                    >Already Have an Account?</router-link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "register",
  created() {
    if (User.loggedIn()) {
      this.$router.push("/home");
    }
  },
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
      errors: {},
    };
  },

  methods: {
    register() {
      axios
        .post("/api/auth/register", this.form)
        .then((response) => {
          User.responseAfterLogin(response);
          Toast.fire({
            icon: "success",
            title: "Account Created",
          });
          this.$router.push("/home");
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style scoped>
</style>
