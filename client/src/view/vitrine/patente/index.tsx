import { Cards } from "../../../components/cards";
import { Filter } from "../../../components/filter";

export function Patente() {
  return (
    <>
      <div className="flex m-10">
        <h1>Vitrine Patentes</h1>
      </div>
      <div className="grid justify-center pb-20">
        <div className="grid grid-cols-4 max-w-fit gap-14 ">
          <Filter
            filter="Vitrine de Patentes"
            catergorias={["categoria1", "categoria2", "categoria3"]}
            setFilter={() => { }}
          />
          <Cards
            title="Patentes"
            description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
            link="/patentes"
            img="src\assets\card-top.jpg"
            tags={
              [
                1, 3, 4, 5
              ]
            }
          />
          <Cards
            title="Patentes"
            description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
            link="/patentes"
            img="src\assets\card-top.jpg"
            tags={
              [
                1, 3, 4, 5
              ]
            }
          />
          <Cards
            title="Patentes"
            description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
            link="/patentes"
            img="src\assets\card-top.jpg"
            tags={
              [
                1, 3, 4, 5
              ]
            }
          />
        </div>
      </div>
    </>
  )
}