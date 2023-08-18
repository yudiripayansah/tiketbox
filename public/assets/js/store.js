let store = new Vuex.Store({
  state: {
    orders: localStorage.getItem('tiketboxOrders') != null ? JSON.parse(localStorage.getItem('tiketboxOrders')) : [],
  },
  getters: {
    orders: state => state.orders
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
  },
  actions: {
    setOrders({commit},payload) {
      commit('setOrders',payload)
    },
    clearOrders({commit}) {
      commit('clearOrders')
    }
  },
  modules: {
  }
})
