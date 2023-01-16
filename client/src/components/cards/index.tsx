import { Link } from "react-router-dom";

interface CardProps {
  nome: string;
  sinopse: string;
  img?: string;
  palavraChave: string;
  id: number;
  type: string;
  areaCientifica: string;
  areaEconomica: string;
  image: string;
}

export function Cards({ type, palavraChave, nome, sinopse, image, areaCientifica, areaEconomica, id }: CardProps) {
  return (
    <div className="w-80 rounded overflow-hidden shadow-lg bg-white max-h-60">
      <a href={type + "/" + id}>
        <img className="w-full" src={image} alt="Sunset in the mountains" />
        <div className="m-2">
          <div className="font-bold text-gray-700 text-xl mb-2">
            {nome}
          </div>
          <p className="text-gray-700 text-base">
            {sinopse}
          </p>
        </div>
        <div className="grid grid-cols-2 text-center m-1">
          <span className="inline-block bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">{areaCientifica}</span>
          <span className="inline-block bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">{areaEconomica}</span>
          <span className="inline-block bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">{palavraChave}</span>
        </div>
      </a>
    </div >

  )
}