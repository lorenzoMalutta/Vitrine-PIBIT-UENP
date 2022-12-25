import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import api from "../../../../services/api";

export function AdminSoftwareUpdate() {
  const [image, setImage] = useState('');
  const [video, setVideo] = useState('');
  const [nome, setNome] = useState('');
  const [sinopse, setSinopse] = useState('');
  const [resumo, setResumo] = useState('');
  const [problema, setProblema] = useState('');
  const [vantagem, setVantagem] = useState('');
  const [aplicacao, setAplicacao] = useState('');
  const [telefone, setTelefone] = useState('');
  const [email, setEmail] = useState('');
  const [colaborador, setColaborador] = useState('');
  const [data_criacao, setData_criacao] = useState('');
  const [links, setLinks] = useState('');
  const [criadores, setCriadores] = useState('');
  const [area_cientifica, setArea_cientifica] = useState('');
  const [area_economica, setArea_economica] = useState('');
  const [palavra_chave, setPalavra_chave] = useState('');

  const handleImage = (e: { target: { files: any; }; }) => {
    if (e.target.files[0]) {
      setImage(e.target.files[0]);
    }
    setImage(e.target.files[0]);
  }

  const handleVideo = (e: { target: { files: any; }; }) => {
    if (e.target.files[0]) {
      setVideo(e.target.files[0]);
    }
    setVideo(e.target.files[0]);
  }

  const { id } = useParams<{ id: string }>();

  useEffect(() => {
    api.get(`softwares/${id}`).then((response) => {
      setNome(response.data.nome);
      setSinopse(response.data.sinopse);
      setResumo(response.data.resumo);
      setProblema(response.data.problema);
      setVantagem(response.data.vantagem);
      setAplicacao(response.data.aplicacao);
      setTelefone(response.data.telefone);
      setEmail(response.data.email);
      setColaborador(response.data.colaborador);
      setData_criacao(response.data.data_criacao);
      setLinks(response.data.links);
      setCriadores(response.data.criadores);
      setArea_cientifica(response.data.area_cientifica);
      setArea_economica(response.data.area_economica);
      setPalavra_chave(response.data.palavra_chave);
      setImage(response.data.image);
      setVideo(response.data.video);
    });
  }, [id]);



  const handleSubmit = async (e: { preventDefault: () => void; }) => {
    e.preventDefault();
    const form = new FormData();
    form.append('nome', nome);
    form.append('sinopse', sinopse);
    form.append('resumo', resumo);
    form.append('problema', problema);
    form.append('vantagem', vantagem);
    form.append('aplicacao', aplicacao);
    form.append('telefone', telefone);
    form.append('email', email);
    form.append('colaborador', colaborador);
    form.append('data_criacao', data_criacao);
    form.append('links', links);
    form.append('criadores', criadores);
    form.append('area_cientifica', area_cientifica);
    form.append('area_economica', area_economica);
    form.append('palavra_chave', palavra_chave);
    form.append('image', image);
    form.append('video', video);
    console.log(form.get('nome'));
    console.log(api.put(`/softwares/edit/${id}`, form));
    try {
      const res = await api.put(`/softwares/edit/${id}`, form, {headers: {'Content-Type': 'multipart/form-data, application/json', 'Accept': 'application/json'}})
      console.log(res);
    }
    catch (err) {
      console.log(err);
    }
  };

  return (
    <section className="grid p-10">
      <h1 className="text-[#374151]">Update de Softwares</h1>
      <div className="bg-white rounded-md shadow-md w-full">
        <form className="grid grid-cols-2 p-5 text-[#374151] text-xl font-bold" onSubmit={handleSubmit} encType='multipart/form-data'>
          <div>
            <p>Nome:</p>
            <textarea className="shadow-md bg-[#F8FAFC]" cols={55} rows={5} name="nome" id="nome" value={nome} onChange={(e) => setNome(e.target.value)} />
          </div>
          <div>
            <p>Sinopse:</p>
            <textarea className="shadow-md bg-[#F8FAFC]" name="sinopse" id="sinopse" cols={55} rows={5} value={sinopse} onChange={(e) => setSinopse(e.target.value)} />
          </div>
          <div>
            <p>Resumo:</p>
            <textarea className="shadow-md bg-[#F8FAFC]" name="resumo" id="resumo" cols={55} rows={5} value={resumo} onChange={(e) => setResumo(e.target.value)} />
          </div>
          <div>
            <p>Problema:</p>
            <textarea className="shadow-md bg-[#F8FAFC]" name="problema" id="problema" cols={55} rows={5} value={problema} onChange={(e) => setProblema(e.target.value)} />
          </div>
          <div>
            <p>Aplicação:</p>
            <textarea className="shadow-md bg-[#F8FAFC]" name="aplicacao" id="aplicacao" cols={55} rows={5} value={aplicacao} onChange={(e) => setAplicacao(e.target.value)} />
          </div>
          <div>
            <p>Vantagem:</p>
            <textarea className="shadow-md bg-[#F8FAFC]" name="vantagem" id="vantagem" cols={55} rows={5} value={vantagem} onChange={(e) => setVantagem(e.target.value)} />
          </div>
          <div>
            <p>Área Científica:</p>
            <input type="text" name="area_cientifica" id="area_cientifica" value={area_cientifica} onChange={(e) => setArea_cientifica(e.target.value)} />
          </div>
          <div>
            <p>Área Econômica:</p>
            <input type="text" name="area_economica" id="area_economica" value={area_economica} onChange={(e) => setArea_economica(e.target.value)} />
          </div>
          <div>
            <p>Palavra Chave:</p>
            <input type="text" name="palavra_chave" id="palavra_chave" value={palavra_chave} onChange={(e) => setPalavra_chave(e.target.value)} />
          </div>
          <div>
            <p>Criadores:</p>
            <input type="text" name="criadores" id="criadores" value={criadores} onChange={(e) => setCriadores(e.target.value)} />
          </div>
          <div>
            <p>Colaborador:</p>
            <input type="text" name="colaborador" id="colaborador" value={colaborador} onChange={(e) => setColaborador(e.target.value)} />
          </div>
          <div>
            <p>Data de Criação:</p>
            <input type="date" name="data_criacao" id="data_criacao" value={data_criacao} onChange={(e) => setData_criacao(e.target.value)} />
          </div>
          <div>
            <p>Email:</p>
            <input type="email" name="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)} />
          </div>
          <div>
            <p>Telefone:</p>
            <input type="number" name="telefone" id="telefone" value={telefone} onChange={(e) => setTelefone(e.target.value)} />
          </div>
          <div>
            <p>Links:</p>
            <input type="text" name="links" id="links" value={links} onChange={(e) => setLinks(e.target.value)} />
          </div>
          <div>
            <p>Imagem:</p>
            <input type="file" name="image" id="image" onChange={handleImage} />
          </div>
          <div>
            <p>Video:</p>
            <input type="file" name="video" id="video" onChange={handleVideo} />
          </div>
          <div className="flex mt-8">
            <button className="w-fit h-fit" type="submit"> Update </button>
          </div>

        </form>
      </div>
    </section>
  )
}
