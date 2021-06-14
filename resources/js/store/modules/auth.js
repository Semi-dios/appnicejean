import axios from 'axios';

const state = {
    user: null,
    data: null
};

const getters = {
    isAuthenticated: state => !!state.user,
    StateUser: state => state.user
};


const actions = {
    async Register({dispatch}, form) {
       console.log('Esta es la información ',form);
       await axios.post('api/auth/register', form)
       let UserForm = new FormData()

       UserForm.append('username', form.username);
       UserForm.append('email', form.email);
       UserForm.append('password', form.password);
       UserForm.append('password_confirmation', form.password_confirmation);
       await dispatch('LogIn', UserForm)
    },
    async LogIn({commit}, User) {
        await axios.post('api/auth/login', User)
        await commit('setUser', User.get('username'))
    },

    async LogOut({commit}) {
        let user = null;
        commit('logout',user)
    }
};


const mutations = {
    setUser(state,username){
        state.user = username
    },
    LogOut(state) {
        state.user = null;
    }
};



export default {
    state,
    getters,
    actions,
    mutations
};
