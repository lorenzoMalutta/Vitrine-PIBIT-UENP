interface PropsFilter {
  filter: string;
  catergorias: string[];
  setFilter: (filter: string) => void;
}

export function Filter({ filter, catergorias, setFilter }: PropsFilter) {
  return (
    <div className="bg-white flex flex-col w-fit p-4 shadow-xl rounded-md">
      <h4 className="text-gray-700">{filter}</h4>
      <div>
        <input type="text" placeholder="Pesquise..." onChange={(e) => setFilter(e.target.value)} />
      </div>
      <div>
        {catergorias.map((categoria) => (
          <div key={categoria}>
            <input type="checkbox" />
            <label>{categoria}</label>
          </div>
        ))}
        <button className="bg-blue-500">Filtrar</button>
      </div>
    </div>
  )
}