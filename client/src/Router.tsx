import { Routes, Route } from 'react-router-dom'
import { MenuAdmin } from './view/admin/menu'
import { PatenteCadastrar } from './view/admin/patentes/create'
import { AdminPatente } from './view/admin/patentes/menu'
import { Cadastro } from './view/cadastro'
import { Home } from './view/home/index'
import { Login } from './view/login'
import { PatenteDetail } from './view/vitrine-detail/patente'
import { Patente } from './view/vitrine/patente'
import { PatenteEditDelete } from './view/admin/patentes/edit-delete'
import { PatenteUpdate } from './view/admin/patentes/update'
import { SoftwareCadastrar } from './view/admin/softwares/create'
import { SoftwareEditDelete } from './view/admin/softwares/edit-delete'
import { SoftwareUpdate } from './view/admin/softwares/update'
import { AdminSoftware } from './view/admin/softwares/menu'
import { ServicoCadastrar } from './view/admin/servicos/create'
import { ServicoEditDelete } from './view/admin/servicos/edit-delete'
import { ServicoUpdate } from './view/admin/servicos/update'
import { AdminServico } from './view/admin/servicos/menu'
import { PermissoesUsuarios } from './view/admin/permissoes'

export function Router() {

  if (localStorage.getItem('authenticating') === 'true' ) {
    return (
      <Routes>
        {/* Admin */}
        <Route path="/dashboard" element={<MenuAdmin />} />
        <Route path="/admin/patentes" element={<AdminPatente />} />
        <Route path="/admin/patentes/cadastrar" element={<PatenteCadastrar />} />
        <Route path="/admin/patentes/editar-delete" element={< PatenteEditDelete />} />
        <Route path="/admin/patentes/edit/:id" element={< PatenteUpdate />} />
        <Route path="/admin/softwares" element={< AdminSoftware />} />
        <Route path="/admin/softwares/cadastrar" element={< SoftwareCadastrar />} />
        <Route path="/admin/softwares/editar-delete" element={< SoftwareEditDelete />} />
        <Route path="/admin/softwares/edit/:id" element={< SoftwareUpdate />} />
        <Route path="/admin/servicos" element={< AdminServico />} />
        <Route path="/admin/servicos/cadastrar" element={< ServicoCadastrar />} />
        <Route path="/admin/servicos/editar-delete" element={< ServicoEditDelete />} />
        <Route path="/admin/servicos/edit/:id" element={< ServicoUpdate />} />
        <Route path="/admin/permissoes" element={< PermissoesUsuarios />} />
        {/* home */}
        <Route path="/" element={<Home />} />
        {/* Patente */}
        <Route path="/patentes" element={<Patente />} />
        <Route path="/patentes/:id" element={<PatenteDetail />} />
      </Routes>
    )
  } else {
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
      </Routes>
    )
  }
}
