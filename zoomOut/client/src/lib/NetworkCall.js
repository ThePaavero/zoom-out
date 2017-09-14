import axios from 'axios'

const NetworkCall = () => {

  let baseUrl = ''

  const setBaseUrl = (url) => {
    baseUrl = url
  }

  const get = (slug) => {
    return axios.get(baseUrl + slug)
  }

  const post = (slug, payload) => {
    return axios.post(baseUrl + slug, payload)
  }

  return {
    setBaseUrl,
    get,
    post
  }
}

export default new NetworkCall()
