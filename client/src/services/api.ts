import axios from 'axios'

const api = axios.create({
  baseURL: 'http://200.201.24.33/api',
})

export default api
