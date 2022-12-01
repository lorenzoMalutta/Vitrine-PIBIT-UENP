interface VitrineProps {
  resumo: string;
  titulo: string;
  imagem: string;
  link: string;
  areaCientifica: string[];
  areaEconomica: string[];
  problema: string;
  solucao: string;
  pdf: string;
  video: string;
  vantagem: string;
  palavrasChave: string[];
  criadores: string[];
  email: string;
  telefone: string;
  aplicacao: string;
  coloboradores: string[];
  dataCriacao: string;
  trl: string;
  pct: string;
  inpi: string;
  id: string;
}

export function Vitrine({ resumo, titulo, imagem, link, areaCientifica, areaEconomica, problema, solucao, pdf, video, vantagem, palavrasChave, criadores, email, telefone, aplicacao, coloboradores, dataCriacao, trl, pct, inpi }: VitrineProps) {
  return (
    <section className="grid grid-flow-col-dense m-2 p-2">
      <div className="flex flex-col p-5 m-5 bg-white justify-center rounded-md shadow-md">
        <video src=""/>
        <div>
          <h1>{titulo}</h1>
        </div>
        <div>
          <h3>Resumo</h3>
          <p>{resumo}</p>
        </div>
        <div>
          <h3>Problema</h3>
          <p>{problema}</p>
        </div>
        <div>
          <h3>Solução</h3>
          <p>{solucao}</p>
        </div>
        <div>
          <h3>Aplicação</h3>
          <p>{aplicacao}</p>
        </div>
        <div>
          <h3>Vantagem</h3>
          <p>{vantagem}</p>
        </div>
      </div>
      <div className="">
        <div>
          <h3>PDF</h3>
          <a href=""></a>
        </div>
        <div>
          <h3>Colaboradores</h3>
          <p>{coloboradores}</p>
        </div>
        <div>
          <h3>Criadores</h3>
          <p>{criadores}</p>
        </div>
        <div>
          <h3>Contato</h3>
          <p>{email}</p>
          <h3>Telefone</h3>
          <p>{telefone}</p>
        </div>
        <div>
          <h3>Palavras Chave</h3>
          <p>{palavrasChave}</p>
        </div>
        <div>
          <h3>Área Científica</h3>
          <p>{areaCientifica}</p>
        </div>
        <div>
          <h3>Área Econômica</h3>
          <p>{areaEconomica}</p>
        </div>
        <div>
          <h3>Imagem</h3>
          <img src="" alt="" />
        </div>
      </div>
    </section>
  )
}