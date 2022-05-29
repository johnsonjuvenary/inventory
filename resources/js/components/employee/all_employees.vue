<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h5 mb-0 text-gray-800">All Employees</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <router-link to="/home">Home</router-link>
        </li>
        <li class="breadcrumb-item">Employees</li>
        <li class="breadcrumb-item active" aria-current="page">
          All Employees
        </li>
      </ol>
    </div>
    <div class="row">
      <div class="col-lg-12 mb-4">
        <div class="card">
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
            <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
          </div>
          <input
            type="text"
            class="text form-control"
            placeholder="Search Employee"
            v-model="search_term"
          />
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Sallary</th>
                  <th>Joining Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="employee in filter_search" :key="employee.id">
                  <td><img :src="employee.photo" id="em_photo" /></td>
                  <td>{{ employee.name }}</td>
                  <td>{{ employee.phone }}</td>
                  <td>{{ employee.sallary }}</td>
                  <td>{{ employee.joining_date }}</td>
                  <td>
                    <router-link
                      :to="{
                        name: 'edit-employee',
                        params: { id: employee.id },
                      }"
                      class="btn btn-sm btn-primary"
                      >Edit</router-link
                    >
                    <button
                      @click="delete_employee(employee.id)"
                      class="btn btn-sm btn-danger"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "all_employees",
  created() {
    if (!User.loggedIn()) {
      this.$router.push("/");
    }
  },
  data() {
    return {
      employees: [],
      search_term: "",
    };
  },
  computed: {
    filter_search() {
      return this.employees.filter((employee) => {
        return employee.name.match(this.search_term);
      });
    },
  },
  methods: {
    all_employees() {
      axios
        .get("/api/employee")
        .then((response) => {
          this.employees = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    delete_employee(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios
              .delete("/api/employee/" + id)
              .then(() => {
                this.employees = this.employees.filter((employee) => {
                  return employee.id != id;
                });
                console.log(employee.id);
              })
              .catch(() => {
                this.$router.push("/all-employees");
              });
            swalWithBootstrapButtons.fire(
              "Deleted!",
              "Employee has been deleted.",
              "success"
            );
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Employee has not been deleted:)",
              "error"
            );
          }
        });
    },
  },

  created() {
    this.all_employees();
  },
};
</script>

<style scoped>
#em_photo {
  height: 40px;
  width: 40px;
}
</style>
