import axios from 'axios';
import Vue from 'vue'

let loader = null;

function addLoader(){
    loader = Vue.prototype.$loading({
        lock: true,
        text: 'Loading',
        spinner: 'el-icon-loading',
        background: 'rgba(0, 0, 0, 0.7)'
    })
}

function removeLoader(){
    loader.close();
}

export const saveStudent = ({commit}, payload) => {

    addLoader();

    try {
        axios.post('/add-student',payload).then(res => {
            if(res.data.errorCode == 200){
                Vue.prototype.$notify({
                    title : res.data.msgCode,
                    type : 'success'
                });
        
                removeLoader();
        
                setTimeout(() => {
                    window.location.href = '/list-students'
                },2000)
            }else{
                Vue.prototype.$notify({
                    title : res.data.msgCode,
                    type : 'error'
                });
            }
        })
    } catch (error) {
        console.log(error);
    }
}

export const renderListStudents = ({commit}, payload) => {
    try {
        axios.get('/get-list-students',payload).then(res => {
            return commit('setTableData',res.data);
        })
    } catch (error) {
        console.log(error);
    }
}