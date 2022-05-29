<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h5 mb-0 text-gray-800">Add Employee</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <router-link to="/home">Home</router-link>
        </li>
        <li class="breadcrumb-item">Employees</li>
        <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
      </ol>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div
            class="
              card-header
              py-3
              d-flex
              flex-row
              align-items-center
              justify-content-between
            "
          >
            <h6 class="m-0 font-weight-bold text-primary">Add Employee</h6>
          </div>
          <div class="card-body">
            <form
              class="user"
              @submit.prevent="add_employee"
              enctype="multipart/form-data"
            >
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Empoyee`s Name"
                      v-model="form.name"
                    />
                    <small class="text-danger" v-if="errors.name">{{
                      errors.name[0]
                    }}</small>
                  </div>
                  <div class="col-md-6">
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Employe`s  Email Address"
                      v-model="form.email"
                    />
                    <small class="text-danger" v-if="errors.email">{{
                      errors.email[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Empoyee`s Phone Number"
                      v-model="form.phone"
                    />
                    <small class="text-danger" v-if="errors.phone">{{
                      errors.phone[0]
                    }}</small>
                  </div>
                  <div class="col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Employe`s Salary"
                      v-model="form.sallary"
                    />
                    <small class="text-danger" v-if="errors.sallary">{{
                      errors.sallary[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Empoyee`s NID"
                      v-model="form.nid"
                    />
                    <small class="text-danger" v-if="errors.nid">{{
                      errors.nid[0]
                    }}</small>
                  </div>
                  <div class="col-md-6">
                    <input
                      type="text"
                      id=""
                      class="form-control"
                      placeholder="Employee`s Address"
                      v-model="form.address"
                    />
                    <small class="text-danger" v-if="errors.address">{{
                      errors.address[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <input
                      type="datetime-local"
                      class="form-control"
                      v-model="form.joining_date"
                    />
                    <small class="text-danger" v-if="errors.joining_date">{{
                      errors.joining_date[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <input
                      type="file"
                      class="form-control"
                      id="exampleInputEmail"
                      aria-describedby="emailHelp"
                      placeholder="Employe`s Photo"
                      @change="on_file_selected"
                    />
                    <small class="text-danger" v-if="errors.photo">{{
                      errors.photo[0]
                    }}</small>
                  </div>
                  <div class="col-md-6 mb-3">
                    <img
                      :src="form.photo"
                      alt=""
                      style="height: 50px; width: 50px"
                    />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  Add Employee
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "add_employee",
  created() {
    if (!User.loggedIn()) {
      this.$router.push("/");
    }
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        sallary: "",
        address: "",
        phone: "",
        nid: "",
        joinned_date: "",
        photo: "",
      },
      errors: {},
    };
  },
  methods: {
    on_file_selected(event) {
      let file = event.target.files[0];
      if (file.size > 1048770) {
        Notification.image_validation();
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.photo = event.target.result;
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
    },
    add_employee() {
      axios
        .post("api/employee", this.form)
        .then((response) => {
          this.$router.push("/all-employees");
          Notification.success();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          Notification.error();
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>

