<template>
  <div class="row justify-content-center">
    <div class="col-xl-4 col-lg-4 col-md-4">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Reset Your Password</h1>
                </div>
                <form class="user">
                  <div class="form-group">
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Enter Email Address"
                    />
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block">
                      Reset Password
                    </button>
                  </div>
                </form>
                <hr />
                <div class="text-center">
                  <router-link class="small" to="/"
                    >Got Your Passwor?</router-link
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
export default {
  name: "forget",
  created() {
    if (User.loggedIn()) {
      this.$router.push("/home");
    }
  },
};
</script>

<style scoped>
</style>
