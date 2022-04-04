<template>
    <div>
        <div class="row">
            <router-link to="/employee" class="btn btn-primary">
                All Employee
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
                                            Add Employee
                                        </h1>
                                    </div>
                                    <form  @submit.prevent="employeeInsert" enctype="multipart/form-data" >
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your Full Name"
                                                                v-model="form.name"
                                                            />
                                                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>

                                                    </div>
                                                    <div class="col-md-6">
                                                            <input
                                                                type="email"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your email"
                                                                v-model="form.email"
                                                            />
                                                            <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>

                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your Address"
                                                                v-model="form.address"
                                                            />
                                                            <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>

                                                    </div>
                                                    <div class="col-md-6">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your Sallary"
                                                                v-model="form.sallary"
                                                            />
                                                            <small class="text-danger" v-if="errors.sallary">{{errors.sallary[0]}}</small>

                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your joining date"
                                                                v-model="form.joining_date"
                                                            />
                                                            <small class="text-danger" v-if="errors.joining_date">{{errors.joining_date[0]}}</small>

                                                    </div>
                                                    <div class="col-md-6">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your Nationality id"
                                                                v-model="form.nid"
                                                            />
                                                            <small class="text-danger" v-if="errors.nid">{{errors.nid[0]}}</small>

                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputFirstName"
                                                                placeholder="Enter Your phone Number"
                                                                v-model="form.phone"
                                                            />
                                                            <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>

                                                    </div>
                                                    <div class="col-md-6">

                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                            <small class="text-danger" v-if="errors.photo">{{errors.photo[0]}}</small>

                                                            <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img src="form.photo" style="width:40px; height:40px">

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
                email: null,
                phone: null,
                name:null,
                sallary:null,
                address:null,
                photo:null,
                nid:null,
                joining_date:null,
                password_confirmation:null
            },
            errors:{}
        };
    },
    methods: {
        onFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
                Notification.image_validation()
            }else{
                console.log(event)
            }
        },
        employeeInsert() {
            axios
                .post("api/auth/signup", this.form)
                .then((res) =>{
                    User.responseAfterLogin(res)
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                        })
                    this.$router.push({name:'home'})
                    })
                .catch((error) =>this.errors = (error.response.data.errors))

        },

    },
};

</script>
<style scoped></style>
