<template>
    <div>
        <div class="row">
            <router-link to="/product" style="width:200px" class="btn btn-primary">
                All Products
            </router-link>

        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Add Product
                                        </h1>
                                    </div>
                                    <form  @submit.prevent="productInsert" enctype="multipart/form-data" >
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <label for="exampleInputFirstName">Product Name</label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Product Name"
                                                                v-model="form.product_name"
                                                            />
                                                            <small class="text-danger" v-if="errors.product_name">{{errors.product_name[0]}}</small>

                                                    </div>
                                                    <div class="col-md-6">
                                                            <label for="exampleInputFirstName">Product Code</label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter product code"
                                                                v-model="form.product_code"
                                                            />
                                                            <small class="text-danger" v-if="errors.product_code">{{errors.product_code[0]}}</small>

                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlSelect1">Product Category</label>

                                                        <select v-model="form.category_id" class="form-control" id="exampleFormControlSelect1">
                                                         <option v-for="category in categories"  :key="category.id" :value="category.id">{{category.category_name}}</option>


                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <label for="exampleFormControlSelect1">Product Supplier</label>
                                                        <select v-model="form.supplier_id" class="form-control" id="exampleFormControlSelect1">
                                                            <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">{{supplier.name}}</option>

                                                        </select>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-4">
                                                            <label for="exampleInputFirstName">Product Root</label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter root"
                                                                v-model="form.root"
                                                            />
                                                            <small class="text-danger" v-if="errors.root">{{errors.root[0]}}</small>

                                                    </div>
                                                    <div class="col-md-4">
                                                            <label for="exampleInputFirstName">Buying Price</label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter buying price"
                                                                v-model="form.buying_price"
                                                            />
                                                            <small class="text-danger" v-if="errors.buying_price">{{errors.buying_price[0]}}</small>

                                                    </div>
                                                    <div class="col-md-4">
                                                            <label for="exampleInputFirstName">Selling Price</label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter selling price"
                                                                v-model="form.selling_price"
                                                            />
                                                            <small class="text-danger" v-if="errors.selling_price">{{errors.selling_price[0]}}</small>

                                                    </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <label for="exampleInputFirstName">Buying Date</label>

                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your buying date"
                                                                v-model="form.buying_date"
                                                            />
                                                            <small class="text-danger" v-if="errors.buying_date">{{errors.buying_date[0]}}</small>

                                                    </div>
                                                    <div class="col-md-6">
                                                            <label for="exampleInputFirstName">Product Quantity</label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your product quantity"
                                                                v-model="form.product_quantity"
                                                            />
                                                            <small class="text-danger" v-if="errors.nid">{{errors.nid[0]}}</small>

                                                    </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <small class="text-danger" v-if="errors.image">{{errors.image[0]}}</small>

                                                            <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img :src="form.image" style="width:40px; height:40px">

                                                    </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
                                                Submit
                                            </button>
                                        </div>
                                        <hr />

                                    </form>
                                    <div class="text-center">

                                    </div>
                                    <div class="text-center"></div>
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
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'/'})
        }
    },
    data() {
        return {
            form: {
                product_name: null,
                product_code: null,
                category_id:null,
                supplier_id:null,
                root:null,
                buying_price:null,
                selling_price:null,
                buying_date:null,
                image:null,
                product_quantity:null,

            },
            errors:{},
            categories:{},
            suppliers:{}
        };
    },
    created(){
        axios.get('/api/category/')
            .then(({data})=> (this.categories = data))
            .catch()
        axios.get('/api/supplier/')
            .then(({data})=> (this.suppliers = data))
            .catch()
    },
    methods: {
        onFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
                Notification.image_validation()
            }else{
                let reader = new FileReader();
                reader.onload = event=>{
                    this.form.image = event.target.result
                }
                reader.readAsDataURL(file);
            }
        },
        productInsert() {
            axios
                .post("api/product", this.form)
                .then(() =>{

                    this.$router.push({name:'product'})
                    Notification.success()
                    })
                .catch((error) =>this.errors = (error.response.data.errors))

        },

    },
};

</script>
<style scoped></style>
