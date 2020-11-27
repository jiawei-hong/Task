import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import {getUsers, getTasks} from "./api";

Vue.use(Vuex);

const stateConfig = {
    user:{},
    users:[],
    tasks:[],
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
    },
    mutations:{
        setUser: (state,payload) => state.user = payload,
        setUsers: (state,payload) => state.users = payload,
        setTasks: (state,payload) => state.tasks = payload,
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
        }
    }
});
