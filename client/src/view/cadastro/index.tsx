import { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export function Cadastro() {
  const [name, setName] = useState("");
  const [password, setPassword] = useState("");
  const [password_confirmation, setPassword_confirmation] = useState("");
  const [email, setEmail] = useState("");
  const [cpf, setCpf] = useState("");

  const [data, setData] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/cadastro")
      .then((res) => res.json())
      .then((data) => setData(data));
  }, []);

  const handleSubmit = (e: { preventDefault: () => void; }) => {
    e.preventDefault();
    const data = {
      name,
      email,
      password,
      password_confirmation,
      cpf,
    };

    fetch("http://127.0.0.1:8000/api/cadastro", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .then((data) => console.log(data));
  };
  return (
    <section className="flex justify-center h-screen items-center">
      <div className="flex flex-col h-fit p-8 justify-center text-center shadow-md rounded-lg bg-white  ">
        <div>
          <h3>Bem-vindo ao Cadastro👋</h3>
        </div>
        <form className="flex flex-col gap-y-2 text-left" onSubmit={handleSubmit}>
          <label className="mt-2 text-sm font-medium text-gray-900" htmlFor="">Nome:</label>
          <input className=" text-sm font-medium text-gray-900"
            type="text"
            id="name"
            name="name"
            value={name}
            onChange={(e) => setName(e.target.value)}
            placeholder="Nome" />
          <label className="mt-2 text-sm font-medium text-gray-900" htmlFor="">Email:</label>
          <input className=" text-sm font-medium text-gray-900"
            type="text"
            id="email"
            name="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            placeholder="Email" />
          <label className="mt-2 text-sm font-medium text-gray-900" htmlFor="">CPF:</label>
          <input className=" text-sm font-medium text-gray-900"
            type="text"
            id="cpf"
            name="cpf"
            value={cpf}
            onChange={(e) => setCpf(e.target.value)}
            placeholder="cpf" />
          <label className="mt-2 text-sm font-medium text-gray-900" htmlFor="">Senha:</label>
          <input className=" text-sm font-medium text-gray-900"
            type="text"
            id="password"
            name="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            placeholder="Senha" />
          <label className="mt-2 text-sm font-medium text-gray-900" htmlFor="">Confirme a senha:</label>
          <input className=" text-sm font-medium text-gray-900"
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            value={password_confirmation}
            onChange={(e) => setPassword_confirmation(e.target.value)}
            placeholder="Confirme a senha" />
          <div className="mt-2 inline-flex items-baseline justify-left gap-3">
            <input type="checkbox" name="" id="" />
            <p>Eu aceito os <span className="text-[#2563EB]">Termos de condição</span></p>
          </div>
          <button type="submit">Cadastrar</button>
          <div className="font-norml">
            <p>Já possui uma conta? <Link className="text-[#2563EB]" to="/login">Login</Link></p>
          </div>
        </form>
      </div>
    </section>
  )
}