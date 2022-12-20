import { Link } from "react-router-dom";

export function AdminPatente() {
  return (
    <section>
      <div>
        <h1>patentes</h1>
        <ul>
          <li>
            <Link to="/admin/patentes/cadastrar">
              Cadastrar Patente
            </Link>
          </li>
          <li>
            <Link to="/admin/patentes/editar-delete">
              Deletar ou Editar Patente
            </Link>
          </li>
        </ul>
      </div>
    </section>
  )
}