import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import {getUsers, getTasks,getTask} from "./api";

Vue.use(Vuex);

const stateConfig = {
    user:{},
    users:[],
    tasks:[],
    editTask:[],
};

export default new Vuex.Store({
    plugins:[
        createPersistedState()
    ],
    state:stateConfig,
    getters:{
        getUser: state => state.user,
        getUsers: state => state.users,
        getTasks: state => state.tasks,
        getEditTask: state => state.editTask,
    },
    mutations:{
        setUser: (state,payload) => state.user = payload,
        setUsers: (state,payload) => state.users = payload,
        setTasks: (state,payload) => state.tasks = payload,
        setEditTask: (state,payload) => state.editTask = payload,
        logout: state => Object.assign(state,stateConfig),
    },
    actions:{
        setUser({commit},payload){
            commit('setUser',payload)
        },
        async setUsers({commit}){
            let result = await getUsers();

            commit('setUsers',result.data);
        },
        async getTasks({commit}){
            let result = await getTasks();

            commit('setTasks',result.data);
        },
        async getEditTask({commit},id){
            let result = await getTask(id);

            commit('setEditTask',result.data);
        }
    }
});
