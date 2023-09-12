const defAxios = axios.create({
  baseURL: "https://demo.tiketbox.com/api/"
})
const tiketboxApi = {
  // event
  readEvent(payload, token) {
    let url = '/events'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getEvent(payload, token) {
    let url = '/events/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createEvent(payload, token) {
    let url = '/events/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updateEvent(payload, token) {
    let url = '/events/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deleteEvent(payload, token) {
    let url = '/events/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  readOrder(payload, token) {
    let url = '/orders'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getOrder(payload, token) {
    let url = '/orders/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createOrder(payload, token) {
    let url = '/orders/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updateOrder(payload, token) {
    let url = '/orders/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deleteOrder(payload, token) {
    let url = '/orders/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  // payment
  createVA(payload) {
    let url = '/xendit/createVA'
    return defAxios.post(url, payload)
  },
  createQR(payload) {
    let url = '/xendit/createQR'
    return defAxios.post(url, payload)
  },
  createInvoice(payload) {
    let url = '/xendit/createInvoice'
    return defAxios.post(url, payload)
  },
  // auth
  signIn(payload) {
    let url = '/users/login'
    return defAxios.post(url, payload)
  },
  signOut(payload, token) {
    let url = '/users/logout'
    let config = {
      headers: {
        Authorization: 'Bearer '+token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  signUp(payload) {
    let url = '/users/register'
    return defAxios.post(url, payload)
  },
  forgot(payload) {
    let url = '/users/forgot'
    return defAxios.post(url, payload)
  },
}