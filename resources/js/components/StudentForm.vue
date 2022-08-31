<template>
    <div class="container">
        <el-card class="box-card">
            <el-page-header @back="goBack" :content="`${scope}`"></el-page-header>
            <br><br>
            <el-form ref="student" :label-position="labelPosition" label-width="100px" :model="form">
                <el-form-item label="Name" required prop="name">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="Class" required prop="class">
                    <el-input v-model="form.class"></el-input>
                </el-form-item>
                <el-form-item label="Grade" required prop="grade">
                    <el-input v-model="form.grade"></el-input>
                </el-form-item>
                <el-form-item label="Email" required prop="email">
                    <el-input v-model="form.email"></el-input>
                </el-form-item>
                <el-form-item label="Phone" required prop="phone">
                    <el-input v-model="form.phone"></el-input>
                </el-form-item>
                <el-button type="success" @click="saveForm('student')">
                    Save
                </el-button>
            </el-form>
        </el-card>
    </div>
</template>

<script>
    export default {
        name: "student-from",
        props: {
            scope:String
        },
        data() {
            return {
                labelPosition : 'left',
                form : {
                    name : null,
                    class : null,
                    grade : null,
                    email : null,
                    phone : null,
                }
            }
        },
        methods: {
            goBack() {
                window.location.href = '/student';
            },
            saveForm(item) {
                this.$refs[item].validate((valid) => {
                    if (valid) {
                        this.$root.$options.store.dispatch('saveStudent',this.form);
                    }
                })
            }
        },
    }
</script>
