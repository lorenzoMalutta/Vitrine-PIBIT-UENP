import { Link } from "react-router-dom";
export function AdminSoftware() {
  return (
    <section className="grid pb-20 pt-20 justify-center">
      <h1>Administrador de Softwares</h1>
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
            <Link to="/admin/softwares/cadastrar">
              <img src="..\src\assets\dashboard\img1.svg" alt="" />
              <h4>Cadastrar Softwares</h4>
            </Link>
          </div>
        </li>
        <li className="w-fit">
          <div className="bg-white max-w-[230px] p-2 rounded shadow-md text-center">
            <Link to="/admin/softwares/editar-delete">
              <img src="..\src\assets\dashboard\img2.svg" alt="" />
              <h4>Deletar ou Editar Softwares</h4>
            </Link>
          </div>
        </li>
      </ul>
    </section>
  )
}