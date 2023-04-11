import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import api from "../../../services/api";
interface laboratorio {
    id: string;
    nome: string;
    sinopse: string;
    resumo: string;
    aplicacao: string;
    telefone: string;
    email: string;
    colaborador: string;
    links: string;
    area_cientifica: string;
    area_economica: string;
    palavras_chave: string;
    image: string;
    pdf: string;
    conteudo: string;
    supervisores: string;
}
export function LaboratorioDetail() {
    const { id } = useParams();
    const [laboratorio, setlaboratorio] = useState<laboratorio>()

    useEffect(() => {
        api.get(`/laboratorios/${id}`).then((response) => {
            setlaboratorio(response.data);
        });
    }, [id]);

    return (
        <section className="font-medium grid xl:grid-cols-5 grid-cols-1">
            <div className="grid col-span-4 bg-white rounded shadow-md ml-10 my-10">
                <div>
                    <iframe className="w-full h-[600px]" src={"http://127.0.0.1:8000/storage" + laboratorio?.image} />
                </div>
                <div className="pl-10 pr-10">
                    <h1>{laboratorio?.nome}</h1>
                    <div className="sm:flex grid grid-cols-1 gap-5 rounded">
                        <span className="rounded-xl font-semibold bg-amber-200 p-1 ">{laboratorio?.area_cientifica}</span>
                        <span className="rounded-xl font-semibold bg-gray-200 p-1 ">{laboratorio?.area_economica}</span>
                        <span className="rounded-xl font-semibold bg-blue-200 p-1 ">{laboratorio?.palavras_chave}</span>
                    </div>
                </div>
                <div className="pl-10 pr-10">
                    <h3>Resumo:</h3>
                    <p>{laboratorio?.resumo}</p>
                </div>
                <div className="pl-10 pr-10">
                    <h3>Supervisores:</h3>
                    <p>{laboratorio?.supervisores}</p>
                </div>
                <div className="grid sm:grid-cols-2 grid-cols-1 pl-10 pr-10 ">
                    <div>
                        <h3>Aplicação:</h3>
                        <p>{laboratorio?.aplicacao}</p>
                    </div>
                    <div>
                        <h3>Equipamentos:</h3>
                        <p>{laboratorio?.conteudo}</p>
                    </div>
                </div>
            </div>
            <div className="grid col-span-1 bg-white shadow-md rounded m-10">
                <div className="m-2">
                    <div>
                        <h3>PDF:</h3>
                        <a href={"http://127.0.0.1:8000/storage" + laboratorio?.pdf}>
                            <img className="w-36" src="https://img.icons8.com/ios/200/000000/pdf-2.png" alt="" />
                        </a>
                    </div>
                    <div>
                        <h3>Colaboradores:</h3>
                        <p>{laboratorio?.colaborador}</p>
                    </div>
                    <div>
                        <h3>Links:</h3>
                        <p>{laboratorio?.links}</p>
                    </div>
                    <div>
                        <h3>Contato:</h3>
                        <p className="text-[12px]">{laboratorio?.email}</p>
                        <p>{laboratorio?.telefone}</p>
                    </div>
                </div>
            </div>
        </section>
    )
}