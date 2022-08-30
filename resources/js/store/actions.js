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

    axios.post('/add-student',payload).then(res => {
        try {
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
        } catch (error) {
            console.log(error);
        }
    })
}