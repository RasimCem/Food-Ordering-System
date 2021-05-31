export default {

    state:{
        role:null
    },
    mutations:{ //sycronous
        updateRole(state, newRole){
            state.role=newRole;
        }
    },
    acitons:{  //asycronous
        updateRole(state, payload){
            state.commit('updateRole',payload);
        }
    },
    getters:{
        getRole(state){
            return state.role;
        }
    }

}
