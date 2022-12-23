import { useEffect, useState } from "react";
import { Cards } from "../../../components/cards";
import { Filter } from "../../../components/filter";
import api from "../../../services/api";

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
  const [patente, setPatente] = useState<IHome[]>([]);
  useEffect(() => {
    api.get('/patentes').then(response => {
      setPatente(response.data);
    })
  }, [])
  return (
    <>
      <div className="flex m-10">
        <h1>Vitrine Patentes</h1>
      </div>
      <div className="grid justify-center pb-20">
        <div className="grid grid-cols-4 max-w-fit gap-14 ">
          <Filter
            filter="Vitrine de Patentes"
            catergorias={["categoria1", "categoria2", "categoria3"]}
            setFilter={() => { }}
          />
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
    </>
  )
}