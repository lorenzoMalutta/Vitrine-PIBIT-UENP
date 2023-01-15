import { useEffect, useState } from "react";
import { Cards } from "../../../components/cards";
import { Filter } from "../../../components/filter";
import api from "../../../services/api";
import { Title } from "../../../components/title";

interface Iareas {
  denominacao: string;
}
interface Ifiltro {
  nome: string;
  sinopse: string;
  palavra_chave: any;
  id: number;
  tipo: string;
  area_cientifica: string;
  area_economica: string;
}
interface IHome {
  nome: string;
  sinopse: string;
  palavra_chave: any[];
  id: number;
  tipo: string;
  area_cientifica: string;
  area_economica: string;
  image: string;
}

export function Patente() {
  const [filter, setFilter] = useState<Ifiltro[]>([])
  const [patente, setPatente] = useState<IHome[]>([]);
  const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);

  const filtro = (childrenData: any) => {
    setFilter(childrenData);
  }

  useEffect(() => {
    api.get('/palavraChave').then(response => {
      setOptionPalavraChave(response.data);
    })
  }, [])
  useEffect(() => {
    api.get('/patentes').then(response => {
      setPatente(response.data);
    })
  }, [])
  console.log(filter)
  if (filter.map((filtro) => filtro.palavra_chave == 'Fertilizantes')) {
    return (
      <section >
        <div className="mx-auto text-center">
          <Title
            titulo="Vitrine de Patentes"
            subtitulo="Tecnologias e Inovação "
          />
        </div>
        <div className="flex">
          <div className="m-10">
            <Filter
              filter="Vitrine de Patentes"
              setFilter={filtro}
              type="patentes"
            />
          </div>
          <div className="grid justify-center mb-20 mt-10">
            <div className="grid grid-cols-3 gap-5">
              {patente.map((patente) => (
                <Cards
                  type="patentes"
                  image={patente.image}
                  nome={patente.nome}
                  sinopse={patente.sinopse}
                  palavraChave={patente.palavra_chave}
                  id={patente.id}
                  areaCientifica={patente.area_cientifica}
                  areaEconomica={patente.area_economica}
                />
              ))}
            </div>
          </div>
        </div>
      </section>
    )
  } else if (filter) {
    return (
      <section >
      <div className="mx-auto text-center">
        <Title
          titulo="Vitrine de Patentes"
          subtitulo="Tecnologias e Inovação "
        />
      </div>
      <div className="flex">
        <div className="m-10">
          <Filter
            filter="Vitrine de Patentes"
            setFilter={filtro}
            type="patentes"
          />
        </div>
        <div className="grid justify-center mb-20 mt-10">
          <div className="grid grid-cols-3 gap-5">
            {patente.map((patente) => (
              <Cards
                type="patentes"
                image={patente.image}
                nome={patente.nome}
                sinopse={patente.sinopse}
                palavraChave={patente.palavra_chave}
                id={patente.id}
                areaCientifica={patente.area_cientifica}
                areaEconomica={patente.area_economica}
              />
            ))}
          </div>
        </div>
      </div>
    </section>
    )
  }
}