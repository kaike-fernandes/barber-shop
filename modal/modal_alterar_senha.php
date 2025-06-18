<!-- Modal Alterar Senha -->
<div class="modal fade" id="staticModalAlterarSenha" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-box-header">
          <div class="modal-box-title">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Alterar Senha</h1>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div class="boxModal">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="new_senha">Nova senha:</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="new_senha" placeholder="Digite sua nova senha" maxlength="8" autocomplete="new-password">
                    <button type="button" class="btn btn-dark" id="toggle_new_senha" onclick="visualizarSenha(this.querySelector('i').id, $(`#new_senha`).attr('id'))">
                      <i class="bi bi-eye-slash-fill" id="olho_new_senha"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="confirm_new_senha">Confirme sua nova senha:</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="confirm_new_senha" placeholder="Digite sua senha" maxlength="8" autocomplete="new-password">
                    <button type="button" class="btn btn-dark" id="toggle_new_senha" onclick="visualizarSenha(this.querySelector('i').id, $(`#confirm_new_senha`).attr('id'))">
                      <i class="bi bi-eye-slash-fill" id="olho_confirm_new_senha"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="fechar_modal_alterar_senha" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
          <button type="button" id="alterar_senha" class="btn">Alterar Senha</button>
        </div>
      </div>
    </div>
  </div>
</div>