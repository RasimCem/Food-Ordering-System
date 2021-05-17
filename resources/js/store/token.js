export default {

    state:{
        token:null
    },
    mutations:{ //sycronous
        updateToken(state, newToken){
            state.token=newToken;
        }
    },
    acitons:{  //asycronous
        updateToken(state, payload){
            state.commit('updateToken',payload);
        }
    },
    getters:{
        getToken(state){
            return state.token;
        }
    }

}
