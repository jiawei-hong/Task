import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import {getTasks, getUsers} from "./api";

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
        async getUsers({commit}){
            let result = await getUsers();

            commit('setUsers',result.data)
        },
        setUser({commit},payload){
            commit('setUser',payload);
        },
        async getTasks({commit},token){
            let result = await getTasks(token);

            commit('setTasks',result.data);
        },
        getEditTask({commit},payload){
            commit('setEditTask',payload);
        }
    }
});
