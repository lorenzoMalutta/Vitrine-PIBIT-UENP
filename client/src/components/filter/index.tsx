import { useEffect, useState } from "react";
import api from "../../services/api";
interface Iareas {
  denominacao: string;
}
interface PropsFilter {
  filter: string;
  setFilter: (filter: string) => void;
  type: "patentes" | "softwares" | "pesquisas" | "servicos" | "startups";
}


export function Filter({ filter, setFilter, type }: PropsFilter) {
  const [valorBusca, setValorBusca] = useState('');


  api.get(`/patentes/search/${valorBusca}`).then(response => {
    setFilter(response.data);
  })


  if (type === "patentes") {
    const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);
    useEffect(() => {
      api.get('/palavraChave').then(response => {
        setOptionPalavraChave(response.data);
      })
    }, [])

    return (
      <div className="bg-white flex flex-col h-max p-4 shadow-xl rounded-md">
        <form>
          <h4 className="text-gray-700 font-medium">{filter}</h4>
          <input type="text" placeholder="Pesquise..." onChange={(e) => setValorBusca(e.target.value)} />
          {optionPalavraChave.map((optionPalavraChave) => (
            <div className="flex gap-1 items-center p-1" key={optionPalavraChave.denominacao}>
              <input onChange={(e) => setValorBusca(e.target.value)} value={optionPalavraChave.denominacao} className="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" />
              <label>{optionPalavraChave.denominacao}</label>
            </div>
          ))}
          <button type="submit" className="flex justify-center">Filtrar</button>
        </form>
      </div>
    )
  }
  if (type == "softwares") {
    const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);
    useEffect(() => {
      api.get('/palavraChave').then(response => {
        setOptionPalavraChave(response.data);
      })
    }, [])
    return (
      <div className="bg-white flex flex-col h-max p-4 shadow-xl rounded-md">
        <h4 className="text-gray-700 font-medium">{filter}</h4>
        <input type="text" placeholder="Pesquise..." onChange={(e) => setFilter(e.target.value)} />
        {optionPalavraChave.map((optionPalavraChave) => (
          <div className="flex gap-1 items-center p-1" key={optionPalavraChave.denominacao}>
            <input className="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" />
            <label>{optionPalavraChave.denominacao}</label>
          </div>
        ))}
        <button type="submit" className="flex justify-center">Filtrar</button>
      </div>
    )
  }
  if (type == "servicos") {
    const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);
    useEffect(() => {
      api.get('/palavraChave').then(response => {
        setOptionPalavraChave(response.data);
      })
    }, [])
    return (
      <div className="bg-white flex flex-col h-max p-4 shadow-xl rounded-md">
        <h4 className="text-gray-700 font-medium">{filter}</h4>
        <input type="text" placeholder="Pesquise..." onChange={(e) => setFilter(e.target.value)} />
        {optionPalavraChave.map((optionPalavraChave) => (
          <div className="flex gap-1 items-center p-1" key={optionPalavraChave.denominacao}>
            <input className="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" />
            <label>{optionPalavraChave.denominacao}</label>
          </div>
        ))}
        <button type="submit" className="flex justify-center">Filtrar</button>
      </div>
    )
  }
  if (type == "pesquisas") {
    const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);
    useEffect(() => {
      api.get('/palavraChave').then(response => {
        setOptionPalavraChave(response.data);
      })
    }, [])
    return (
      <div className="bg-white flex flex-col h-max p-4 shadow-xl rounded-md">
        <h4 className="text-gray-700 font-medium">{filter}</h4>
        <input type="text" placeholder="Pesquise..." onChange={(e) => setFilter(e.target.value)} />
        {optionPalavraChave.map((optionPalavraChave) => (
          <div className="flex gap-1 items-center p-1" key={optionPalavraChave.denominacao}>
            <input className="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" />
            <label>{optionPalavraChave.denominacao}</label>
          </div>
        ))}
        <button type="submit" className="flex justify-center">Filtrar</button>
      </div>
    )
  }
  if (type == "startups") {
    const [optionPalavraChave, setOptionPalavraChave] = useState<Iareas[]>([]);
    useEffect(() => {
      api.get('/palavraChave').then(response => {
        setOptionPalavraChave(response.data);
      })
    }, [])
    return (
      <div className="bg-white flex flex-col h-max p-4 shadow-xl rounded-md">
        <h4 className="text-gray-700 font-medium">{filter}</h4>
        <input type="text" placeholder="Pesquise..." onChange={(e) => setFilter(e.target.value)} />
        {optionPalavraChave.map((optionPalavraChave) => (
          <div className="flex gap-1 items-center p-1" key={optionPalavraChave.denominacao}>
            <input className="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" />
            <label>{optionPalavraChave.denominacao}</label>
          </div>
        ))}
        <button type="submit" className="flex justify-center">Filtrar</button>
      </div>
    )
  }
  else {
    return (
      <div>
        <h1>erro</h1>
      </div>
    )
  }
}