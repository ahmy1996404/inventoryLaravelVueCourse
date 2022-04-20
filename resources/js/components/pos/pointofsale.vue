<template>
    <div>
        <div class="container-fluid" id="container-wrapper">
            <div
                class="d-sm-flex align-items-center justify-content-between mb-4"
            >
                <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        POS
                    </li>
                </ol>
            </div>

            <div class="row mb-3">
                <!-- Area Chart -->
                <div class="col-xl-5 col-lg-5">
                    <div class="card mb-4">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                        >
                            <h6 class="m-0 font-weight-bold text-primary">
                                Expense Insert
                            </h6>
                            <a class="btn btn-sm btn-info" style="color: white"
                                >Add Customer</a
                            >
                        </div>
                        <div data-v-fa6affac="" class="table-responsive">
                            <table
                                data-v-fa6affac=""
                                class="table align-items-center table-flush"
                            >
                                <thead data-v-fa6affac="" class="thead-light">
                                    <tr data-v-fa6affac="">
                                        <th data-v-fa6affac="">Name</th>
                                        <th data-v-fa6affac="">Qty</th>
                                        <th data-v-fa6affac="">Unit</th>
                                        <th data-v-fa6affac="">Total</th>
                                        <th data-v-fa6affac="">Action</th>
                                    </tr>
                                </thead>
                                <tbody data-v-fa6affac="">
                                    <tr data-v-fa6affac="" v-for="cart in carts" :key="cart.id">
                                        <td data-v-fa6affac="">
                                            {{ cart.product_name }}
                                        </td>
                                        <td data-v-fa6affac="">
                                            <input type="text" style="width:16px" readonly="" :value="cart.product_quantity">
                                            <button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success">+</button>
                                            <button @click.prevent="decrement(cart.id)" class="btn btn-sm btn-danger">-</button>

                                        </td>
                                        <td data-v-fa6affac="">{{cart.product_price}}</td>
                                        <td data-v-fa6affac="">
                                            {{ cart.sub_total }}
                                        </td>
                                        <td data-v-fa6affac="">
                                            <a
                                                data-v-fa6affac=""
                                                href="#"
                                                class="btn btn-sm btn-primary"
                                                @click="removeItem(cart.id)"
                                                >X</a
                                            >
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity : <strong>56</strong> </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Sub total Quantity : <strong>562 $</strong> </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">VAT : <strong>35 %</strong> </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Total  : <strong>2256 $ </strong> </li>

                            </ul>
                            <br>
                            <form>
                                <label for="">Customer Name</label>
                                <select class="form-control" v-model="customer_id">
                                    <option v-for="customer in customers" :key="customer.id"  >{{customer.name}}</option>


                                </select>
                                <label for="">Pay</label>
                                <input type="text" class="form-control" v-model="pay">
                                <label for="">Due</label>
                                <input type="text" class="form-control" v-model="due">
                                 <label for="">Pay By</label>
                                <select class="form-control" v-model="customer_id">
                                    <option value="HandCash">Hand Cash</option>
                                    <option value="Cheaque">Cheaque</option>
                                    <option value="GiftCard">Gift Card</option>

                                </select>
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-7 col-lg-7">
                    <div class="card mb-4">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                        >
                            <h6 class="m-0 font-weight-bold text-primary">
                                Products Sold
                            </h6>
                        </div>
                        <!-- category wise product  -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="home-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#home"
                                    type="button"
                                    role="tab"
                                    aria-controls="home"
                                    aria-selected="true"
                                >
                                    All Product
                                </button>
                            </li>
                            <li
                                class="nav-item"
                                v-for="category in categories"
                                :key="category.id"
                                role="presentation"
                            >
                                <button
                                    class="nav-link"
                                    id="profile-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#profile"
                                    type="button"
                                    role="tab"
                                    aria-controls="profile"
                                    aria-selected="false"
                                    @click="subproduct(category.id)"
                                >
                                    {{ category.category_name }}
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div
                                class="tab-pane fade show active"
                                id="home"
                                role="tabpanel"
                                aria-labelledby="home-tab"
                            >
                                <div class="card-body">
                                    <input
                                        type="text"
                                        v-model="searchTerm"
                                        class="form-control"
                                        style="width: 550px"
                                        placeholder="Search Here"
                                    />

                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-6 col-6"
                                            v-for="product in filtersearch"
                                            :key="product.id"
                                        >
                                            <button class="btn btn-sm" @click.prevent="addToCart(product.id)">
                                                <div
                                                    class="card"
                                                    style="
                                                        width: 8.5rem;
                                                        margin-bottom: 5px;
                                                    "
                                                >
                                                    <img
                                                        :src="product.image"
                                                        id="em_photo"
                                                        class="card-img-top"
                                                    />
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {{
                                                                product.product_name
                                                            }}
                                                        </h5>
                                                        <span
                                                            v-if="
                                                                product.product_quantity >=
                                                                1
                                                            "
                                                            class="badge badge-success"
                                                            >Available
                                                            {{
                                                                product.product_quantity
                                                            }}</span
                                                        >
                                                        <span
                                                            v-else
                                                            class="badge badge-danger"
                                                            >Stock Out</span
                                                        >
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="profile"
                                role="tabpanel"
                                aria-labelledby="profile-tab"
                            >
                                <div class="card-body">
                                    <input
                                        type="text"
                                        v-model="searchTerm"
                                        class="form-control"
                                        style="width: 550px"
                                        placeholder="Search Here"
                                    />

                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-6 col-6"
                                            v-for="getproduct in getfiltersearch"
                                            :key="getproduct.id"
                                        >
                                            <a href="#">
                                                <div
                                                    class="card"
                                                    style="
                                                        width: 8.5rem;
                                                        margin-bottom: 5px;
                                                    "
                                                >
                                                    <img
                                                        :src="getproduct.image"
                                                        id="em_photo"
                                                        class="card-img-top"
                                                    />
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {{
                                                                getproduct.product_name
                                                            }}
                                                        </h5>
                                                        <span
                                                            v-if="
                                                                getproduct.product_quantity >=
                                                                1
                                                            "
                                                            class="badge badge-success"
                                                            >Available
                                                            {{
                                                                getproduct.product_quantity
                                                            }}</span
                                                        >
                                                        <span
                                                            v-else
                                                            class="badge badge-danger"
                                                            >Stock Out</span
                                                        >
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end category wise product  -->
                    </div>
                </div>
            </div>
            <!--Row-->
        </div>
    </div>
