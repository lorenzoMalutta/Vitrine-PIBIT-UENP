import api from "../../../services/api";
import { useEffect, useState } from "react";

interface IPermissoes {
  name: string,
  id: string,
  email: string,
  cpf: string,
  permissoes: string,
  admin: string,
}

export function PermissoesUsuarios() {
  const [permissoes, setPermissoes] = useState<IPermissoes[]>([]);

  api.get('/showAllUsers', {
    "headers": {
      'Authorization': `Bearer ${localStorage.getItem('token')}`
    }
  }).then(response => {
    setPermissoes(response.data);
    console.log(response.data)
  })

  return (
    <section className="h-screen">
      <div className="flex flex-col items-center justify-center w-full h-full">
        <h1>Permissões de Usuários</h1>
        <table className="shadow w-[1200px]">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>CPF</th>
              <th>Permissões</th>
              <th>Opção</th>
            </tr>
          </thead>
          <tbody>
            {permissoes.map(permissoes => {
              if (permissoes.admin === "true") {
                permissoes.admin = "Administrador"
              } else {
                permissoes.admin = "Usuário"
              }
              return (
                <tr key={permissoes.id}>
                  <td>{permissoes.name}</td>
                  <td>{permissoes.email}</td>
                  <td>{permissoes.cpf}</td>
                  <td>{permissoes.admin}</td>
                  <td>
                    <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      Editar
                    </button>
                  </td>
                </tr>
              )
            })}
          </tbody>
        </table>
      </div>
    </section>
  );
}