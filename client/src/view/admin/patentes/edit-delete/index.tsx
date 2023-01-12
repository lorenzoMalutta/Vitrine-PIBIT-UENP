import { useEffect, useState } from "react";
import api from "../../../../services/api";
import { Link } from "react-router-dom";
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


interface IPatente {
  nome: string;
  id: number;
  criadores: string;
  data_criacao: string;
  area_cientifica: string;
  area_economica: string;
  links: string;
  colaborador: string;
  palavra_chave: string;
  inpi: string;
  trl: string;
}

export function AdminPatenteEditDelete() {
  const [patente, setPatente] = useState<IPatente[]>([]);
  const deletePatente = async (id: number) => {
    try {
      await api.delete(`/patentes/${id}`, {
        headers: {
          'Authorization': "Bearer " + localStorage.getItem('token'),
        }
      });
      toast("Deletado com sucesso!")
      setTimeout(() => {
        window.location.reload()
      }, 3000)
    } catch (error) {
      console.log(error)
    }
  };

  useEffect(() => {
    api.get('/patentes').then(response => {
      setPatente(response.data);
    })
  }, [])

  return (

    <div className="p-10 h-screen">
      <ToastContainer />
      <h1>Editar e Deletar:</h1>
      <table className="shadow">
        <thead>
          <tr>
            <th>Título</th>
            <th>INPI</th>
            <th>TRL</th>
            <th>Colaborador</th>
            <th>Links</th>
            <th>Área Científica</th>
            <th>Área Econômica</th>
            <th>Palavra Chave</th>
            <th>Criador</th>
            <th>Data</th>
            <th>Editar</th>
            <th>Deletar</th>
          </tr>
        </thead>
        <tbody>
          {patente.map((patente) => (
            <tr key={patente.id}>
              <td>{patente.nome}</td>
              <td>{patente.inpi}</td>
              <td>{patente.trl}</td>
              <td>{patente.colaborador}</td>
              <td>{patente.links}</td>
              <td>{patente.area_cientifica}</td>
              <td>{patente.area_economica}</td>
              <td>{patente.palavra_chave}</td>
              <td>{patente.criadores}</td>
              <td>{patente.data_criacao}</td>
              <td>
                <Link to={`/admin/patentes/edit/${patente.id}`}>
                  <button className=" bg-[#2563EB] hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm">Editar</button>
                </Link>
              </td>
              <td>
                <button className=" bg-[#2563EB] hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm" onClick={() => deletePatente(patente.id)}>Deletar</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  )
}