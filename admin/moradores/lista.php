<?php
require_once '../../vendor/autoload.php';

use Aula\Classes\ConnectionDB;

$connect = new ConnectionDB("mysql:mysql.hostinger.com.br;dbname=u291335094_flamb", "u291335094_flamb", "sites1010");
$instance = $connect->connect();

$limit = 10;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM moradores LIMIT {$start_from}, {$limit}";

$stmt = $instance->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- apenas para separar o código do leiaute -->

<?php include '../../partes/topo_admin.php'; ?>

                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-12">
				            <div class="page-header">
				              <h1 id="tables">Lista de moradores</h1>
				              <h1 id="tables"><a href="#" class="btn btn-primary">Adicionar morador</a></h1>
				            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover ">
						  <thead>
						    <tr>
						      <th>Unidade</th>
						      <th>Nome</th>
						      <th>Login</th>
						      <th>Email</th>
						      <th>Ações</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>1</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						    <tr>
						      <td>2</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						    <tr class="info">
						      <td>3</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						    <tr class="success">
						      <td>4</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						    <tr class="danger">
						      <td>5</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						    <tr class="warning">
						      <td>6</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						    <tr class="active">
						      <td>7</td>
						      <td>Column content</td>
						      <td>Column content</td>
						      <td>Column content</td>
							  <td>
									<a href="#" class="btn btn-info btn-xs">Editar</a>
									<a href="#" class="btn btn-danger btn-xs">Excluir</a>
							  </td>
						    </tr>
						  </tbody>
					</table> 





<?php include '../../partes/rodape.php'; ?>