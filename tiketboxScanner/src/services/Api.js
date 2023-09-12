import axios from  'axios'
const tAxios = axios.create({
  baseURL: "https://demo.tiketbox.com/api/"
})
const Api = {
  login(payload) {
    let url = '/users/login'
    return tAxios.post(url, payload);
  },
  checkTicket(payload, token) {
    let url = '/ticket/check'
    let config = {
      headers: {
        Authorization: 'Bearer '+token,
      },
    };
    return tAxios.post(url, payload, config);
  },
  detailTicket(payload, token) {
    let url = '/ticket/detail'
    let config = {
      headers: {
        Authorization: 'Bearer '+token,
      },
    };
    return tAxios.post(url, payload, config);
  },
  useTicket(payload, token) {
    let url = '/ticket/use'
    let config = {
      headers: {
        Authorization: 'Bearer '+token,
      },
    };
    return tAxios.post(url, payload, config);
  },
}

export default Api