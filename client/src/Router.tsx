import { Routes, Route } from 'react-router-dom'
import { MenuAdmin } from './view/admin/menu'
import { AdminPatenteCadastrar } from './view/admin/patentes/create'
import { AdminPatente } from './view/admin/patentes/menu'
import { Cadastro } from './view/cadastro'
import { Home } from './view/home/index'
import { Login } from './view/login'
import { PatenteDetail } from './view/vitrine-detail/patente'
import { Patente } from './view/vitrine/patente'

export function Router() {
  return (
    <Routes>
      {/* Views */}
      <Route path="/" element={<Home />} />
      {/* Patente */}
      <Route path="/patentes" element={<Patente />} />
      <Route path="/patentes/:id" element={<PatenteDetail />} />
      {/* Login e Cadastro */}
      <Route path="/cadastro" element={<Cadastro />} />
      <Route path="/login" element={<Login />} />
      {/* Admin */}
      <Route path="/menu-admin" element={<MenuAdmin/>} />
      <Route path="/admin/patentes" element={<AdminPatente/>} />
      <Route path="/admin/patentes/cadastrar" element={<AdminPatenteCadastrar/>} />
    </Routes>
  )
}
