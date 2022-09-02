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
            scope:String,
            id:Number
        },
        mounted(){
            if(this.scope == 'edit'){
                let loading = Vue.prototype.$loading({
                    lock: true,
                    text: 'Loading',
                    spinner: 'el-icon-loading',
                    background: 'rgba(0, 0, 0, 0.7)'
                })
                
                axios.get(`/get-student-by-id/${this.id}`).then(res => {
                    if(res.data.errorCode == 200){
                        this.$set(this,'form', res.data.data);
                        console.log(45)
                    }
                })

                loading.close();
            }
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
                window.location.href = '/list-students';
            },
            saveForm(item) {
                this.$refs[item].validate((valid) => {
                    if (valid) {
                        if(this.scope == 'create'){
                            this.$store.dispatch('saveStudent',this.form);
                        }else{
                            this.$store.dispatch('updateStudent',{form: this.form, id: this.id});
                        }
                    }
                })
            }
        },
    }
</script>
