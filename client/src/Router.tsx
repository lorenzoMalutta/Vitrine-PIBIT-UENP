import { Routes, Route } from 'react-router-dom'
import { Home } from './view/home/index'
import { Patente } from './view/vitrine/patente'

export function Router() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/patentes" element={<Patente />} />
    </Routes>
  )
}
