import { Link } from "react-router-dom";
import { IoHardwareChipOutline } from "react-icons/io5";
import { IoMdPaper } from "react-icons/io";
import { BsBox } from "react-icons/bs";
import { BiRocket } from "react-icons/bi";
import { AiOutlineFileSearch } from "react-icons/ai";
import { Cards } from "../../components/cards";

export function Home() {
  return (
    <section className="grid">
      <div className="grid grid-cols-5 m-5 gap-5 p-4 ">
        <Link to="/patentes"> 
        <div className="flex flex-col items-center pt-4  bg-white shadow-2xl hover:bg-[#ededed] duration-700 rounded-md">
          <div className="flex justify-center items-center bg-slate-300 rounded-full w-14 h-14">
            <IoMdPaper className=" text-4xl  text-[#214088]" />
          </div>
          <h2 className="font-normal text-gray-700">Patentes</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        </Link>
        <Link to="/softwares">
        <div className="flex flex-col items-center pt-4 bg-white shadow-2xl hover:bg-[#ededed] duration-700 rounded-md">
          <div className="flex justify-center items-center bg-[#FFEDDC] rounded-full w-14 h-14">
            <IoHardwareChipOutline className="text-4xl text-[#FFBB7A]" />
          </div>
          <h2 className="font-normal text-gray-700">Softwares</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        </Link>
        <Link to="/servicos">
        <div className="flex flex-col items-center pt-4 bg-white shadow-2xl hover:bg-[#ededed] duration-700 rounded-md">
          <div className="flex justify-center items-center bg-[#fc9999] rounded-full w-14 h-14">
            <BsBox className="text-4xl text-[#ea4444]" />
          </div>
          <h2 className="font-normal text-gray-700">Serviços</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        </Link>
        <Link to="/startups">
        <div className="flex flex-col items-center pt-4 bg-white shadow-2xl hover:bg-[#ededed] duration-700 rounded-md">
          <div className="flex justify-center items-center bg-[#84ffb9] rounded-full w-14 h-14">
            <BiRocket className="text-4xl text-[#28C76F]" />
          </div>
          <h2 className="font-normal text-gray-700">Startups</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        </Link>
        <Link to="/pesquisas">
        <div className="flex flex-col items-center pt-4 bg-white shadow-2xl hover:bg-[#ededed] duration-700 rounded-md">
          <div className="flex justify-center items-center bg-[#E0F9FC] rounded-full w-14 h-14">
            <AiOutlineFileSearch className="text-4xl text-[#3BDAED]" />
          </div>
          <h2 className="font-normal text-gray-700">Pesquisas</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        </Link>
      </div>


      <Cards 
        title="Patentes"
        description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil."
        link="/patentes"
        img="src\assets\card-top.jpg"
        tags={
          [
            1,3,4,5
          ]
        }
      />
    </section>
  )
}