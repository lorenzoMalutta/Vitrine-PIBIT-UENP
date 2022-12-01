import { Routes, Route } from 'react-router-dom'
import { Home } from './view/home/index'
import { PatenteDetail } from './view/vitrine-detail/patente'
import { Patente } from './view/vitrine/patente'

export function Router() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      {/* Patente */}
      <Route path="/patentes" element={<Patente />} />
      <Route path="/patentes/:id" element={<PatenteDetail/>} />
    </Routes>
  )
}
