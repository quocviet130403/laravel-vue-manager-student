<template>
    <div class="container">
        <el-card class="box-card">
            <el-button type="primary" @click="AddStudent()">Add student</el-button>
            <br><br>
            <el-table
            :data="tableData"
            style="width: 100%">
            <el-table-column v-for="column in TablesColumns"
                :key="column.label"
                :label="column.label"
                :prop="column.prop"
                :column-key="column.prop"
                :min-width="column.minWidth"
                :sortable="column.sortable"
                :aligh="column.aligh"
                :header-aligh="column.header-aligh"
                >
            </el-table-column>
            </el-table>
        </el-card>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "student-list",
        mounted() {
            let loading = Vue.prototype.$loading({
                lock: true,
                text: 'Loading',
                spinner: 'el-icon-loading',
                background: 'rgba(0, 0, 0, 0.7)'
            })
            this.$store.dispatch('renderListStudents');

            loading.close();
        },
        computed: {
            ...mapGetters({
                tableData: "tableData"
            })
        },
        data() {
            return {
                TablesColumns: [
                    {
                        prop: "name",
                        label: "Name",
                        minWidth: 100,
                        sortable: true,
                        hidden: true,
                        aligh: "center",
                        fixed: true
                    },
                    {
                        prop: "grade",
                        label: "Grade",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        aligh: "center",
                        fixed: true
                    },
                    {
                        prop: "class",
                        label: "Class",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        aligh: "center",
                        fixed: true
                    },
                    {
                        prop: "email",
                        label: "Email",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        aligh: "center",
                        fixed: true
                    },
                    {
                        prop: "phone",
                        label: "Phone",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        aligh: "center",
                        fixed: true
                    }
                ],
            }
        },
        methods: {
            AddStudent(){
                window.location.href = '/student';
            }
        },
    }
</script>
