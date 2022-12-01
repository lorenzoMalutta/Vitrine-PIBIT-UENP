import { Vitrine } from "../../../components/vitrine";

export function PatenteDetail() {
  return (
    <>
      <Vitrine
        resumo="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
        titulo="Patentes"
        imagem="src\assets\card-top.jpg"
        link="/patentes"
        areaCientifica={["categoria1", "categoria2", "categoria3"]}
        areaEconomica={["categoria1", "categoria2", "categoria3"]}
        problema="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
        solucao="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
        email="lorenzo.malutta@gmail.com"
        coloboradores={["Lorenzo Malutta", "Lorenzo Malutta", "Lorenzo Malutta"]}
        dataCriacao="2021-05-01"
        trl="TRL 1"
        pct="PCT 1"
        inpi="INPI 1"
        id="1"
        palavrasChave={["categoria1", "categoria2", "categoria3"]}
        pdf="src\assets\card-top.jpg"
        video="src\assets\card-top.jpg"
        vantagem="src\assets\card-top.jpg"
        telefone="99132-1234"
        aplicacao="lorem ipsum"
        criadores={["Lorenzo Malutta", "Lorenzo Malutta", "Lorenzo Malutta"]}
      />

    </>
  )
}