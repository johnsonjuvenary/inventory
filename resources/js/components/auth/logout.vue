<template>
  <div></div>
</template>

<script>
export default {
  name: "logout",
  created() {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    Toast.fire({
      icon: "success",
      title: "Logged out successfully",
    });
    this.$router.push("/");
  },
};
</script>

<style scoped>
</style>
