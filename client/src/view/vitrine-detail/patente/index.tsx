import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import api from "../../../services/api";

interface Patente {
  id: string;
  nome: string;
  sinopse: string;
  pct: string;
  solucao: string;
  inpi: string;
  resumo: string;
  problema: string;
  vantagem: string;
  aplicacao: string;
  trl: string;
  telefone: string;
  email: string;
  colaborador: string;
  data_criacao: string;
  links: string;
  criadores: string;
  area_cientifica: string;
  area_economica: string;
  palavra_chave: string;
  image: string;
  video: string;
  pdf: string;
}
export function PatenteDetail() {
  const { id } = useParams();
  const [patente, setPatente] = useState<Patente>()
  useEffect(() => {
    api.get(`/patentes/${id}`).then((response) => {
      setPatente(response.data);
    });
  }, [id]);

  return (
    <section className="sm:p-10 sm:m-10 m-5 font-medium">
      <div className="grid grid-cols-1 bg-white rounded shadow-md">
        <div>
          <video src={patente?.video} />
        </div>
        <div className="pl-10 pr-10">
          <h1>{patente?.nome}</h1>
          <div className="sm:flex grid grid-cols-1 gap-5 rounded">
            <span className="rounded-xl font-semibold bg-amber-200 p-1 ">{patente?.area_cientifica}</span>
            <span className="rounded-xl font-semibold bg-gray-200 p-1 ">{patente?.area_economica}</span>
            <span className="rounded-xl font-semibold bg-blue-200 p-1 ">{patente?.palavra_chave}</span>
          </div>
        </div>
        <div className="pl-10 pr-10">
          <h3>Resumo:</h3>
          <p>{patente?.resumo}</p>
        </div>
        <div className="grid sm:grid-cols-2 grid-cols-1 pl-10 pr-10 ">
          <div>
            <h3>Problema:</h3>
            <p>{patente?.problema}</p>
          </div>
          <div>
            <h3>Solução:</h3>
            <p>{patente?.solucao}</p>
          </div>
          <div>
            <h3>Vantagem:</h3>
            <p>{patente?.vantagem}</p>
          </div>
          <div>
            <h3>Aplicação:</h3>
            <p>{patente?.aplicacao}</p>
          </div>
          <div>
            <h3>TRL:</h3>
            <p>{patente?.trl}</p>
          </div>
          <div>
            <h3>INPI:</h3>
            <p>{patente?.inpi}</p>
          </div>
          <div>
            <h3>Criadores:</h3>
            <p>{patente?.criadores}</p>
          </div>
          <div>
            <h3>Colaboradores:</h3>
            <p>{patente?.colaborador}</p>
          </div>
          <div>
            <h3>Links:</h3>
            <p>{patente?.links}</p>
          </div>
          <div>
            <h3>Contato:</h3>
            <p>{patente?.email}</p>
            <p>{patente?.telefone}</p>
          </div>
          <div>
            <h3>PDF:</h3>
            <a href={patente?.pdf}></a>
          </div>
          <div>
            <h3>Imagem:</h3>
            <img src={patente?.image} alt="" />
          </div>
        </div>
      </div>
    </section>
  )
}