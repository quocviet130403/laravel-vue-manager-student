<template>
    <div class="container">
        <el-card class="box-card">
            <el-button type="primary" class="mb-2" @click="AddStudent()">Add student</el-button>
            <el-input placeholder="Search..." v-model="search"></el-input>
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
                    :header-aligh="column.header-aligh"
                    >
                </el-table-column>
                 <el-table-column>
                    <template slot-scope="scope">
                        <el-button @click="editItem(scope.row.id)" type="text" size="small">Edit</el-button>
                        <el-button @click="deleteItem(scope.row.id)" type="text" size="small">Delete</el-button>
                    </template>
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
        watch: {
            search: function(keyword){
                this.$store.dispatch('renderListStudentsFilter', this.search);
            }
        },
        computed: {
            ...mapGetters({
                tableData: "tableData"
            })
        },
        data() {
            return {
                search: null,
                TablesColumns: [
                    {
                        prop: "name",
                        label: "Name",
                        minWidth: 100,
                        sortable: true,
                        hidden: true,
                        fixed: true
                    },
                    {
                        prop: "grade",
                        label: "Grade",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        fixed: true
                    },
                    {
                        prop: "class",
                        label: "Class",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        fixed: true
                    },
                    {
                        prop: "email",
                        label: "Email",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        fixed: true
                    },
                    {
                        prop: "phone",
                        label: "Phone",
                        minWidth: 100,
                        sortable: false,
                        hidden: true,
                        fixed: true
                    }
                ],
            }
        },
        methods: {
            AddStudent(){
                window.location.href = '/student';
            },
            editItem(id){
                window.location.href = `/edit-student/${id}`;
            },
            deleteItem(id){
                this.$confirm('Delete Item?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {
                    // axios.delete(`/delete-student/${payload}`).then(res => {
                    // })
                    this.$store.dispatch('deleteItem',id);
                    this.$store.dispatch('renderListStudents');
                })
            }
        },
    }
</script>
