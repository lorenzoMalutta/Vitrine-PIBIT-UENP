import { Children, useEffect, useState } from "react";
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
    palavra_chave: string;
    id: number;
    tipo: string;
    area_cientifica: string;
    area_economica: string;
}
interface IHome {
    nome: string;
    sinopse: string;
    palavra_chave: string;
    id: number;
    tipo: string;
    area_cientifica: string;
    area_economica: string;
    image: string;
}

export function Pesquisa() {
    const [filter, setFilter] = useState<Ifiltro[]>([])
    const [patente, setPatente] = useState<IHome[]>([]);
    const [busca, setBusca] = useState<string>("");
    const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);

    const filtro = (childrenData: any) => {
        setFilter(childrenData)
    }
    // console.log(filter)

    const buscar = (childrenData: any) => {
        setBusca(childrenData)
    }
    console.log(busca)

    useEffect(() => {
        api.get('/palavraChave').then(response => {
            setOptionPalavraChave(response.data);
        })
    }, [])
    useEffect(() => {
        api.get('/pesquisas').then(response => {
            setPatente(response.data);
        })
    }, [])
    if (busca == "todos") {
        return (
            <section className="h-fit">
                <div className="mx-auto text-center">
                    <Title
                        titulo="Vitrine de Pesquisas"
                        subtitulo="Tecnologias e Inovação "
                    />
                </div>
                <div className="flex h-screen">
                    <div className="m-10">
                        <Filter
                            nomeFiltro="Vitrine de pesquisas"
                            setFilter={filtro}
                            type="pesquisas"
                            setBusca={buscar}
                        />
                    </div>
                    <div className="grid justify-center mb-20 mt-10" >
                        <div className="grid grid-cols-4 gap-5 max-h-56">
                            {patente.map((patente) => (
                                <Cards
                                    type="pesquisas"
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
    } else if (filter.map((filtro) => filtro.palavra_chave == busca)) {
        return (
            <section >
                <div className="mx-auto text-center">
                    <Title
                        titulo="Vitrine de Pesquisas"
                        subtitulo="Tecnologias e Inovação "
                    />
                </div>
                <div className="flex">
                    <div className="m-10">
                        <Filter
                            nomeFiltro="Vitrine de Pesquisas"
                            setFilter={filtro}
                            type="pesquisas"
                            setBusca={buscar}
                        />
                    </div>
                    <div className="grid justify-center mb-20 mt-10">
                        <div className="grid grid-cols-3 gap-5 max-h-56">
                            {patente.map((patente) => {
                                if (busca == patente.palavra_chave) {
                                    return (
                                        <Cards
                                            type="pesquisas"
                                            image={patente.image}
                                            nome={patente.nome}
                                            sinopse={patente.sinopse}
                                            palavraChave={patente.palavra_chave}
                                            id={patente.id}
                                            areaCientifica={patente.area_cientifica}
                                            areaEconomica={patente.area_economica}
                                        />
                                    )
                                }
                            })}
                        </div>
                    </div>
                </div>
            </section>
        )
    } else {
        return (
            <section >
                <div className="mx-auto text-center">
                    <Title
                        titulo="Vitrine de Pesquisas"
                        subtitulo="Tecnologias e Inovação "
                    />
                </div>
                <div className="flex">
                    <div className="m-10">
                        <Filter
                            nomeFiltro="Vitrine de Pesquisas"
                            setFilter={filtro}
                            type="pesquisas"
                            setBusca={buscar}
                        />
                    </div>
                    <div className="grid justify-center mb-20 mt-10">
                        <div className="grid grid-cols-3 gap-5 max-h-56">
                            {patente.map((patente) => {
                                if (busca == patente.area_cientifica) {
                                    return (
                                        <Cards
                                            type="pesquisas"
                                            image={patente.image}
                                            nome={patente.nome}
                                            sinopse={patente.sinopse}
                                            palavraChave={patente.palavra_chave}
                                            id={patente.id}
                                            areaCientifica={patente.area_cientifica}
                                            areaEconomica={patente.area_economica}
                                        />
                                    )
                                }
                            }
                            )}
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}