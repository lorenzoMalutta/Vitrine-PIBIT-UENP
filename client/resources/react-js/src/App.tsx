import { Router } from './Router'
import { BrowserRouter } from 'react-router-dom'
import { Footer } from './components/footer/Index'
import { Header } from './components/header/Index'

function App() {
  return (
    <BrowserRouter>
      <Header />
      <Router />
      <Footer />
    </BrowserRouter>
  )
}

export default App
