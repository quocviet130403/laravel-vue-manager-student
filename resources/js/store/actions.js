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

    this.axios.post('/add-student',payload).then(res => {
        Vue.prototype.$notify({
            title : 'Add student success',
            type : 'success'
        });

        removeLoader();

        setTimeout(() => {
            window.location.href = '/list-students'
        },2000)
    })
}