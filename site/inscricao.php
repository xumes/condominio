<?php include '../partes/topo_site.php'; ?>



                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4 ">
                            
                            <h2> Faça sua inscrição</h2>
                            <h3>R$ 300,00 mensais</h3>
                            <form action="pagamento.php">
                                  <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control input-sm" name="txtNome" placeholder="Seu Nome" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control input-sm" name="txtEmail" placeholder="nome@email.com.br" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" class="form-control input-sm" name="txtSenha" placeholder="Senha" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="txtFoto">
                                    <p class="help-block">Foto para o seu perfil</p>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-default" formaction="index.php">Gravar e voltar ao início</button>
                                  <button type="submit" class="btn btn-primary">Gravar e fazer o pagamento</button>
                            </form>


                        </div>
                    </div>

                </div>


<?php include '../partes/rodape.php'; ?>