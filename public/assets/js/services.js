const authorization = btoa('')
const xenditAxios = axios.create({ 
  baseURL: 'https://api.xendit.co/',
  headers: {
    "Content-Type":"application/json",
    "Authorization": `Basic ${authorization}`
  }
})
console.log(authorization)
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
  createVA(paylod) {
    let url = '/xendit/createVA'
    return defAxios.post(url, paylod)
  },
  createQR(paylod) {
    let url = '/xendit/createQR'
    return defAxios.post(url, paylod)
  },
  createInvoice(paylod) {
    let url = '/xendit/createInvoice'
    return defAxios.post(url, paylod)
  }
}
const xendit = {
  createVa(paylod) {
    let url = '/callback_virtual_accounts'
    return xenditAxios.post(url, paylod)
  }
}