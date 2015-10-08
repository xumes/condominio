<?php include '../partes/topo_restrito.php'; ?>



                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4 ">
                            
                            <h2> Editar seus dados</h2>
                            
                            
                             <form action="#">
                                  <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control input-sm" name="txtNome" placeholder="Seu Nome" value="Reginaldo Marcelo dos Santos" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control input-sm" name="txtEmail" placeholder="nome@email.com.br"  value="reginaldosantos.br@gmail.com" required>
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
                                  
                                  <button type="submit" class="btn btn-primary">Gravar as alterações</button>
                            </form>
                                  

                            


                        </div>
                    </div>

                </div>


<?php include '../partes/rodape.php'; ?>