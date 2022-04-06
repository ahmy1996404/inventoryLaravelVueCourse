let login = require("./components/auth/login.vue").default;
let register = require("./components/auth/register.vue").default;
let forget = require("./components/auth/forget.vue").default;
let logout = require("./components/auth/logout.vue").default;

// end Ath
let home = require("./components/home.vue").default;

// employee component
let storeEmployee = require("./components/employee/create.vue").default;
let employee = require("./components/employee/index.vue").default;
let editEmployee = require("./components/employee/edit.vue").default;

// supplier component
let storeSupplier = require("./components/supplier/create.vue").default;
let supplier = require("./components/supplier/index.vue").default;
let editSupplier = require("./components/supplier/edit.vue").default;

export const routes = [
    { path: "/", component: login, name: "/" },
    { path: "/register", component: register, name: "register" },
    { path: "/forget", component: forget, name: "forget" },
    { path: "/logout", component: logout, name: "logout" },
    { path: "/home", component: home, name: "home" },

    //EMPLOYEE ROUtES
    {
        path: "/store-employee",
        component: storeEmployee,
        name: "store-employee",
    },
    {
        path: "/employee",
        component: employee,
        name: "employee",
    },
    {
        path: "/edit-employee/:id",
        component: editEmployee,
        name: "edit-employee",
    },

    //Supplier ROUtES
    {
        path: "/store-supplier",
        component: storeSupplier,
        name: "store-supplier",
    },
    {
        path: "/supplier",
        component: supplier,
        name: "supplier",
    },
    {
        path: "/edit-supplier/:id",
        component: editSupplier,
        name: "edit-supplier",
    },
];
