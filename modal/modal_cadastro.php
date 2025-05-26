<div class="modal fade" id="staticModalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-box-header">
          <div class="modal-box-title">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Usuário</h1>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="boxModal">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nome_user">Informe seu nome:</label>
                <input type="text" class="form-control" id="nome_user" placeholder="Nome completo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email_user">Informe seu e-mail:</label>
                <input type="email" class="form-control" id="email_user" placeholder="email@gmail.com">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="telefone_user">Informe seu telefone:</label>
                <input type="tel" class="form-control" id="telefone_user" placeholder="(XX) XXXXX-XXXX">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email_user">Senha:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="senha_user" placeholder="Digite sua senha" maxlength="8" autocomplete="new-password">
                  <button type="button" class="btn btn-dark" id="toggle_senha" onclick="visualizarSenha(this.querySelector('i').id, $(`#senha_user`).attr('id'))">
                    <i class="bi bi-eye-slash-fill" id="olho_senha"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="telefone_user">Confirme sua senha:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="confirma_senha_user" placeholder="Confirme sua senha" maxlength="8" autocomplete="new-password">
                  <button type="button" class="btn btn-dark" id="toggle_confirm_senha" onclick="visualizarSenha(this.querySelector('i').id, $(`#confirma_senha_user`).attr('id'))">
                    <i class="bi bi-eye-slash-fill" id="olho_confirma_senha"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" id="btnFecharModal" onclick="limpaModalCadastro()" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="cadastro_usuario" class="btn">Confirmar Cadastro</button>
      </div>
    </div>
  </div>
</div>