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

// category component
let storeCategory = require("./components/category/create.vue").default;
let category = require("./components/category/index.vue").default;
let editCategory = require("./components/category/edit.vue").default;

// product component
let storeProduct = require("./components/product/create.vue").default;
let product = require("./components/product/index.vue").default;
let editProduct = require("./components/product/edit.vue").default;

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

    //Category ROUtES
    {
        path: "/store-category",
        component: storeCategory,
        name: "store-category",
    },
    {
        path: "/category",
        component: category,
        name: "category",
    },
    {
        path: "/edit-category/:id",
        component: editCategory,
        name: "edit-category",
    },
    //Product ROUtES
    {
        path: "/store-product",
        component: storeProduct,
        name: "store-product",
    },
    {
        path: "/product",
        component: product,
        name: "product",
    },
    {
        path: "/edit-product/:id",
        component: editProduct,
        name: "edit-product",
    },
];
