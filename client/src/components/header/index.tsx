import { Link } from "react-router-dom";
import { IoHardwareChipOutline } from "react-icons/io5";
import { IoMdPaper } from "react-icons/io";
import { BsBox } from "react-icons/bs";
import { BiRocket } from "react-icons/bi";
import { AiOutlineFileSearch } from "react-icons/ai";
import { AiOutlineUser } from "react-icons/ai";
import { IoLogInOutline } from "react-icons/io5";
import { AiOutlineHome } from "react-icons/ai";
import logo from "../../assets/logo-aitec.png";

export function Header() {
  return (
    <header className="grid h-max">
      <div className="grid grid-cols-2 p-2 bg-[#26448B]">
        <img className="max-w-[200px] sm:max-w-sm " src={logo} alt="" />
        <ul className="inline-flex items-center justify-end gap-2 text-2xl text-white ">
          <li>
            <Link to="/"> <AiOutlineUser /> </Link>
          </li>
          <li>
            <Link to="/login"> <IoLogInOutline /> </Link>
          </li>
          <li>
            <Link to="/"> <AiOutlineHome /> </Link>
          </li>
        </ul>
      </div>
      <div className="bg-white h-3 shadow-2x1" />
      <div className="bg-[#5175B3] h-10 shadow" />
      <div className="sm:flex sm:justify-center text-center text-white bg-white drop-shadow-2xl sm:ml-40 sm:mr-40 rounded-md ">
          <ul className="sm:inline-flex grid sm:items-center justify-center gap-6 p-3 rounded-sm text-gray-700">
            <li className="inline-flex items-center gap-1">
              <IoMdPaper /><Link to="/patentes">Patentes</Link>
            </li>
            <li className="inline-flex items-center gap-1">
              <IoHardwareChipOutline /><Link to="/softwares">Softwares</Link>
            </li>
            <li className="inline-flex items-center gap-1">
              <BsBox /><Link to="/servicos">Serviços</Link>
            </li>
            <li className="inline-flex items-center gap-1">
              <BiRocket /><Link to="/startups">Startups</Link>
            </li>
            <li className="inline-flex items-center gap-1">
              <AiOutlineFileSearch /><Link to="/pesquisas">Pesquisas</Link>
            </li>
          </ul>
      </div>
    </header>
  )
}