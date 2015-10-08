
<?php include '../partes/topo_site.php'; ?>



                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4 ">
                            
                            <h2> Fale conosco</h2>
                            <h5>respondemos sua mensagem em até 48h uteis</h5>
                            <form action="contato_enviado.php">
                                  <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control input-sm" name="txtNome" placeholder="Seu Nome" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control input-sm" name="txtEmail" placeholder="nome@email.com.br" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Mensagem</label>
                                    <textarea class="form-control" rows="5" name="txtMensagem"></textarea>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-default">Enviar a mensagem</button>
                                  
                            </form>


                        </div>
                    </div>

                </div>


<?php include '../partes/rodape.php'; ?>