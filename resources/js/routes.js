const home = require("./components/home.vue").default;
//auth
const login = require("./components/auth/login.vue").default;
const register = require("./components/auth/register.vue").default;
const forget = require("./components/auth/forget.vue").default;
const logout = require("./components/auth/logout.vue").default;
//end auth

//employee
const add_employee = require("./components/employee/add_employee.vue").default;
const all_employees =
    require("./components/employee/all_employees.vue").default;

const edit_employee =
    require("./components/employee/edit_employee.vue").default;

// end employee

export const routes = [
    { path: "/home", component: home, name: "home" },

    // auth routes
    { path: "/", component: login, name: "/" },
    { path: "/register", component: register, name: "register" },
    { path: "/forget", component: forget, name: "forget" },
    { path: "/logout", component: logout, name: "logout" },
    // end auth routes

    //employee
    { path: "/add-employee", component: add_employee, name: "add-employee" },
    { path: "/all-employees", component: all_employees, name: "all-employees" },
    {
        path: "/edit-employee/:id",
        component: edit_employee,
        name: "edit-employee",
    },
    // end employee
];
