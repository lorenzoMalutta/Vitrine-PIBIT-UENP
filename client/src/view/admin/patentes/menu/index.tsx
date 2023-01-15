import { Link } from "react-router-dom";
import { Title } from "../../../../components/title";
export function AdminPatente() {
  return (
    <section className="grid pb-20 pt-20 justify-center">
      <Title
        titulo="Dashboard de Patentes"
        subtitulo="Administre as patentes"
      />
      <div className="absolute top-56 left-72 -z-10">
        <img
          src="..\src\assets\dashboard\quadrado0.png"
          alt=""
        />
        <img className="absolute top-56 left-56 -z-10"
          src="..\src\assets\dashboard\quadrado1.png"
          alt=""
        />
      </div>
      <ul className="grid grid-cols-2 w-fit items-center gap-11">
        <li className="w-fit">
          <div className="bg-white max-w-[230px] p-2 rounded shadow-md text-center">
            <Link to="/admin/patentes/cadastrar">
              <img src="..\src\assets\dashboard\img1.svg" alt="" />
              <h4>Cadastrar Patentes</h4>
            </Link>
          </div>
        </li>
        <li className="w-fit">
          <div className="bg-white max-w-[230px] p-2 rounded shadow-md text-center">
            <Link to="/admin/patentes/editar-delete">
              <img src="..\src\assets\dashboard\img2.svg" alt="" />
              <h4>Deletar ou Editar Patente</h4>
            </Link>
          </div>
        </li>
      </ul>
    </section>
  )
}