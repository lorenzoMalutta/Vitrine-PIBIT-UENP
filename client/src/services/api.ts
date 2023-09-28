import axios from 'axios'

const api = axios.create({
  baseURL: 'http://apivitrine.uenp.edu.br/api',
})

export default api
