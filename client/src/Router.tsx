import { Routes, Route } from 'react-router-dom'
import { Home } from './view/home/index'

export function Router() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
    </Routes>
  )
}
