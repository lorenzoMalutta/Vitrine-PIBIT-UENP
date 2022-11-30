export function Home() {
  return (
    <section className="grid">
      <div className="grid grid-cols-5 m-5 gap-5 p-4 ">
        <div className="flex flex-wrap justify-center bg-white shadow-2xl hover:bg-[#D7D7D7] duration-700 rounded-md">
          <h2 >Patentes</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        <div className="flex flex-wrap justify-center bg-white shadow-2xl hover:bg-[#D7D7D7] duration-700 rounded-md">
          <h2>Softwares</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        <div className="flex flex-wrap justify-center bg-white shadow-2xl hover:bg-[#D7D7D7] duration-700 rounded-md">
          <h2>Serviços</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        <div className="flex flex-wrap justify-center bg-white shadow-2xl hover:bg-[#D7D7D7] duration-700 rounded-md">
          <h2>Startups</h2>
          <p>Inovação e Tecnologias</p>
        </div>
        <div className="flex flex-wrap justify-center bg-white shadow-2xl hover:bg-[#D7D7D7] duration-700 rounded-md">
          <h2>Pesquisas</h2>
          <p>Inovação e Tecnologias</p>
        </div>
      </div>
    </section>
  )
}