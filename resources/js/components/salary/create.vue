<template>
    <div>
        <div class="row">
            <router-link
                to="/employee"
                style="width: 200px"
                class="btn btn-primary"
            >
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
                                            Pay Salary
                                        </h1>
                                    </div>
                                    <form @submit.prevent="salaryPaid">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                     <label
                                                        for="exampleFormControlSelect1"
                                                        >Employee Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Your Full Name"
                                                        v-model="form.name"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.name"
                                                        >{{
                                                            errors.name[0]
                                                        }}</small
                                                    >
                                                </div>
                                                <div class="col-md-6">
                                                     <label
                                                        for="exampleFormControlSelect1"
                                                        >Employee Email</label
                                                    >
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Your email"
                                                        v-model="form.email"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.email"
                                                        >{{
                                                            errors.email[0]
                                                        }}</small
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label
                                                        for="exampleFormControlSelect1"
                                                        >Months</label
                                                    >

                                                    <select
                                                        v-model="
                                                            form.salary_month
                                                        "
                                                        class="form-control"
                                                        id="exampleFormControlSelect1"
                                                    >
                                                        <option value="January">
                                                            January
                                                        </option>
                                                        <option
                                                            value="February"
                                                        >
                                                            February
                                                        </option>
                                                        <option value="March">
                                                            March
                                                        </option>
                                                        <option value="April">
                                                            April
                                                        </option>
                                                        <option value="May">
                                                            May
                                                        </option>
                                                        <option value="June">
                                                            June
                                                        </option>
                                                        <option value="July">
                                                            July
                                                        </option>
                                                        <option value="August">
                                                            August
                                                        </option>
                                                        <option
                                                            value="September"
                                                        >
                                                            September
                                                        </option>
                                                        <option value="October">
                                                            October
                                                        </option>
                                                        <option
                                                            value="November"
                                                        >
                                                            November
                                                        </option>
                                                        <option
                                                            value="December"
                                                        >
                                                            December
                                                        </option>
                                                    </select>
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.salary_month
                                                        "
                                                        >{{
                                                            errors
                                                                .salary_month[0]
                                                        }}</small
                                                    >
                                                </div>
                                                <div class="col-md-6">
                                                     <label
                                                        for="exampleFormControlSelect1"
                                                        >Salary</label
                                                    >
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Your Sallary"
                                                        v-model="form.sallary"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.sallary"
                                                        >{{
                                                            errors.sallary[0]
                                                        }}</small
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
                                                Pay Now
                                            </button>
                                        </div>
                                        <hr />
                                    </form>
                                    <div class="text-center"></div>
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
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },
    data() {
        return {
            form: {
                email: "",
                salary_month: "",
                name: "",
                sallary: "",

            },
            errors: {},
        };
    },
    created() {
        let id = this.$route.params.id;
        axios
            .get("/api/employee/" + id)
            .then(({ data }) => (this.form = data))
            .catch((error) => console.log(error));
    },
    methods: {

        salaryPaid() {
            let id = this.$route.params.id;

            axios
                .post("/api/salary/paid/" + id, this.form)
                .then(() => {
                    this.$router.push({ name: "given-salary" });
                    Notification.success();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>
<style scoped></style>
