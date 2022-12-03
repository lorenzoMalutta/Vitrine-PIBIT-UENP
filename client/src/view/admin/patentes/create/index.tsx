export function AdminPatenteCadastrar() {
  return (
    <section>
      <div>
        <div>
          <form action="" method="post">
            <div>
              <label htmlFor="nome">Nome</label>
              <input type="text" name="nome" id="nome" />
            </div>
            <div>
              <label htmlFor="sinopse">Sinopse</label>
              <input type="text" name="sinopse" id="sinopse" />
            </div>
            <div>
              <label htmlFor="resumo">Resumo</label>
              <input type="text" name="resumo" id="resumo" />
            </div>
            <div>
              <label htmlFor="problema">Problema</label>
              <input type="text" name="problema" id="problema" />
            </div>
            <div>
              <label htmlFor="aplicacao">Aplicação</label>
              <input type="text" name="aplicacao" id="aplicacao" />
            </div>
            <div>
              <label htmlFor="vantagem">Vantagem</label>
              <input type="text" name="vantagem" id="vantagem" />
            </div>
            <div>
              <label htmlFor="area_cientifica">Área Científica</label>
              <input type="text" name="area_cientifica" id="area_cientifica" />
            </div>
            <div>
              <label htmlFor="area_economica">Área Econômica</label>
              <input type="text" name="area_economica" id="area_economica" />
            </div>
            <div>
              <label htmlFor="palavra_chave">Palavra Chave</label>
              <input type="text" name="palavra_chave" id="palavra_chave" />
            </div>
            <div>
              <label htmlFor="trl">TRL</label>
              <input type="text" name="trl" id="trl" />
            </div>
            <div>
              <label htmlFor="pct">PCT</label>
              <input type="text" name="pct" id="pct" />
            </div>
            <div>
              <label htmlFor="inpi">INPI</label>
              <input type="text" name="inpi" id="inpi" />
            </div>
            <div>
              <label htmlFor="criadores">Criadores</label>
              <input type="text" name="criadores" id="criadores" />
            </div>
            <div>
              <label htmlFor="colaborador">Colaboradores</label>
              <input type="text" name="colaborador" id="colaborador" />
            </div>
            <div>
              <label htmlFor="data_criacao">Data de Criação</label>
              <input type="date" name="data_criacao" id="data_criacao" />
            </div>
            <div>
              <label htmlFor="email">Email</label>
              <input type="email" name="email" id="email" />
            </div>
            <div>
              <label htmlFor="telefone">Telefone</label>
              <input type="number" name="telefone" id="telefone" />
            </div>
            <div>
              <label htmlFor="links">Links</label>
              <input type="text" name="links" id="links" />
            </div>
            <div>
              <label htmlFor="image">Imagem</label>
              <input type="text" name="image" id="image" />
            </div>
            <div>
              <label htmlFor="pdf">PDF</label>
              <input type="text" name="pdf" id="pdf" />
            </div>
            <div>
              <label htmlFor="video">Video</label>
              <input type="text" name="video" id="video" />
            </div>
            <input type="submit" value="Enviar" />
          </form>
        </div>
      </div>
    </section>
  )
}