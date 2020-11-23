import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);

const stateConfig = {
    user:{},
};

export default new Vuex.Store({
    plugins:[
        createPersistedState()
    ],
    state:stateConfig,
    getters:{
        getUser: state => state.user,
    },
    mutations:{
        setUser: (state,payload) => state.user = payload,
        logout: state => Object.assign(state,stateConfig),
    },
    actions:{
        setUser({commit},payload){
            commit('setUser',payload)
        },
    }
});
