import { Link } from "react-router-dom";

interface CardProps {
  nome: string;
  sinopse: string;
  img?: string;
  palavraChave: any[];
  id: number;
  areaCientifica: string;
  areaEconomica: string;
}

export function Cards({ palavraChave, nome, sinopse, img, areaCientifica, areaEconomica, id }: CardProps) {
  return (

    <div className="max-w-xs rounded overflow-hidden shadow-lg bg-white">
      <Link to="/">
      <img className="w-full" src={img} alt="Sunset in the mountains" />
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
      </Link>
    </div>

  )
}