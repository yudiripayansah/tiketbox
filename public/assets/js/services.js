const defAxios = axios.create({
  baseURL: apiBaseUrl
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
  // user
  readUser(payload, token) {
    let url = '/users'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getUser(payload, token) {
    let url = '/users/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createUser(payload, token) {
    let url = '/users/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updateUser(payload, token) {
    let url = '/users/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deleteUser(payload, token) {
    let url = '/users/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  // banner
  readBanner(payload, token) {
    let url = '/banners'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getBanner(payload, token) {
    let url = '/banners/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createBanner(payload, token) {
    let url = '/banners/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updateBanner(payload, token) {
    let url = '/banners/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deleteBanner(payload, token) {
    let url = '/banners/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  // userOrderData
  readUserOrderData(payload, token) {
    let url = '/userOrderData'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getUserOrderData(payload, token) {
    let url = '/userOrderData/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createUserOrderData(payload, token) {
    let url = '/userOrderData/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updateUserOrderData(payload, token) {
    let url = '/userOrderData/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deleteUserOrderData(payload, token) {
    let url = '/userOrderData/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  // category
  readCategory(payload, token) {
    let url = '/category'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getCategory(payload, token) {
    let url = '/category/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createCategory(payload, token) {
    let url = '/category/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updateCategory(payload, token) {
    let url = '/category/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deleteCategory(payload, token) {
    let url = '/category/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  // promotion
  readPromotion(payload, token) {
    let url = '/promotions'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  getPromotion(payload, token) {
    let url = '/promotions/get'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  createPromotion(payload, token) {
    let url = '/promotions/create'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  updatePromotion(payload, token) {
    let url = '/promotions/update'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  deletePromotion(payload, token) {
    let url = '/promotions/delete'
    let config = {
      headers: {
        token: token,
      },
    };
    return defAxios.post(url, payload, config);
  },
  // order
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