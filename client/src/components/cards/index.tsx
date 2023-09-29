import api from "../../services/api";

interface CardProps {
    nome: string;
    sinopse: string;
    image?: string;
    palavraChave: string;
    id: number;
    type: string;
    areaCientifica: string;
    areaEconomica: string;
}

export function Cards({
    type,
    palavraChave,
    nome,
    sinopse,
    image,
    areaCientifica,
    areaEconomica,
    id,
}: CardProps) {
    return (
        <div>
            <img src={ api + "storage/storage/" + image} className="max-h-32 w-full" />
            <a href={type + "/" + id} className="block max-w-sm p-6 bg-white border border-gray-200 shadow">
                <h5 className="mb-2 text-2xl font-bold tracking-tight text-gray-900">{nome}</h5>
                <p className="font-normal text-gray-700 overflow-hidden">{sinopse}</p>
                <span className="flex justify-center items-center bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">{areaCientifica}</span>
                <span className="flex justify-center items-center bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">{areaEconomica}</span>
                <span className="flex justify-center items-center  bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">{palavraChave}</span>
            </a>
        </div>
    );
}


