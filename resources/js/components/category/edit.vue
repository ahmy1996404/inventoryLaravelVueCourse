<template>
    <div>
        <div class="row">
            <router-link to="/category" style="width:200px" class="btn btn-primary">
                All Categories
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
                                              Category Update

                                        </h1>
                                    </div>
                                    <form  @submit.prevent="categoriesUpdate" >
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your Full Name"
                                                                v-model="form.category_name"
                                                            />
                                                            <small class="text-danger" v-if="errors.category_name">{{errors.category_name[0]}}</small>

                                                    </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
                                                Update
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

                category_name:'',

            },
            errors:{}
        };
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/category/'+id)
        .then(({data})=>(this.form =data))
        .catch((error)=>console.log(error))
    },
    methods: {

        categoriesUpdate() {
            let id = this.$route.params.id

            axios
                .patch('/api/category/'+id, this.form)
                .then(() =>{
                    this.$router.push({name:'category'})
                    Notification.success()
                    })
                .catch((error) =>this.errors = (error.response.data.errors))

        },

    },
};

</script>
<style scoped></style>