</template>
<script>
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
        this.allProduct();
        this.allCategories();
        this.allCustomers();
        this.cartProduct();
        Reload.$on('AfterAdd',()=>{
            this.cartProduct();
        })
    },
    data() {
        return {
            products: [],
            categories: [],
            getproducts: [],
            searchTerm: "",
            customers: [],
            carts:[],
            errors:''
        };
    },
    computed: {
        filtersearch() {
            return this.products.filter((product) => {
                return product.product_name
                    .toLowerCase()
                    .match(this.searchTerm.toLowerCase());
            });
        },
        getfiltersearch() {
            return this.getproducts.filter((getproduct) => {
                return getproduct.product_name
                    .toLowerCase()
                    .match(this.searchTerm.toLowerCase());
            });
        },
    },

    methods: {
        //cart methods
        addToCart(id){
              axios
                .get("/api/addToCart/" + id)
                .then(() => {
                    Reload.$emit('AfterAdd')
                    Notification.cart_success()

                })
                .catch();
        },
         cartProduct() {
            axios
                .get("/api/cart/product/")
                .then(({ data }) => (this.carts = data))
                .catch();
        },
        removeItem(id){
            axios
                .get("/api/remove/cart/" + id)
                .then(() => {
                    Reload.$emit('AfterAdd')
                    Notification.cart_delete()

                })
                .catch();
        },
        increment(id){
            axios
                .get("/api/increment/" + id)
                .then(() => {
                    Reload.$emit('AfterAdd')
                    Notification.success()

                })
                .catch();
        },
        decrement(id){
            axios
                .get("/api/decrement/" + id)
                .then(() => {
                    Reload.$emit('AfterAdd')
                    Notification.success()

                })
                .catch();

        },
        // end cart method
        allProduct() {
            axios
                .get("/api/product/")
                .then(({ data }) => (this.products = data))
                .catch();
        },
        allCategories() {
            axios
                .get("/api/category/")
                .then(({ data }) => (this.categories = data))
                .catch();
        },
         allCustomers() {
            axios
                .get("/api/customer/")
                .then(({ data }) => (this.customers = data))
                .catch();
        },
        subproduct(id) {
            axios
                .get("/api/get/product/" + id)
                .then(({ data }) => (this.getproducts = data))
                .catch();
        },
    },
};
</script>
<style scoped>
#em_photo {
    height: 100px;
    width: 135px;
}
</style>
