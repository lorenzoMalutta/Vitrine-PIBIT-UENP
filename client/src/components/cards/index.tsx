import { Link } from "react-router-dom";

interface CardProps {
  nome: string;
  sinopse: string;
  img?: string;
  palavraChave: any[];
  id: number;
  type: string;
  areaCientifica: string;
  areaEconomica: string;
  image: string;
}

export function Cards({ type, palavraChave, nome, sinopse, image, areaCientifica, areaEconomica, id }: CardProps) {
  return (
    <div className="w-80 rounded overflow-hidden shadow-lg bg-white">
      <a href={type+"/"+id}>
      <img className="w-full" src={image} alt="Sunset in the mountains" />
      <div className="px-6 py-4">
        <div className="font-bold text-gray-700 text-xl mb-2">{nome}</div>
        <p className="text-gray-700 text-base">
          {sinopse}
        </p>
      </div>

      <div className="grid grid-cols-2 px-6 pt-4 pb-2">
        <span className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{areaCientifica}</span>
        <span className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{areaEconomica}</span>
        <span className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{palavraChave}</span>
      </div>
      </a>
    </div>

  )
}