<?php
require_once '../../vendor/autoload.php';

use \Aula\Classes\ConnectionDB;

$connect = new ConnectionDB("mysql:host=localhost;dbname=php-crud", "root", "");
$instance = $connect->connect();

$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

$limit = 10;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM moradores LIMIT {$start_from}, {$limit}";
//$sql = 'SELECT * FROM moradores LIMIT 0, 30 ';



$stmt = $instance->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data);
?>

<!-- apenas para separar o código do leiaute -->

<?php include '../../partes/topo_admin_moradores.php'; ?>

                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-12">
				            <div class="page-header">
				              <h1 id="tables">Lista de moradores</h1>
				              <h1 id="tables"><a href="create.php" class="btn btn-primary">Adicionar morador</a></h1>
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
						      <th>Atualizado em</th>
						      <th>Ações</th>
						    </tr>
						  </thead>
						  <tbody>

							<?php
					            foreach ($data as $row) {
					                echo '<tr>';
					                echo '<td>' . $row['unidade'] . '</td>';
					                echo '<td>' . $row['nome'] . '</td>';
					                echo '<td>' . $row['usuario'] . '</td>';
					                echo '<td>' . $row['email'] . '</td>';
					                echo '<td>' . $row['dtUpdate'] . '</td>';
					                echo '<td>
					                        <a class="btn btn-info btn-xs" href="edit.php?id=' . $row['id'] . '">Editar</a>
					                        <a class="btn btn-danger btn-xs" href="delete.php?id=' . $row['id'] . '">Excluir</a>
					                    </td>';
					                echo '</tr>';
					            }
					            ?>

						   
						  </tbody>
					</table> 





<?php include '../../partes/rodape.php'; ?>