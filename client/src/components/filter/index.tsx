interface PropsFilter {
  filter: string;
  catergorias: string[];
  setFilter: (filter: string) => void;
}

export function Filter({ filter, catergorias, setFilter }: PropsFilter) {
  return (
    <div className="bg-white flex flex-col h-max p-4 shadow-xl rounded-md">
      <h4 className="text-gray-700 font-medium">{filter}</h4>
      <input  type="text" placeholder="Pesquise..." onChange={(e) => setFilter(e.target.value)} />
      {catergorias.map((categoria) => (
        <div className="flex gap-1 items-center p-1" key={categoria}>
          <input className="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" />
          <label>{categoria}</label>
        </div>
      ))}
      <button className="flex justify-center">Filtrar</button>
    </div>
  )
}