import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

axios.defaults.baseURL = window.location.origin + '/api'

export default new Vuex.Store({
    state: {
        user: null
    },

    mutations: {
        setUserData(state, userData) {
            state.user = userData
        if(userData.user.status != 'false' && userData.role == 'Admin'){
           localStorage.setItem('user', JSON.stringify(userData))
            axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`  
        }
           
        },

        clearUserData() {
            localStorage.removeItem('user')
            location.reload()
        }
    },

    actions: {
        signIn({ commit }, credentials) {
            return axios
                .post('/signin', credentials)
                .then(({ data }) => {
                    commit('setUserData', data)
                   
                    // let user = data.user 
                  if(data.role == 'Admin'){
                     window.location.href = window.location.origin+'/admin' 
                  }

                console.log('data.user', data.role);
                      
                })
        },

        signOut({ commit }) {
            commit('clearUserData')
        }
    },

    getters: {
        isLogged: state => !!state.user,
        user: state => state.user,
        
    }
})
