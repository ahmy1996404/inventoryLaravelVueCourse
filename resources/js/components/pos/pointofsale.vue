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
                                Monthly Recap Report
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"></div>
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
                                            <a href="#">
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
                                            </a>
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
    },
    data() {
        return {
            products: [],
            categories: [],
            getproducts: [],
            searchTerm: "",
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
        }
    },

    methods: {
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
