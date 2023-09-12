let store = new Vuex.Store({
  state: {
    orders: localStorage.getItem('tiketboxOrders') != null ? JSON.parse(localStorage.getItem('tiketboxOrders')) : [],
    users: localStorage.getItem('tiketboxUsers') != null ? JSON.parse(localStorage.getItem('tiketboxUsers')) : [],
  },
  getters: {
    orders: state => state.orders,
    users: state => state.users
  },
  mutations: {
    setOrders(state,payload){
      state.orders = payload
      localStorage.setItem('tiketboxOrders', JSON.stringify(state.orders))
    },
    clearOrders(state){
      state.orders = []
      localStorage.setItem('tiketboxOrders', JSON.stringify(state.orders))
    },
    setUsers(state,payload){
      state.users = payload
      localStorage.setItem('tiketboxUsers', JSON.stringify(state.users))
    },
    clearUsers(state){
      state.users = []
      localStorage.setItem('tiketboxUsers', JSON.stringify(state.users))
    },
  },
  actions: {
    setOrders({commit},payload) {
      commit('setOrders',payload)
    },
    clearOrders({commit}) {
      commit('clearOrders')
    },
    setUsers({commit},payload) {
      commit('setUsers',payload)
    },
    clearUsers({commit}) {
      commit('clearUsers')
    }
  },
  modules: {
  }
})
