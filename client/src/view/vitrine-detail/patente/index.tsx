import { useEffect, useState } from "react";
import { Vitrine } from "../../../components/vitrine";
import api from "../../../services/api";

interface IPatente {
  nome: string;
  sinopse: string;
  palavra_chave: any[];
  id: string;
  tipo: string;
  area_cientifica: string[];
  area_economica: string[];
  image: string;
  video: string;
  pdf: string;
  links: string;
  data_criacao: string;
  problema: string;
  solucao: string;
  vantagem: string;
  aplicacao: string;
  trl: string;
  pct: string;
  inpi: string;
  email: string;
  telefone: string;
  colaboradores: string[];
  criadores: string[];
  resumo: string;
}


export function PatenteDetail() {
  const [patente, setPatente] = useState<IPatente[]>([]);
  useEffect(() => {
    api.get('/patentes').then(response => {
      setPatente(response.data);
    })
  }, [])
  return (
    <>
      {patente.map((patente) => (
        <Vitrine
          resumo={patente.resumo}
          titulo={patente.nome}
          imagem={patente.image}
          link={patente.links}
          areaCientifica={patente.area_cientifica}
          areaEconomica={patente.area_economica}
          problema={patente.problema}
          solucao={patente.solucao}
          email={patente.email}
          coloboradores={patente.colaboradores}
          dataCriacao={patente.data_criacao}
          trl={patente.trl}
          pct={patente.pct}
          inpi={patente.inpi}
          id={patente.id}
          palavrasChave={patente.palavra_chave}
          pdf={patente.pdf}
          video={patente.video}
          vantagem={patente.vantagem}
          telefone={patente.telefone}
          aplicacao={patente.aplicacao}
          criadores={patente.criadores}
        />
      ))
      }
    </>
  )
}